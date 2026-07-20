<?php

namespace App\Services;

use App\Repositories\Contracts\StationRepositoryInterface;

class StationService
{
    public function __construct(
        protected StationRepositoryInterface $stationRepository
    ) {
    }

    public function getAll()
    {
        return $this->stationRepository->all();
    }

    public function getById(int $id)
    {
        return $this->stationRepository->find($id);
    }

    public function nearby(
        float $latitude,
        float $longitude,
        float $radius
    ) {
        return $this->stationRepository->nearby(
            $latitude,
            $longitude,
            $radius
        );
    }

    public function search(array $filters)
    {
        return $this->stationRepository->search($filters);
    }
}