<?php
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $query = 'SELECT * FROM notes WHERE id = :id';
    $note = $db->query($query, ['id' => $_GET['id']])->findOrFail();

    $currentUser = $note['user_id'];

    authorized($note['user_id'] === 1);

    $query = 'DELETE FROM notes WHERE id = :id';
    $db->query($query, ['id' => $_GET['id']]);

    header('location: /notes');
    exit();
}

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();

$currentUser = $note['user_id'];

authorized($note['user_id'] === 1);

// Rendere Html
view('/notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);

