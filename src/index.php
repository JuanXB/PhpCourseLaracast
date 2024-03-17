<?php

require 'helpersFunctions.php';

$uri = $_SERVER['REQUEST_URI'];


if($uri == '/about') {
    require 'controllers/about.php';
}
else if($uri == '/contact') {
    require 'controllers/contact.php';
}
else {
    require 'controllers/home.php';   
}

