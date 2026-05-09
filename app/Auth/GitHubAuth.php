<?php

require_once dirname(__DIR__) . '/config/bootstrap.php';

class GitHubAuth
{
    private string $clientId;
    private string $clientSecret;
    private string $redirectUri;

    public function __construct()
    {
        $this->clientId = (string) app_config('github.client_id');
        $this->clientSecret = (string) app_config('github.client_secret');
        $this->redirectUri = app_url('auth/github/callback.php');
    }

    public function getAuthorizationUrl(): string
    {
        $_SESSION['github_oauth_state'] = bin2hex(random_bytes(16));

        return 'https://github.com/login/oauth/authorize?' . http_build_query([
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'state' => $_SESSION['github_oauth_state'],
            'scope' => 'read:user user:email',
        ]);
    }

    public function handleCallback(string $code, string $state): array
    {
        if (empty($_SESSION['github_oauth_state']) || !hash_equals($_SESSION['github_oauth_state'], $state)) {
            throw new RuntimeException('Invalid GitHub OAuth state.');
        }
        unset($_SESSION['github_oauth_state']);

        $token = $this->requestAccessToken($code);
        if (empty($token['access_token'])) {
            throw new RuntimeException('GitHub did not return an access token.');
        }

        $user = $this->apiGet('https://api.github.com/user', $token['access_token']);
        if (empty($user['email'])) {
            $user['email'] = $this->getPrimaryEmail($token['access_token']);
        }

        return $user;
    }

    private function requestAccessToken(string $code): array
    {
        $curl = curl_init('https://github.com/login/oauth/access_token');
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUri,
                'code' => $code,
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_HTTPHEADER => ['Accept: application/json'],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error || $status >= 400 || !$response) {
            throw new RuntimeException('GitHub token request failed: ' . ($error ?: $response));
        }

        return json_decode($response, true) ?: [];
    }

    private function apiGet(string $url, string $accessToken): array
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_HTTPHEADER => [
                'Accept: application/vnd.github+json',
                'Authorization: Bearer ' . $accessToken,
                'User-Agent: Go-with-Solar',
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error || $status >= 400 || !$response) {
            throw new RuntimeException('GitHub API request failed: ' . ($error ?: $response));
        }

        return json_decode($response, true) ?: [];
    }

    private function getPrimaryEmail(string $accessToken): string
    {
        $emails = $this->apiGet('https://api.github.com/user/emails', $accessToken);

        foreach ($emails as $email) {
            if (!empty($email['primary']) && !empty($email['email'])) {
                return $email['email'];
            }
        }

        return '';
    }
}
