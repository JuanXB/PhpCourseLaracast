<?php
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if (!$form->validateFails($email, $password)) {

    $auth = App::resolver(Authenticator::class);

    if ($auth->attempt($email, $password)) {
        redirect();
    }

    $form->addError('email', 'Not matching account found for that email address and password.');
}

return view('/session/create.view.php', ['errors' => $form->errors()]);
