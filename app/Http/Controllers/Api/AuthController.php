<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\User\RegisterRequest;

class AuthController extends Controller
{

    private UserService $userService;

    public function __construct( UserService $userService )
    {
        $this->userService = $userService;
    }

    public function login()
    {
        //
    }

    public function register( RegisterRequest $request )
    {
        return ;
    }

    public function logout()
    {
        //
    }
    
}
