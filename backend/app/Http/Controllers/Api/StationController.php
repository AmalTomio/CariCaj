<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StationResource;
use App\Services\StationService;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function __construct(
        protected StationService $stationService
    ) {
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Stations retrieved successfully.',
            'data' => StationResource::collection(
                $this->stationService->getAll()
            ),
        ]);
    }
    
public function nearby(Request $request) { $validated = $request->validate([ 'lat' => ['required', 'numeric'], 'lng' => ['required', 'numeric'], 'radius' => ['nullable', 'numeric'], ]); $stations = $this->stationService->nearby( $validated['lat'], $validated['lng'], $validated['radius'] ?? 25 ); return response()->json([ 'success' => true, 'data' => StationResource::collection($stations), ]); }
    public function show(int $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Station retrieved successfully.',
            'data' => new StationResource(
                $this->stationService->getById($id)
            ),
        ]);
    }
}