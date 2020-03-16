<?php


namespace App\Services;

use App\Mail\StatusMail;
use App\Repositories\OrderRepository;

class OrderService extends BaseService
{
    public $repo;

    /**
     * Константы статусов
     * 0 = NEWS
     * 10 = CONFIRMED
     * 20 = COMPLETED
     **/
    const NEWS = 0;
    const CONFIRMED = 10;
    const COMPLETED = 20;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->repo = $orderRepository;
    }

    public function all()
    {
        $this->repo->setRelations(['partner', 'products']);
        return $this->repo->all();
    }

    public function update($id, array $input)
    {
        if($input['status'] == self::COMPLETED) {
            $mail = new StatusSenderService($this->find($id));
            $mail->send();
        }
        return $this->repo->update($id, $input);
    }


}