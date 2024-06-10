<?php

use App\Jobs\FetchWeatherJob;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new FetchWeatherJob)->hourly();
