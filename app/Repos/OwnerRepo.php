<?php

namespace App\Repos;

use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OwnerRepo
{

    public Owner $model;

    public function __construct()
    {
        $this->model = new Owner();
    }

    /**
     * @param $data
     * @return Builder|Model
     */
    public function store($data): Model|Builder
    {

        return $this->model->query()->create($data);

    }

}
