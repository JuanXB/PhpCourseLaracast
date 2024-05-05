<?php
use core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validateFails(string $email, string $password): bool
    {

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Is not a valid email.';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Is not a valid password.';
        }

        return ! empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}