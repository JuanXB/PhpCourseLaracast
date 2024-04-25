<?php
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $_POST['id']])->findOrFail();

$currentUser = $note['user_id'];

authorized($note['user_id'] === 1);

$query = 'DELETE FROM notes WHERE id = :id';
$db->query($query, ['id' => $_POST['id']]);

header('location: /notes');
exit();