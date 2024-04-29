<?php
use core\App;
use core\Database;

$db = App::resolver(Database::class);

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();

$currentUser = 1;

authorized($note['user_id'] === $currentUser);

view('/notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);