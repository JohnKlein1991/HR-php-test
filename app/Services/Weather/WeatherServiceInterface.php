<?php

namespace App\Services\Weather;

/**
 * Interface WeatherServiceInterface
 * @package App\Services\Weather
 */
interface WeatherServiceInterface
{
    /**
     * @param string $cityName
     * @return array
     */
    public function getCurrentWeatherDataByCityName(string $cityName): array;
}