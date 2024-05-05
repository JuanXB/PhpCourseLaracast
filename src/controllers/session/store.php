<?php
use core\App;
use core\Database;
use core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Is not a valid email.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Is not a valid password.';
}

if (!empty($errors)) {
    return view('/registration/create.view.php', ['errors' => $errors]);
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
