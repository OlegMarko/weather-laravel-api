<?php

namespace App\Jobs;

use App\Services\WeatherApiService;
use App\Services\WeatherService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FetchWeatherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(WeatherApiService $weatherApiService, WeatherService $weatherService): void
    {
        try {
            $data = $weatherApiService->fetchWeatherData();
            if ($data) {
                $temperature = $data['main']['temp'];
                $weatherService->addTemperature($temperature);
            }
        } catch (\Exception $e) {
            Log::error("Exception occurred while handling FetchWeatherJob: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);
        }
    }
}
