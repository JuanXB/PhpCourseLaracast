<?php

$router->get('/', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->delete('/notes' ,'controllers/notes/destroy.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->path('/notes/update', 'controllers/notes/update.php');

$router->get('/note' ,'controllers/notes/show.php');
$router->get('/note/create', 'controllers/notes/create.php');




