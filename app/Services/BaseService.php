<?php


namespace App\Services;


abstract class BaseService
{
    public $repo;

    public function all()
    {
        return $this->repo->all();
    }

    public function sorted(string $sortBy = 'created_at', string  $sortOrder = 'asc')
    {
        return $this->repo->sorted($sortBy, $sortOrder);
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function update($id, array $input)
    {
        return $this->repo->update($id, $input);
    }
}