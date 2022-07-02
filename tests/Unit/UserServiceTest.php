<?php

namespace Tests\Unit;

use App\Helpers\ResponseFormat;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Tests\TestCase as BaseTestCase;

class UserServiceTest extends BaseTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register_true()
    {
        $userRepoSpy = Mockery::spy(UserRepository::class);

        $userService = new UserService($userRepoSpy);

        $data = [
            "warna" => "merah",
            "harga" => 123,
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $register = $userService->register($request);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(false);

        $userRepoSpy->shouldReceived("register");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register_false()
    {
        $responseSpy = Mockery::spy(ResponseFormat::class);
        $userRepoSpy = Mockery::spy(UserRepository::class);

        $userService = new UserService($userRepoSpy);

        $data = [
            "warna" => "merah",
            "harga" => 123,
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $register = $userService->register($request);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(true);

        $responseSpy->shouldHaveReceive("validationResponse");
        $this->assertTrue(true);
    }
}
