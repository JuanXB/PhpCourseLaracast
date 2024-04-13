<?php

require 'helpersFunctions.php';
require 'Database.php';
//require 'router.php';

$config = require 'config.php';

$db = new Database($config['database']);


$query = "select * from notes";
$post = $db->query($query)->fetchAll();

dumpAndDie($post);
// foreach ($posts as $post) {
//     echo '<li>'.$post['title'].'</li>';
// }