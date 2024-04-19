<?php
$heading = 'My Note';

$config = require 'config.php';
$db = new Database($config['database']);


$query = "select * from notes where id = :id";
$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();



$currentUser = $note['user_id'];

authorized($note['user_id'] === 1);

// Rendere Html
require 'views/notes/show.view.php';
