<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    private User $user;

    public function __construct( User $user )
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function user()
    {
        return auth()->user();
    }

}