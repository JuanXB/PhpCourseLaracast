<?php
use Core\Database;
use Core\App;


$db = App::resolver(Database::class);

$query = 'SELECT * FROM notes';
$notes = $db->query($query)->getAll();

// Rendere Html
view('/notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);

