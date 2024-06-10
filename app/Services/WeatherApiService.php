<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherApiService
{
    public function fetchWeatherData(): ?array
    {
        try {
            $city = config('weather.city');
            $apiKey = config('weather.apiid');

            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error("Failed to fetch weather data for city: $city", [
                    'response' => $response->body(),
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Exception occurred while fetching weather data: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);
        }

        return null;
    }
}
