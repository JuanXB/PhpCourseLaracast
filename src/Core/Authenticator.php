<?php
use Core\App;
use Core\Database;
use Core\Session;

class Authenticator
{

    public function attempt(string $email, string $password): bool
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        $user = App::resolver(Database::class)->query($query, ['email' => $email])->find();

        if ($user && password_verify($password, $user['password'])) {
            $this->login([
                'email' => $email
            ]);

            return true;
        }

        return false;
    }

    function login(array $user): void
    {

        Session::put('user', [
            'email' => $user['email']
        ]);
        
        session_regenerate_id(true);
    }

    function logout(): void
    {
        Session::destroy();
    }
}