<?php
use core\Database;
use core\App;


$db = App::resolver(Database::class);

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();

$currentUser = $note['user_id'];

authorized($note['user_id'] === 1);

// Rendere Html
view('/notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);

