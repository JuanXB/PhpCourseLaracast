<?php
$heading = 'My Note';

$config = require 'config.php';
$db = new Database($config['database']);


$query = "select * from notes where id = :id";
$note = $db->query($query, ['id' => $_GET['id']])->fetch();

if(! $note) {
    abort();
}

$currentUser = $note['user_id'];


if($currentUser !== 1) {
    abort(Response::FORBIDDEN);
}

// Rendere Html
require 'views/note.view.php';
