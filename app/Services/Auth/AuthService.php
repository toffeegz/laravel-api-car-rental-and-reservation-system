<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Log;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Services\Utils\File\FileServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\Verification; 
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerifyEmail;
use App\Mail\Auth\ForgotPasswordEmail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AuthService implements AuthServiceInterface
{
    private UserRepositoryInterface $modelRepository;
    private CustomerRepositoryInterface $customerRepository;
    private FileServiceInterface $fileService;
    private $folderName;

    public function __construct(
        UserRepositoryInterface $modelRepository,
        CustomerRepositoryInterface $customerRepository,
        FileServiceInterface $fileService,
    ) {
        $this->modelRepository = $modelRepository;
        $this->fileService = $fileService;
        $this->folderName = 'users';
    }

    public function login(string $email, string $password, bool $is_google_auth)
    {
        try 
        {
            $user = $this->modelRepository->getByEmail($email);
            if($user) {
                if($user->email_verified_at != null) {
                    if(Hash::check($password, $user->password) === true || $is_google_auth === true) {
                        Auth::login($user);
                        $creds = [
                            'token' => $user->createToken(config('app.name'))->plainTextToken,
                            'user' => $user,
                        ];
                        return $creds;
                    } else {
                        throw new AuthenticationException('Invalid credentials');
                    }
                } else {
                    throw new AuthorizationException('Account not verified');
                }
            } else {
                throw new AuthenticationException('Invalid credentials');
            }
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }
    
    public function register(array $attributes, $image, bool $is_google_auth, string $role_id)
    {
        try {

            $user = $this->modelRepository->getByEmail($attributes['email']);
            if(!$user)
            {
                // set password 
                if(isset($attributes['password'])) {
                    $attributes['password'] = Hash::make($attributes['password']);
                } else {
                    $attributes['password'] = Hash::make(Str::random(10));
                }
                
                if($is_google_auth === false) {
                    $attributes['is_active'] = false; // kaya to naka false kasi need muna ma verify yung email na ginamit
                }
                
                // create user
                if($role_id != '' && $role_id != null) {
                    $attributes['role_id'] = $role_id;
                }

                $user = $this->modelRepository->create($attributes);

                if($user && $is_google_auth === false) {
                    $token = Str::random(64);
                    $hashedToken = Hash::make($token);

                    // Create a new verification record
                    $verification = new Verification([
                        'user_id' => $user->id,
                        'token' => $hashedToken,
                        'type' => 'register'
                    ]);
                    $verification->save();

                    // Send a verification email to the user
                    Mail::to($user->email)->send(new VerifyEmail($user, $hashedToken));

                }

                if($image) {
                    // upload profile photo
                    // $file_name = $result->id;
                    // $photo_path = $this->fileService->upload($this->folderName, $file_name, $image);
                    // $new_attributes['profile_photo_path'] = $photo_path;
                    // $result = $this->modelRepository->update($new_attributes, $id); 
                }
            }
            

            return $user;
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'error' => $exception->getMessage(),
            ]);
        }
    }

    public function verifyEmail(string $token)
    {
        try {
            $verification = Verification::where('token', $token)
            ->where('type', 'register')
            ->firstOrFail();
            if($verification) {
                $user = $this->modelRepository->show($verification->user_id);
                if($user)
                {
                    if ($verification->isExpired()) {
                        $response = new JsonResponse(['message' => 'Verification token has expired'], 419);
                        throw new HttpResponseException($response);
                    }
                
                    if ($user->email_verified_at) {
                        $response = new JsonResponse(['message' => 'Email is already verified'], 400);
                        throw new HttpResponseException($response);
                    }
                
                    $user->email_verified_at = now();
                    $user->is_active = true;
                    $user->save();
                
                    try {
                        $verification->delete();
                    } catch (\Exception $e) {
                        // Log the error or output a message to the user
                        throw new \Exception('Unable to delete verification record: '.$e->getMessage());
                    }
                
                    return $user;
                }
            }
        } catch (ModelNotFoundException $e) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Verification token not found');
        }
    }

    public function forgotPassword(string $email)
    {
        try 
        {
            $user = $this->modelRepository->getByEmail($email);
            if($user) {
                if($user->email_verified_at === null) {
                    throw new AuthorizationException('Account not verified');
                } else {
                    $token = Hash::make(Str::random(64));

                    // Create a new verification record
                    $verification = new Verification([
                        'user_id' => $user->id,
                        'token' => $token,
                        'type' => 'forgot_password',
                    ]);
                    $verification->save();

                    // Send a verification email to the user
                    Mail::to($user->email)->send(new ForgotPasswordEmail($user, $token));
                }
            }
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }

    public function changePassword(array $attributes)
    {
        try {
            $verification = Verification::where('token', $attributes['token'])
                ->where('type', 'forgot_password')
                ->firstOrFail();

            if($verification) {
                $user = $this->modelRepository->show($verification->user_id);

                if ($user) {
                    $password = Hash::make($attributes['password']);
                    $user->password = $password;
                    $user->save();
                    $verification->delete();
                    return $user;
                } 
            }
        } catch (ModelNotFoundException $e) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Verification token not found');
        }
    }
}
