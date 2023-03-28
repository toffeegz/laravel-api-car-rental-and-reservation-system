<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Log;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use App\Repositories\Verification\VerificationRepositoryInterface;
use App\Services\Utils\File\FileServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $modelRepository;
    private FileServiceInterface $fileService;
    private VerificationRepositoryInterface $verificationRepository;
    private $folderName;

    public function __construct(
        UserRepositoryInterface $modelRepository,
        FileServiceInterface $fileService,
        VerificationRepositoryInterface $verificationRepository,
    ) {
        $this->modelRepository = $modelRepository;
        $this->fileService = $fileService;
        $this->verificationRepository = $verificationRepository;
        $this->folderName = 'Users';
    }

    public function store(array $attributes, bool $is_admin)
    {
        try {
            if($is_admin === false) {
                if(isset($attributes['validid_verified_at'])) {
                    $attributes['verified_by'] = Auth::user()->id;
                } 
            }
    
            if(Auth::user()->role_id === Role::ADMINISTRATOR) {
                $attributes['branch_id'] = Auth::user()->branch_id;
            }

            $attributes['password'] = Hash::make(Str::random(64));
            $user = $this->modelRepository->create($attributes);

            if($attributes['notify_email_verification'] === true && $user && isset($attributes['email'])) {
                $verification = $this->verificationRepository->createVerification($user->id, 'register');
                Mail::to($user->email)->send(new VerifyEmail($user, $verification['token']));
            }

            return $user;
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }
}
