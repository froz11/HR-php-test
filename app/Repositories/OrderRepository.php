<?php


namespace App\Repositories;


use App\Order;

class OrderRepository extends BaseRepository
{
    protected $model;

    /**
     * Константы статусов
     * 0 = NEWS
     * 10 = CONFIRMED
     * 20 = COMPLETED
     **/


    public function __construct(Order $order)
    {
        $this->model = $order;
    }
}