<?php

require 'helpersFunctions.php';

//require 'router.php';


// Connect with msql database

$dns = "mysql:host=db;port=3306;dbname=mydatabase;user=root;charset=utf8";

$pdo = new PDO($dns);

$stm = $pdo->prepare("select * from posts");

$stm->execute();

$posts = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo '<li>'.$post['title'].'</li>';
}