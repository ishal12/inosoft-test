<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($username, $password)
    {
        $user = User::create([
            "username" => $username,
            "password" => $password,
        ]);

        return $user;
    }
}
