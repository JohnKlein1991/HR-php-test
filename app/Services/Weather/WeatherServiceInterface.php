<?php

namespace App\Services\Weather;

interface WeatherServiceInterface
{
    public function getCurrentWeatherDataByCityName(string $cityName): array;
}