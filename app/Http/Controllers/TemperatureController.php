<?php

namespace App\Http\Controllers;

use App\Services\TemperatureService;

class TemperatureController extends Controller
{
    private $service;

    public function __construct(TemperatureService $temperatureService)
    {
        $this->service = $temperatureService;
    }

    public function index()
    {

        return view('temperature.index', [
            'temper' => $this->service->temper('Брянск', 'RU'),
        ]);
    }
}
