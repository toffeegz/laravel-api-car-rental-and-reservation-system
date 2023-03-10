<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    public function login(string $email, string $password, bool $is_google_auth);
    public function register(array $attributes, $image, bool $is_google_auth, string $role_id);
    public function verifyEmail(string $token);
    public function forgotPassword(string $email);
    public function changePassword(array $attributes);
    public function updateProfile(array $attributes, $profile_photo);
    public function verifyId(array $attributes, $user_id, $files);
}
