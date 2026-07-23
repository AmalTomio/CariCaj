<?php

namespace App\Repositories\Contracts;

interface StationRepositoryInterface
{
    public function all();

    public function find(int $id);

    public function nearby(
        float $latitude,
        float $longitude,
        float $radius,
        ?int $limit = null
    );

    public function search(array $filters);
}