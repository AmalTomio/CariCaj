<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\StationRepositoryInterface;
use App\Repositories\Eloquent\StationRepository;
use App\Providers\Station\Contracts\StationProviderInterface;
use App\Providers\Station\OpenChargeMapProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
         $this->app->bind(
        StationRepositoryInterface::class,
        StationRepository::class
    );

    $this->app->bind(
    StationProviderInterface::class,
    OpenChargeMapProvider::class
);
    }

    public function boot(): void
    {
        //
    }
}