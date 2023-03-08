<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Session\Store;
use Session;
use Illuminate\Support\Carbon;
use File; 
use Illuminate\Validation\ValidationException;

use App\Services\Utils\Response\ResponseServiceInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RegisterCustomerRequest;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    private AuthServiceInterface $modelService;
    private UserRepositoryInterface $modelRepository;
    private ResponseServiceInterface $responseService;

    public function __construct(
        AuthServiceInterface $modelService,
        UserRepositoryInterface $modelRepository,
        ResponseServiceInterface $responseService,
    ) {
        $this->modelService = $modelService;
        $this->modelRepository = $modelRepository;
        $this->responseService = $responseService;
    }

    public function login(LoginRequest $request)
    {
        $result = $this->modelService->login($request->email, $request->password, false);
        return $this->responseService->resolveResponse("Login Successful", $result);
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->modelService->register($request->all(), null, false, '');
        return $this->responseService->resolveResponse("Register Successful", $result);
    }

    public function verifyEmail($token)
    {
        $result = $this->modelService->verifyEmail($token);
        return $this->responseService->resolveResponse("Verify Successful", $result);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        // try {
        //     $google_user = Socialite::driver('google')->user();
        // } catch (InvalidStateException $e) {
            $google_user = Socialite::driver('google')->stateless()->user();
        // }
        

        $user = $this->modelRepository->getByEmail($google_user->email);
        //register 
        if (!$user) {
            $attributes = [
                'name' => $google_user->name,
                'google_id' => $google_user->id,
                'email' => $google_user->email,
                'email_verified_at' => Carbon::now(),
                'is_active' => true
            ];
            $user = $this->modelService->register($attributes, $google_user->getAvatar(), true, '');
        }

        $token = $user->createToken(config('app.name'), ['server:update']);

        $url = config('selfdriveph.frontend_url') . 'api/login/google/?token=' . $token->plainTextToken . '&user=' . $user;
        Log::info($url);
        return Redirect::to($url);
    }

    public function profile()
    {
        $user = Auth::user();
        return $this->responseService->resolveResponse(__('Auth User'), $user);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->responseService->resolveResponse("Logout Successful", null);
    }

    public function resetPassword(SendResetPasswordRequest $request)
    {
        // $result = $this->authService->sendResetPassword($request->email, "true");
        // return $this->responseService->storeResponse("Code", $result);
    }

    public function updateProfile(Request $request)
    {
        // $result = $this->authService->resetPassword($request->get('code'));
        // return $this->responseService->successResponse("Reset Password", $result);
    }
}
