<?php


namespace App\Services;


use App\Repositories\TemperatureRepository;
use Illuminate\Support\ServiceProvider;

class TemperatureService extends ServiceProvider
{

    protected $repo;

    public function __construct(TemperatureRepository $temperatureRepository)
    {
        $this->repo = $temperatureRepository;
    }

    public function temper($city, $count)
    {
        return $this->repo->getTemper($city, $count);
    }

}