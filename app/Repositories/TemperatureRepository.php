<?php


namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class TemperatureRepository
{
    private $config = [];
    private $guzz;

    public function __construct(Client $guzz)
    {
        $this->guzz = $guzz;
        $this->config = Config::get('temperature');
    }

    public function getTemper($city, $count)
    {
        $resp = $this->getLocal($city, $count);

        $body = [
            'query' => [
                    'lat'=> $resp->lat,
                    'lon'=> $resp->lon,
                    'lang'=> "ru_RU",
                    'limit' => 1,
                    'hours' => 'false',
                    'extra' => 'false',
                    'format'  => 'json',
            ],
            'headers' => [
                'X-Yandex-API-Key' => $this->config['token'],
            ]
        ];

        $resp = $this->getResp($this->config['url']['temper'], $body);
        return $resp->fact->temp;
    }

    private function getLocal($city, $count)
    {
        $body = [
            'query' => [
                'country' => $count,
                'city'    => $city,
                'limit'   => '1',
                'format'  => 'json',
            ],
        ];
        return $this->getResp($this->config['url']['coords'], $body)[0];

    }

    private function getResp($url, $body)
    {
        $resp =  $this->guzz->get($url, $body);
        if($resp)
            return json_decode($resp->getBody()->getContents());
    }
}