<?php
use core\App;
use core\Database;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if ($form->validateFails($email, $password)) {
    return view('/registration/create.view.php', ['errors' => $form->errors()]);
}

$db = App::resolver(Database::class);

$query = 'SELECT * FROM users WHERE email = :email';
$user = $db->query($query, ['email' => $email])->find();

if ($user && password_verify($password, $user['password'])) {
    login([
        'email' => $email
    ]);

   redirect();
}

return view(
    '/session/create.view.php',
    [
        'errors' => ['email' => 'Not matching account found for that email address and password.']
    ]
);
