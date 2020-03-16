<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderPost;
use App\Partner;
use App\Services\OrderService;
use Carbon\carbon;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $orderService)
    {
        $this->service = $orderService;
    }

    public function index()
    {
        return view('order.index', [
            'orders' => $this->service->all()->get(),
        ]);
    }

    public function indexGroup()
    {
        return view('order.group', [
            'response' => [
                'overdue' => [
                    'label' => 'Просроченные',
                    'res' => $this->service->all()
                    ->where('status', $this->service::CONFIRMED)
                    ->where('delivery_dt', '<', Carbon::now()->toDateTimeString())
                    ->orderBy('delivery_dt', 'desc')
                    ->limit(50)
                    ->get()
                    ],
                'current' => [
                    'label' => 'Текущие',
                    'res' => $this->service->all()
                    ->where('status', $this->service::CONFIRMED)
                    ->whereBetween('delivery_dt', [
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->addHours(24)->toDateTimeString()
                    ])
                    ->orderBy('delivery_dt', 'asc')
                    ->get()
                    ],
                'new' => [
                    'label' => 'Новые',
                    'res' => $this->service->all()
                    ->where('status', $this->service::NEWS)
                    ->where('delivery_dt', '>', Carbon::now()->toDateTimeString())
                    ->orderBy('delivery_dt', 'asc')
                    ->limit(50)
                    ->get()
                    ],
                'complete' => [
                    'label' => 'Выполненные',
                    'res' => $this->service->all()
                    ->where('status', $this->service::COMPLETED)
                    ->whereBetween('delivery_dt', [
                        Carbon::now()->toDateString(),
                        Carbon::now()->addHours(24)->toDateString()
                    ])
                    ->orderBy('delivery_dt', 'desc')
                    ->limit(50)
                    ->get()
                    ]
            ],
        ]);
    }

    public function edit($id)
    {
        return view('order.edit', [
            'order' => $this->service->find($id),
            'partners' => Partner::getPartForList()
        ]);
    }

    public function update(UpdateOrderPost $request, $id)
    {
       if($this->service->update($id, $request->only(['client_email', 'partner_id', 'status'])))
            return redirect()->route('orders.edit', ['id' => $id]);
    }
}
