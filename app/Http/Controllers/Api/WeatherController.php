<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use App\Http\Resources\WeatherResource;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __invoke(WeatherService $weatherService, WeatherRequest $request): JsonResponse
    {
        $day = $request->validated('day');
        $temperatures = $weatherService->getTemperaturesForDay($day);

        return response()->json(WeatherResource::collection($temperatures));
    }
}
