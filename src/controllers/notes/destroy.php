<?php
use core\App;
use core\Database;

$db = App::resolver(Database::class);

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $_POST['id']])->findOrFail();

$currentUser = 3;

authorized($note['user_id'] === $currentUser);

$query = 'DELETE FROM notes WHERE id = :id';
$db->query($query, ['id' => $_POST['id']]);

header('location: /notes');
exit();