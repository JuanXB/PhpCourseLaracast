<?php

use core\Database;
use core\Validator;
use core\App;

$errors = [];

$body = trim($_POST['body']);


if (!Validator::string($body, 1, 1000)) {
    $errors['body'] = 'The body cant not be more than 1,000 characters and is required';
}

if (!empty($errors)) {
    return view('/notes/create.view.php', ['heading' => 'New Note', 'errors' => $errors]);
}

$db = App::resolver(Database::class);

$query = 'INSERT INTO notes(body, user_id) VALUES (:body,:user_id)';
$db->query($query, ['body' => $body, 'user_id' => 1]);

header('location: /notes');
die();
