<?php
$config = require base_path('config.php');
$db = new Database($config['database']);


$query = "select * from notes";
$notes = $db->query($query)->getAll();

// dumpAndDie($notes);

// Rendere Html
view('/notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);

