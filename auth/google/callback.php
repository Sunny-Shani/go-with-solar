<?php

require_once dirname(__DIR__, 2) . '/app/Auth/GoogleAuth.php';
require_once dirname(__DIR__, 2) . '/app/Auth/AuthUserRepository.php';
require_once dirname(__DIR__, 2) . '/app/Services/QuoteService.php';

try {
    if (empty($_GET['code']) || empty($_GET['state'])) {
        redirect_to('login.php');
    }

    $auth = new GoogleAuth();
    $user = $auth->handleCallback($_GET['code'], $_GET['state']);

    $repository = new AuthUserRepository();
    $repository->saveGoogleUser($user);

    $quote = (new QuoteService())->randomQuote();

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $user['given_name'] ?? ($user['name'] ?? '');
    $_SESSION['usernameLast'] = $user['family_name'] ?? '';
    $_SESSION['email'] = $user['email'] ?? '';
    $_SESSION['profile'] = $user['picture'] ?? '';
    $_SESSION['name'] = $quote['name'];
    $_SESSION['quote'] = $quote['quote'];

    redirect_to('index.php');
} catch (Throwable $exception) {
    error_log('Google auth failed: ' . $exception->getMessage());
    redirect_to('login.php');
}
