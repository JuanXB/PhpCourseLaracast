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
    $members = ['Homer', 'Marge', 'Bart', 'Lisa', 'Maggie']
    ?>

    <ul>
        <?php foreach ($members as $member) : ?>
            <li><?=$member?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>