<?php

namespace Tests\Unit;

use App\Helpers\ResponseFormat;
use App\Repositories\MotorRepository;
use App\Services\MotorService;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Tests\TestCase as BaseTestCase;

class MotorServiceTest extends BaseTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getMotors()
    {
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $motorService = new MotorService($motorRepoSpy);
        $getMotors = $motorService->getMotors();

        $motorRepoSpy->shouldHaveReceived("getAll");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getMotorsTrashed()
    {
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $motorService = new MotorService($motorRepoSpy);
        $getMotors = $motorService->getMotorsTrashed();

        $motorRepoSpy->shouldHaveReceived("getTrashed");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_findMotor()
    {
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $motorService = new MotorService($motorRepoSpy);
        $getMotors = $motorService->findMotor(1);

        $motorRepoSpy->shouldHaveReceived("findById");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_updateMotor_validate_true()
    {
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $motorService = new MotorService($motorRepoSpy);

        $data = [
            "warna" => "merah",
            "harga" => 123,
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(false);

        $updateMotor = $motorService->updateMotor($request, 1);

        $motorRepoSpy->shouldHaveReceived("update");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_updateMotor_validate_false()
    {
        $responseSpy = Mockery::spy(ResponseFormat::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $motorService = new MotorService($motorRepoSpy);

        $data = [
            "warna" => "merah",
            "harga" => 123,
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(true);

        $responseSpy->shouldHaveReceive("validationResponse");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_deleteMotor()
    {
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $motorService = new MotorService($motorRepoSpy);
        $deleteMotor = $motorService->deleteMotor(1);

        $motorRepoSpy->shouldHaveReceived("delete");
        $this->assertTrue(true);
    }
}
