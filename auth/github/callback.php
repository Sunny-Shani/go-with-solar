<?php

require_once dirname(__DIR__, 2) . '/app/Auth/GitHubAuth.php';
require_once dirname(__DIR__, 2) . '/app/Auth/AuthUserRepository.php';
require_once dirname(__DIR__, 2) . '/app/Services/QuoteService.php';

try {
    if (empty($_GET['code']) || empty($_GET['state'])) {
        redirect_to('login.php');
    }

    $auth = new GitHubAuth();
    $user = $auth->handleCallback($_GET['code'], $_GET['state']);

    $repository = new AuthUserRepository();
    $repository->saveGithubUser($user);

    $quote = (new QuoteService())->randomQuote();

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = ($user['name'] ?? '') !== '' ? $user['name'] : ($user['login'] ?? '');
    $_SESSION['usernameLast'] = '';
    $_SESSION['email'] = $user['email'] ?? '';
    $_SESSION['profile'] = $user['avatar_url'] ?? '';
    $_SESSION['name'] = $quote['name'];
    $_SESSION['quote'] = $quote['quote'];

    redirect_to('index.php');
} catch (Throwable $exception) {
    error_log('GitHub auth failed: ' . $exception->getMessage());
    redirect_to('login.php');
}
