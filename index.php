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
            'age' => 39
        ],
        [
            'name' => 'Marjorie',
            'lastname' => 'Bouvier',
            'age' => 34
        ],
        [
            'name' => 'Bartholomew',
            'lastname' =>'Simpson',
            'age' => 10
        ],
        [
            'name' => 'Lisa Merie',
            'lastname' =>'Simpson',
            'age' => 8
        ],
        [
            'name' => 'Margaret',
            'lastname' =>'Simpson',
            'age' => 1
        ]
    ];
    ?>

    <ul>
        <?php foreach ($members as $member) : ?>
            <li>Name: <?=$member['name']?></li>
            <li>Lastname: <?=$member['lastname']?></li>
            <li>Age: <?=$member['age']?></li>
            <br>
        <?php endforeach; ?>
    </ul>
</body>

</html>