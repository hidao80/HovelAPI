<?php
/**
 * User data API definition.
 */

/**
 * Obtain user information
 *
 * @param int $id User id
 * 
 * @return string JSON data
 */
function getUserJson(int $id): string
{
    $userNmae = [
        1 => 'Chris', 
        2 => 'Pat',
        3 => 'Alex', 
        4 => 'Dana', 
        5 => 'Hunter', 
        6 => 'Jamie', 
        7 => 'Morgan', 
        8 => 'Robin', 
        9 => 'Ronnie', 
        10 => 'Shannon', 
        11 => 'Terry', 
        12 => 'Tracey',
    ];

    $json = ['id' => $id, 'name' => $userNmae[$id] ?? 'Undefined'];

    return json_encode($json, JSON_UNESCAPED_UNICODE);
}
