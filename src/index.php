<?php

require 'helpersFunctions.php';

//require 'router.php';


// Connect with msql database

$dns = "msql:host=localhost;port=3306;dbname=mydatabase;user=user;password=password;charset=utf8mb64";

$pdo = new PDO($dns);

$stm = $pdo->prepare("select * from post");

$stm->execute();

$posts = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo '<li>'.$post['title'].'</li>';
}