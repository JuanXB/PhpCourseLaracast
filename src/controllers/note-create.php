<?php
$heading = 'New Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = trim($_POST['body']);
    $errors = [];

    if (strlen($body) === 0) {
        $errors['body'] = 'The body is required';
    }

    if (strlen($body) > 1000) {
        $errors['body'] = 'The body cant not be more than 1,000 characters.';
    }

    if (empty($errors)) {
        $config = require 'config.php';
        $db = new Database($config['database']);


        $query = 'INSERT INTO notes(body, user_id) VALUES (:body,:user_id)';
        $db->query($query, ['body' => $body, 'user_id' => 1]);
        $body ='';
    }

}


// Rendere Html
require 'views/note-create.view.php';
