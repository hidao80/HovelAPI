<?php

global $router;

$router->map(
    'GET', '/api/v1/users/[i:id]', function ($id) {
        echo getUser($id);
    }
);
