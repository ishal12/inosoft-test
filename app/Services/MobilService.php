<?php

declare(strict_types=1);

namespace App\Services;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Repositories\MobilRepository;

class MobilService
{
    protected $mobilRepository;

    public function __construct(MobilRepository $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }

    public function getMobils()
    {
        return $this->mobilRepository->getAll();
    }

    public function findMobil($id)
    {
        return $this->mobilRepository->findById($id);
    }
}
