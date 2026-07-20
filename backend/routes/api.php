<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StationController;

Route::prefix('stations')->group(function () {

    Route::get('/', [StationController::class, 'index']);

    Route::get('/nearby', [StationController::class, 'nearby']);

    Route::get('/{id}', [StationController::class, 'show']);

});
