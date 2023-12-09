<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Course</title>
</head>

<body>
    <h1>Simpson Family</h1>
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
            'lastname' =>'Simpson',
            'wikiUrl' => 'https://es.wikipedia.org/wiki/Bart_Simpson'
        ],
        [
            'name' => 'Lisa Merie',
            'lastname' =>'Simpson',
            'wikiUrl' => 'https://es.wikipedia.org/wiki/Lisa_Simpson'
        ],
        [
            'name' => 'Margaret',
            'lastname' =>'Simpson',
            'wikiUrl' => 'https://es.wikipedia.org/wiki/Maggie_Simpson'
        ]
    ];

    function filterByLastname(array $members, string $lastname) : array
    {
        $filteredMembers = [];

        foreach ($members as $member) {
            if($member['lastname'] === $lastname) {
                $filteredMembers[] = $member;
            }
        }
        return $filteredMembers;
    }
    ?>

    <ul>
        <?php foreach (filterByLastname($members, 'Bouvier') as $member) : ?>
            <a href="<?=$member['wikiUrl']?>">
            <li><?=$member['name']?> <?=$member['lastname']?></li>
            </a>
            <br>
        <?php endforeach; ?>
    </ul>
</body>

</html>