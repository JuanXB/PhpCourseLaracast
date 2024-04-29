<?php

use core\Database;
use core\Validator;
use core\App;

$body = trim($_POST['body']);
$id =  $_POST['id'];

$db = App::resolver(Database::class);

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $id])->findOrFail();

$currentUser = 1;

authorized($note['user_id'] === $currentUser);

$errors = [];

if (!Validator::string($body, 1, 1000)) {
    $errors['body'] = 'The body cant not be more than 1,000 characters and is required';
}

if (!empty($errors)) {
    return view('/notes/edit.view.php', ['heading' => 'New Note', 'errors' => $errors]);
}


$query = 'UPDATE notes SET body= :body WHERE id=:id';
$db->query($query, ['body' => $body, 'id' => $id]);

header('location: /notes');
die();
