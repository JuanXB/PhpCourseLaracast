<?php

$router->get('/', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');
$router->delete('/notes' ,'controllers/notes/destroy.php')->only('auth');

$router->get('/notes/edit', 'controllers/notes/edit.php')->only('auth');
$router->path('/notes/update', 'controllers/notes/update.php')->only('auth');

$router->get('/note' ,'controllers/notes/show.php')->only('auth');
$router->get('/note/create', 'controllers/notes/create.php')->only('auth');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');





