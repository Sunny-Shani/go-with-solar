<?php

require_once dirname(__DIR__) . '/config/bootstrap.php';

class GoogleAuth
{
    private string $clientId;
    private string $clientSecret;
    private string $redirectUri;

    public function __construct()
    {
        $this->clientId = (string) app_config('google.client_id');
        $this->clientSecret = (string) app_config('google.client_secret');
        $this->redirectUri = app_url('auth/google/callback.php');
    }

    public function getAuthorizationUrl(): string
    {
        $_SESSION['google_oauth_state'] = bin2hex(random_bytes(16));

        return 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'state' => $_SESSION['google_oauth_state'],
            'access_type' => 'online',
            'prompt' => 'select_account',
        ]);
    }

    public function handleCallback(string $code, string $state): array
    {
        if (empty($_SESSION['google_oauth_state']) || !hash_equals($_SESSION['google_oauth_state'], $state)) {
            throw new RuntimeException('Invalid Google OAuth state.');
        }
        unset($_SESSION['google_oauth_state']);

        $token = $this->requestToken($code);
        if (empty($token['access_token'])) {
            throw new RuntimeException('Google did not return an access token.');
        }

        return $this->requestUserInfo($token['access_token']);
    }

    private function requestToken(string $code): array
    {
        return $this->postJson('https://oauth2.googleapis.com/token', [
            'code' => $code,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUri,
            'grant_type' => 'authorization_code',
        ]);
    }

    private function requestUserInfo(string $accessToken): array
    {
        $curl = curl_init('https://www.googleapis.com/oauth2/v3/userinfo');
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $accessToken],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error || $status >= 400 || !$response) {
            throw new RuntimeException('Google userinfo request failed: ' . ($error ?: $response));
        }

        return json_decode($response, true) ?: [];
    }

    private function postJson(string $url, array $fields): array
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($fields),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error || $status >= 400 || !$response) {
            throw new RuntimeException('Google token request failed: ' . ($error ?: $response));
        }

        return json_decode($response, true) ?: [];
    }
}
