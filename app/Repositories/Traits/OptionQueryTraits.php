<?php


namespace App\Repositories\Traits;

trait OptionQueryTraits
{
    public $relations = [];

    public function setRelations($relations = null)
    {
        $this->relations = $relations;
    }

}