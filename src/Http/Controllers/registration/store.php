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

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'The password must be at least 7 characters.';
}

if (!empty($errors)) {
    return view('/registration/create.view.php', ['errors' => $errors]);
}

$db = App::resolver(Database::class);

$query = 'SELECT email FROM users WHERE email = :email';
$user = $db->query($query, ['email' => $email])->find();

if ($user) {
    redirect();
}

$hashPassword = password_hash($password, PASSWORD_BCRYPT);

$query = 'INSERT INTO users(email, password) VALUES (:email,:password)';
$db->query($query, ['email' => $email, 'password' => $hashPassword]);

login([
    'email' => $email
]);

redirect('/notes');
