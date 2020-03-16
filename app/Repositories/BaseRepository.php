<?php


namespace App\Repositories;

use App\Repositories\Traits\OptionQueryTraits;

abstract class BaseRepository
{
    use OptionQueryTraits;

    protected $model;

    public function all()
    {
        return $this->model
            ->with($this->relations);
    }

    public function find($id)
    {
        return $this->model
            ->with($this->relations)
            ->where('id', $id)->first();
    }

    public function update($id, array $input)
    {
        $model = $this->find($id);
        $model->fill($input);
        $model->save();

        return $model;
    }
}