<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Http\Requests\StoreRoleUserRequest;
use App\Http\Requests\UpdateRoleUserRequest;
use App\Http\Resources\RoleUserResource;

class RoleUserController extends Controller
{

    public function index()
    {
        $roleUsers = RoleUser::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return RoleUserResource::collection($roleUsers);
    }

    public function store(StoreRoleUserRequest $request)
    {
        $roleUser = new RoleUser();
        $roleUser->role_id = $request->role_id;
        $roleUser->user_id = $request->user_id;
        $roleUser->save();

        return RoleUserResource::make($roleUser);
    }

    public function show($id)
    {
        $roleUser = RoleUser::included()->findOrfail($id);
        return RoleUserResource::make($roleUser);
    }

    public function update(UpdateRoleUserRequest $request, RoleUser $roleUser)
    {
        $roleUser->role_id = $request->role_id;
        $roleUser->user_id = $request->user_id;
        $roleUser->save();

        return RoleUserResource::make($roleUser);
    }

    public function destroy(RoleUser $roleUser)
    {
        $roleUser->delete();
        return RoleUserResource::make($roleUser);
    }
}
