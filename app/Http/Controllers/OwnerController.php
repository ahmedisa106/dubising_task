<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\OwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Repos\AdminRepo;
use App\Repos\OwnerRepo;
use App\Repos\UserRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    protected OwnerRepo $repo;

    public function __construct(OwnerRepo $adminRepo)
    {
        $this->repo = $adminRepo;
    }

    /**
     * @param OwnerRequest $request
     * @return JsonResponse
     */
    public function store(OwnerRequest $request): JsonResponse
    {
        $owner = OwnerResource::make($this->repo->store($request->validated()));
        return final_response('success', 'Owner Created Successfully', '', 200, $owner);

    }
}
