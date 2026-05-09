<?php

if (PHP_SAPI === 'cli' && session_status() === PHP_SESSION_NONE) {
    $sessionPath = session_save_path();
    if ($sessionPath === '' || !is_writable($sessionPath)) {
        session_save_path(sys_get_temp_dir());
    }
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('APP_ROOT', dirname(__DIR__, 2));

function app_array_merge_recursive(array $base, array $override): array
{
    foreach ($override as $key => $value) {
        if (is_array($value) && isset($base[$key]) && is_array($base[$key])) {
            $base[$key] = app_array_merge_recursive($base[$key], $value);
            continue;
        }

        $base[$key] = $value;
    }

    return $base;
}

$appConfig = require __DIR__ . '/example.php';
$localConfigPath = __DIR__ . '/local.php';

if (is_file($localConfigPath)) {
    $appConfig = app_array_merge_recursive($appConfig, require $localConfigPath);
}

function app_config(?string $key = null, $default = null)
{
    global $appConfig;

    if ($key === null) {
        return $appConfig;
    }

    $value = $appConfig;
    foreach (explode('.', $key) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }

        $value = $value[$segment];
    }

    return $value;
}

function app_url(string $path = ''): string
{
    $baseUrl = rtrim((string) app_config('app_url'), '/');
    $path = ltrim($path, '/');

    return $path === '' ? $baseUrl : $baseUrl . '/' . $path;
}

function redirect_to(string $path): void
{
    header('Location: ' . app_url($path));
    exit;
}
