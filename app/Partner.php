<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public static function getPartForList()
    {
        $collection = self::all();
        foreach ($collection as $values)
            $result[$values->id] = $values->name;
        return $result;
    }
}
