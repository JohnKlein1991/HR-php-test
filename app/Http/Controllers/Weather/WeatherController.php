<?php

namespace App\Http\Controllers\Weather;

use App\Services\Weather\WeatherServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    /**
     * @var WeatherServiceInterface
     */
    private $service;

    public function __construct(WeatherServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getByCityName(string $cityName)
    {
        return "test $cityName";
    }
}
