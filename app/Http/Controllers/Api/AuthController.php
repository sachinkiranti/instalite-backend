<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\User\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{

    private UserService $userService;

    public function __construct( UserService $userService )
    {
        $this->userService = $userService;
    }

    public function register( RegisterRequest $request ): JsonResponse
    {
        $user = $this->userService->create($request->validated());

        return $this->responseOk([
            'user'  => $user,
            'token' => $user->createToken('secret')->plainTextToken,
        ], 'You have successfully registered.');
    }

    public function login( LoginRequest $request )
    {
        if (! Auth::attempt($request->validated()) ) {
            return $this->responseError(
                null,
                Response::HTTP_FORBIDDEN,
                'Invalid Credentials'
            );
        }

        // Logged in user
        $user = $this->userService->user();

        return $this->responseOk([
            'user'  => $user,
            'token' => $user->createToken('secret')->plainTextToken,
        ], 'You have successfully logged in.');
    }

    public function logout()
    {
        $this->userService->user()->tokens()->delete();
        return $this->responseOk(
            null,
            'You have been successfully logged out.'
        );
    }

    public function user()
    {
        return $this->responseOk(
            $this->userService->user()
        );
    }
    
}
