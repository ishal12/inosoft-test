<?php

namespace Tests\Unit;

use App\Repositories\KendaraanRepository;
use App\Services\KendaraanService;
use Mockery;
use Tests\TestCase as BaseTestCase;

class KendaraanServiceTest extends BaseTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getKendaraan()
    {
        $kendaraanRepoSpy = Mockery::spy(KendaraanRepository::class);

        $kendaraanService = new KendaraanService($kendaraanRepoSpy);
        $getKendaraans = $kendaraanService->getKendaraans();

        $kendaraanRepoSpy->shouldHaveReceived("getAll");
        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_countKendaraans()
    {
        $kendaraanRepoSpy = Mockery::spy(KendaraanRepository::class);

        $kendaraanService = new KendaraanService($kendaraanRepoSpy);
        $countKendaraan = $kendaraanService->getKendaraans();

        $kendaraanRepoSpy->shouldHaveReceived("getAll");
        $this->assertTrue(true);
    }
}
