<?php
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$query = 'SELECT * FROM notes';
$notes = $db->query($query)->getAll();

// dumpAndDie($notes);

// Rendere Html
view('/notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);

