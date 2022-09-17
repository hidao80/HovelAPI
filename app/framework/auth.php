<?php

require_once __DIR__ . '/../../config/auth.php';

/**
 * Function to use at the top of a page that requires Basic authentication.
 * 
 * Send header and exit on first time or failure.
 *
 * @return string Logged-in user name
 */
function requireBasicAuth()
{
    global $hashes;

    if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) 
        || !password_verify(
            $_SERVER['PHP_AUTH_PW'],
            isset($hashes[$_SERVER['PHP_AUTH_USER']])
                ? $hashes[$_SERVER['PHP_AUTH_USER']]
                : '$2y$10$abcdefghijklmnopqrstuv' // Prevent extreme speed only when username does not exist
        )
    ) {
        // First time or when authentication fails
        header('WWW-Authenticate: Basic realm="Enter username and password."');
        header('Content-Type: text/plain; charset=utf-8');
        exit(__('You must be logged in to view this page'));
    }

    // 認証が成功したときはユーザ名を返す
    return $_SERVER['PHP_AUTH_USER'];
}
