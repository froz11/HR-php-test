<?php


namespace App\Services;

use App\Order;
use App\Mail\StatusMail;
use Illuminate\Support\Facades\Mail;

class StatusSenderService
{
    private $order;

    private $email = [];
    private $body = [];

    public function __construct(Order $id)
    {
        $this->order = $id;
        $this->setEmail();
        $this->setBody();
    }

    private function setEmail()
    {
        $this->email[] = $this->order->partner->email;
        foreach ($this->order->products as $prod)
            $this->email[] = $prod->vendor->email;
    }

    private function setBody()
    {
        $this->body['number'] = $this->order->id;
        foreach ($this->order->products as $prod)
            $this->body['products'][] = $prod->name;
        $this->body['summ'] = $this->order->sum->sum;
    }

    public function send()
    {
        array_map(function ($val) {
            Mail::to($val)
            ->queue(new StatusMail($this->body));
        }, $this->email);
    }
}