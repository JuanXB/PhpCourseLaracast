<?php
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$query = "select * from notes where id = :id";
$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();



$currentUser = $note['user_id'];

authorized($note['user_id'] === 1);

// Rendere Html
view('/notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);

