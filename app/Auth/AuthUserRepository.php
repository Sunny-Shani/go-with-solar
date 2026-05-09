<?php

require_once dirname(__DIR__) . '/Database/Connection.php';

class AuthUserRepository
{
    private mysqli $conn;

    public function __construct(?mysqli $conn = null)
    {
        $this->conn = $conn ?: Connection::mysqli();
    }

    public function saveGoogleUser(array $user): void
    {
        $email = $user['email'] ?? '';
        if ($email === '') {
            throw new RuntimeException('Google account did not return an email address.');
        }

        $this->insertIfMissing(
            $email,
            $user['given_name'] ?? ($user['name'] ?? ''),
            $user['family_name'] ?? '',
            null,
            $user['picture'] ?? ''
        );
    }

    public function saveGithubUser(array $user): void
    {
        $email = $user['email'] ?? '';
        if ($email === '') {
            throw new RuntimeException('GitHub account did not return an email address.');
        }

        $this->insertIfMissing(
            $email,
            $user['name'] ?? ($user['login'] ?? ''),
            '',
            $user['login'] ?? '',
            $user['avatar_url'] ?? ''
        );
    }

    private function insertIfMissing(string $email, string $firstname, string $lastname, ?string $githubUsername, string $avatar): void
    {
        $check = $this->conn->prepare('SELECT id FROM googleusers WHERE email = ?');
        $check->bind_param('s', $email);
        $check->execute();
        $exists = $check->get_result()->num_rows > 0;
        $check->close();

        if ($exists) {
            return;
        }

        $insert = $this->conn->prepare(
            'INSERT INTO googleusers (firstname, lastname, usernameGit, avatar, email) VALUES (?, ?, ?, ?, ?)'
        );
        $insert->bind_param('sssss', $firstname, $lastname, $githubUsername, $avatar, $email);
        $insert->execute();
        $insert->close();
    }
}
