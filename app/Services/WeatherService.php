<?php

namespace App\Services;

use App\Models\Weather;
use Illuminate\Support\Collection;

class WeatherService
{
    public function getTemperaturesForDay(string $day): Collection
    {
        return Weather::whereDate('created_at', $day)
            ->where('city', config('weather.city'))
            ->get();
    }

    public function addTemperature(float $temperature): Weather
    {
        return Weather::create([
            'city' => config('weather.city'),
            'temperature' => $temperature,
        ]);
    }
}
