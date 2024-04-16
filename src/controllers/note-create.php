<?php
$heading = 'New Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $config = require 'config.php';
    $db = new Database($config['database']);


    $query = 'INSERT INTO notes(body, user_id) VALUES (:body,:user_id)';
    $note = $db->query($query, ['body' => $_POST['body'], 'user_id' => 1 ]);

}


// Rendere Html
require 'views/note-create.view.php';
