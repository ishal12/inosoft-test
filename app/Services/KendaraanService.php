<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\KendaraanRepository;

class KendaraanService
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getKendaraans()
    {
        return $this->kendaraanRepository->getAll();
    }

    public function countKendaraans()
    {
        return count($this->kendaraanRepository->getAll());
    }
}
