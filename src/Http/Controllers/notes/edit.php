<?php
use Core\App;
use Core\Database;

$db = App::resolver(Database::class);

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();

$currentUser = 3;

authorized($note['user_id'] === $currentUser);

view('/notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);