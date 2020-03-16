<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{

    protected $table = 'orders';
    /**
     * Константы статусов
     * 0 = NEWS
     * 10 = CONFIRMED
     * 20 = COMPLETED
     **/

    const NEWS = 0;
    const CONFIRMED = 10;
    const COMPLETED = 20;
    //

    protected $fillable = [
        'client_email',
        'partner_id',
        'status'
    ];

    public $appends = [
        'status_name',
        'sum'
    ];

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }


    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products');
    }

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function getStatusNameAttribute(): string
    {
        return $this->statuses()[$this->status];
    }

    public function getSumAttribute()
    {
         return $this->orderProduct()->select(DB::raw('sum(quantity * price) as sum'))->first();
    }

    public function statuses(): array
    {
        return [
            self::NEWS => 'Новый',
            self::CONFIRMED => 'Подтвержден',
            self::COMPLETED => 'Завершен'
        ];
    }

}
