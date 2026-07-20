<?php

namespace App\Repositories\Contracts;

interface StationRepositoryInterface
{
    public function all();

    public function nearby(
        float $latitude,
        float $longitude,
        float $radius
    );

    public function find(int $id);

    public function search(array $filters);
}