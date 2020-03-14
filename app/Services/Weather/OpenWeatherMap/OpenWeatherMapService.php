<?php

namespace App\Services\Weather\OpenWeatherMap;

use App\Services\Weather\WeatherServiceInterface;

class OpenWeatherMapService implements WeatherServiceInterface
{
    public function getCurrentWeatherDataByCityName(string $cityName): array
    {
        return [];
    }
}