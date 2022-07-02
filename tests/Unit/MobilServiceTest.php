<?php

namespace Tests\Unit;

use App\Helpers\ResponseFormat;
use App\Repositories\MobilRepository;
use App\Services\MobilService;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Tests\TestCase as BaseTestCase;

class MobilServiceTest extends BaseTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getMobils()
    {
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);

        $mobilService = new MobilService($mobilRepoSpy);
        $getMobils = $mobilService->getMobils();

        $mobilRepoSpy->shouldHaveReceived("getAll");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getMobilsTrashed()
    {
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);

        $mobilService = new MobilService($mobilRepoSpy);
        $getMobils = $mobilService->getMobilsTrashed();

        $mobilRepoSpy->shouldHaveReceived("getTrashed");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_findMobil()
    {
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);

        $mobilService = new MobilService($mobilRepoSpy);
        $getMobils = $mobilService->findMobil(1);

        $mobilRepoSpy->shouldHaveReceived("findById");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_updateMobil_validate_true()
    {
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);

        $mobilService = new MobilService($mobilRepoSpy);

        $data = [
            "warna" => "merah",
            "harga" => 123,
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $getMobils = $mobilService->updateMobil($request, 1);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(false);

        $mobilRepoSpy->shouldHaveReceived("update");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_updateMobil_validate_false()
    {
        $responseSpy = Mockery::spy(ResponseFormat::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);

        $mobilService = new MobilService($mobilRepoSpy);

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
    public function test_deleteMobil()
    {
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);

        $mobilService = new MobilService($mobilRepoSpy);
        $delete = $mobilService->deleteMobil(1);

        $mobilRepoSpy->shouldHaveReceived("delete");
        $this->assertTrue(true);
    }
}
