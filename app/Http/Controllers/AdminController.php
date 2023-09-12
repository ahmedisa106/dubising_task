<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Repos\AdminRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected AdminRepo $repo;

    public function __construct(AdminRepo $adminRepo)
    {
        $this->repo = $adminRepo;
    }

    /**
     * @param AdminRequest $request
     * @return JsonResponse
     */
    public function store(AdminRequest $request)
    {
        $admin = AdminResource::make($this->repo->store($request->validated()));
        return final_response('success', 'Admin Created Successfully', '', 200, $admin);
    }
}
