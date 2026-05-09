<?php

require_once dirname(__DIR__) . '/config/bootstrap.php';

class Connection
{
    public static function mysqli(): mysqli
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $db = app_config('db');
        $connection = new mysqli(
            $db['host'],
            $db['user'],
            $db['password'],
            $db['name']
        );
        $connection->set_charset($db['charset'] ?? 'utf8mb4');

        return $connection;
    }

    public static function pdo(): PDO
    {
        $db = app_config('db');
        $charset = $db['charset'] ?? 'utf8mb4';
        $dsn = "mysql:host={$db['host']};dbname={$db['name']};charset={$charset}";

        return new PDO($dsn, $db['user'], $db['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}
