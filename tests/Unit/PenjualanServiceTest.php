<?php

namespace Tests\Unit;

use App\Helpers\ResponseFormat;
use App\Repositories\MobilRepository;
use App\Repositories\MotorRepository;
use App\Repositories\PenjualanRepository;
use App\Services\PenjualanService;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Tests\TestCase as BaseTestCase;

class PenjualanServiceTest extends BaseTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getAll()
    {
        $penjualanRepoSpy = Mockery::spy(PenjualanRepository::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $PenjualanService = new PenjualanService(
            $penjualanRepoSpy,
            $mobilRepoSpy,
            $motorRepoSpy
        );
        $getPenjualan = $PenjualanService->getAll();

        $penjualanRepoSpy->shouldHaveReceived("getAll");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_findPenjualan()
    {
        $penjualanRepoSpy = Mockery::spy(PenjualanRepository::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $PenjualanService = new PenjualanService(
            $penjualanRepoSpy,
            $mobilRepoSpy,
            $motorRepoSpy
        );
        $findPenjualan = $PenjualanService->findPenjualan(1);

        $penjualanRepoSpy->shouldHaveReceived("findById");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_findPenjualanByKendaraan()
    {
        $penjualanRepoSpy = Mockery::spy(PenjualanRepository::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $PenjualanService = new PenjualanService(
            $penjualanRepoSpy,
            $mobilRepoSpy,
            $motorRepoSpy
        );
        $findPenjualan = $PenjualanService->findPenjualanByKendaraan("mobil");

        $penjualanRepoSpy->shouldHaveReceived("findByType");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_storePenjualan_true_mobil()
    {
        $penjualanRepoSpy = Mockery::spy(PenjualanRepository::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $PenjualanService = new PenjualanService(
            $penjualanRepoSpy,
            $mobilRepoSpy,
            $motorRepoSpy
        );

        $data = [
            "tipe_kendaraan" => "mobil",
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $storePenjualan = $PenjualanService->storePenjualan($request);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(false);

        $mobilRepoSpy->shouldReceived("delete");

        $penjualanRepoSpy->shouldReceived("store");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_storePenjualan_true_motor()
    {
        $penjualanRepoSpy = Mockery::spy(PenjualanRepository::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $PenjualanService = new PenjualanService(
            $penjualanRepoSpy,
            $mobilRepoSpy,
            $motorRepoSpy
        );

        $data = [
            "tipe_kendaraan" => "mobil",
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $storePenjualan = $PenjualanService->storePenjualan($request);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(false);

        $motorRepoSpy->shouldReceived("delete");

        $penjualanRepoSpy->shouldReceived("store");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_storePenjualan_false()
    {
        $responseSpy = Mockery::spy(ResponseFormat::class);
        $penjualanRepoSpy = Mockery::spy(PenjualanRepository::class);
        $mobilRepoSpy = Mockery::spy(MobilRepository::class);
        $motorRepoSpy = Mockery::spy(MotorRepository::class);

        $PenjualanService = new PenjualanService(
            $penjualanRepoSpy,
            $mobilRepoSpy,
            $motorRepoSpy
        );

        $data = [
            "tipe_kendaraan" => "mobil",
        ];

        $request = Mockery::mock("stdClass");
        $request->shouldReceive("all")->andReturn($data);

        $storePenjualan = $PenjualanService->storePenjualan($request);

        $validator = Mockery::mock("stdClass");
        $validator->shouldReceive("make")->andReturn($validator);
        Validator::swap($validator);

        $validator->shouldReceive("fails")->andReturn(true);

        $responseSpy->shouldHaveReceive("validationResponse");
        $this->assertTrue(true);
    }
}
