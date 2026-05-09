<?php

require_once dirname(__DIR__) . '/app/Database/Connection.php';
require_once dirname(__DIR__) . '/app/Auth/AuthUserRepository.php';

class Connect extends PDO
{
    public function __construct()
    {
        $db = app_config('db');
        $charset = $db['charset'] ?? 'utf8mb4';

        parent::__construct(
            "mysql:host={$db['host']};dbname={$db['name']};charset={$charset}",
            $db['user'],
            $db['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }
}

class Controller
{
    public function insertData($data)
    {
        $repository = new AuthUserRepository();
        $repository->saveGoogleUser([
            'email' => $data['email'] ?? '',
            'picture' => $data['avatar'] ?? '',
            'family_name' => $data['familyName'] ?? '',
            'given_name' => $data['givenName'] ?? '',
        ]);

        redirect_to('index.php');
    }
}
