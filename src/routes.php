<?php

$router->get('/', 'home.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');
$router->delete('/notes' ,'notes/destroy.php')->only('auth');

$router->get('/notes/edit', 'notes/edit.php')->only('auth');
$router->path('/notes/update', 'notes/update.php')->only('auth');

$router->get('/note' ,'notes/show.php')->only('auth');
$router->get('/note/create', 'notes/create.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/session', 'session/create.php')->only('guest');
$router->post('/session/login', 'session/store.php')->only('guest');
$router->delete('/session/logout' ,'session/destroy.php')->only('auth');



