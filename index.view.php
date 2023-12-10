<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Course</title>
</head>

<body>
    <h1>Simpson Family</h1>

    <ul>
        <?php foreach ($filteredMembers as $member) : ?>
            <a href="<?= $member['wikiUrl'] ?>">
                <li><?= $member['name'] ?> <?= $member['lastname'] ?></li>
            </a>
            <br>
        <?php endforeach; ?>
    </ul>
</body>

</html>