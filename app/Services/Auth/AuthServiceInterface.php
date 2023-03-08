<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    public function login(string $email, string $password, bool $is_google_auth);
    public function register(array $attributes, $image, bool $is_google_auth, string $role_id);
    public function verifyEmail(string $token);
}
