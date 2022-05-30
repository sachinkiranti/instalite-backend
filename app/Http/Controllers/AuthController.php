<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

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

    public function register()
    {
        //
    }

    public function logout()
    {
        //
    }
    
}
