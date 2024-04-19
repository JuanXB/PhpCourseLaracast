<?php
require 'Validator.php';

$heading = 'New Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = trim($_POST['body']);
    $errors = [];


    if (! Validator::string($body, 1, 1000)) {
        $errors['body'] = 'The body cant not be more than 1,000 characters and is required';
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
require 'views/notes/create.view.php';
