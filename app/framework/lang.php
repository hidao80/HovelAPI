<?php

/**
 * Simplified gettext
 */

// Obtaining the browser's display language
$lang = ($http_langs = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en') ? explode(',', $http_langs)[0] : 'en';

/**
 * Multilingual translator
 *
 * @param string $keyword index
 * 
 * @return string
 */
function __(string $keyword): string
{
    global $lang;

    // Loading Dictionaries
    include_once glob(__DIR__ . "/../lang/$lang*.php")[0];

    return $message[$keyword];
}
