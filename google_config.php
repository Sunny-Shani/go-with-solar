<?php

require_once __DIR__ . '/app/Auth/GoogleAuth.php';

$login_url = (new GoogleAuth())->getAuthorizationUrl();
