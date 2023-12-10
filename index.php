<?php
$members = [
    [
        'name' => 'Homer Jay',
        'lastname' => 'Simpson',
        'wikiUrl' => 'https://es.wikipedia.org/wiki/Homer_Simpson'
    ],
    [
        'name' => 'Marjorie',
        'lastname' => 'Bouvier',
        'wikiUrl' => 'https://es.wikipedia.org/wiki/Marge_Simpson'
    ],
    [
        'name' => 'Bartholomew',
        'lastname' => 'Simpson',
        'wikiUrl' => 'https://es.wikipedia.org/wiki/Bart_Simpson'
    ],
    [
        'name' => 'Lisa Merie',
        'lastname' => 'Simpson',
        'wikiUrl' => 'https://es.wikipedia.org/wiki/Lisa_Simpson'
    ],
    [
        'name' => 'Margaret',
        'lastname' => 'Simpson',
        'wikiUrl' => 'https://es.wikipedia.org/wiki/Maggie_Simpson'
    ]
];

// function filter(array $members, $fn) : array
// {
//     $filteredMembers = [];

//     foreach ($members as $member) {
//         if($fn($member)) {
//             $filteredMembers[] = $member;
//         }
//     }
//     return $filteredMembers;
// }

$filteredMembers = array_filter($members, function ($member) {
    return $member['lastname'] == 'Bouvier';
});

// Rendere Html
require 'index.view.php';
