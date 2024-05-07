<?php
use Core\Validator;

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

    public function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }
}