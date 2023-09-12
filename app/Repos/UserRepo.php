<?php

namespace App\Repos;


use App\Models\User;

class UserRepo
{
    protected User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function store($data)
    {
        return $this->model->query()->create($data);
    }
}
