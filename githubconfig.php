<?php

require_once __DIR__ . '/app/Auth/GitHubAuth.php';

$githubLoginUrl = (new GitHubAuth())->getAuthorizationUrl();
