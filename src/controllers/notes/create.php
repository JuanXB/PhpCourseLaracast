<?php

use core\Database;
use core\Validator;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = trim($_POST['body']);


    if (! Validator::string($body, 1, 1000)) {
        $errors['body'] = 'The body cant not be more than 1,000 characters and is required';
    }

    if (empty($errors)) {
        $config = require base_path('config.php');
        $db = new Database($config['database']);


        $query = 'INSERT INTO notes(body, user_id) VALUES (:body,:user_id)';
        $db->query($query, ['body' => $body, 'user_id' => 1]);
        header('location: /notes');
    }

}


// Rendere Html
view('/notes/create.view.php', ['heading' => 'New Note', 'errors' => $errors]);

