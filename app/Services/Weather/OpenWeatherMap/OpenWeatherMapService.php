<?php

namespace App\Services\Weather\OpenWeatherMap;

use App\Services\Weather\WeatherServiceInterface;
use GuzzleHttp\Client;

class OpenWeatherMapService implements WeatherServiceInterface
{
    private $getCurrentWeatherURI = 'https://api.openweathermap.org/data/2.5/weather';

    private $getWeatherIconUri = 'https://openweathermap.org/img/wn';

    private $apiKey;

    /**
     * Значение параметра units в запросе для получение температуры в градусах по Цельсию
     * @var string
     */
    private $celsiusMetricValue = 'metric';

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->apiKey = env('OPENWEATHER_API_KEY');
        $this->client = $client;
    }

    public function getCurrentWeatherDataByCityName(string $cityName): array
    {
        $parameters = [
            'q' => $cityName,
            'units' => 'metric'
        ];

        $data = $this->sendRequest($this->getCurrentWeatherURI, $parameters)
            ->getBody()
            ->getContents();
        $data = \GuzzleHttp\json_decode($data, true);

        $currentTemp = $this->getCurrentTemp($data);
        $feelsLikeTemp = $this->getFeelsLikeTemp($data);
        $pressure = $this->getPressure($data);
        $iconURI = $this->getIconURI($data);

        return [
            'current_temp' => $currentTemp,
            'feels_like_temp' => $feelsLikeTemp,
            'pressure' => $pressure,
            'icon_uri' => $iconURI
        ];
    }

    private function getCurrentTemp(array $data)
    {
        return $data['main']['temp'] ?? null;
    }

    private function getFeelsLikeTemp(array $data)
    {
        return $data['main']['feels_like'] ?? null;
    }

    private function getPressure(array $data)
    {
        return $data['main']['pressure'] ?? null;
    }

    private function getIconURI(array $data)
    {
        $iconName = $data['weather'][0]['icon'] ?? null;
        if ($iconName === null) {
            return null;
        }
        return "{$this->getWeatherIconUri}/{$iconName}.png";
    }

    private function sendRequest(string $uri, array $parameters = [], string $method = 'GET')
    {
        $parameters['appid'] = $this->apiKey;
        return $this->client->request($method, $uri, [
            'query' => $parameters
        ]);
    }
}