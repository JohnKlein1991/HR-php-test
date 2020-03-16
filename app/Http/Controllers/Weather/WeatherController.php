<?php

namespace App\Http\Controllers\Weather;

use App\Services\Weather\WeatherServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class WeatherController
 * @package App\Http\Controllers\Weather
 */
class WeatherController extends Controller
{
    /**
     * @var WeatherServiceInterface
     */
    private $service;

    /**
     * WeatherController constructor.
     * @param WeatherServiceInterface $service
     */
    public function __construct(WeatherServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $cityName
     * @return array
     */
    public function getByCityName(string $cityName)
    {
        return $this->service->getCurrentWeatherDataByCityName($cityName);
    }
}
