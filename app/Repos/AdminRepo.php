<?php

namespace App\Repos;

use App\Http\Resources\OwnerResource;
use App\Models\Admin;
use App\Services\AdminService;
use App\Traits\Upload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AdminRepo
{


    protected Admin $model;
    protected AdminService $service;

    public function __construct(AdminService $adminService)
    {
        $this->model = new Admin();
        $this->service = $adminService;
    }

    /**
     * @param $data
     * @return Builder|Model
     */
    public function store($data): Model|Builder
    {
        $data['file'] = $this->service->handleFile($data['file']);
        return $this->model->query()->create($data);
    }
}
