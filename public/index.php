<?php

// Load the libraries used by the HovelAPI framework
require_once __DIR__ . '/../app/framework/requires.php';
$router = new AltoRouter();

// A file that defines functions to be called when the root is accessed.
// There may be multiple files.
require_once __DIR__ . '/../app/api/v1/functions.php';

// Perform BASIC authentication
$username = requireBasicAuth();

// Route development.
// When dividing into multiple files, require is also written in multiple files.
require_once __DIR__ . '/../routes/api.php';

// Routing Execution
$match = $router->match(); 

// call closure or throw 404 status 
if ($match && is_callable($match['target'])) { 
    call_user_func_array($match['target'], $match['params']); 
} else { 
    // no route was matched 
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found'); 
}
