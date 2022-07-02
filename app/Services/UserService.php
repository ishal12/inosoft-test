<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\ResponseFormat;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($data)
    {
        $validator = Validator::make($data->all(), [
            "username" => "required|string|min:6|max:12",
            "password" => "required|string|min:6",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return $this->userRepository->register(
            $data["username"],
            Hash::make($data["password"])
        );
    }
}
