<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;

class RoleController extends Controller 
{

public function index()
{
    $roles = Role::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return RoleResource::collection($roles);
}

public function store(StoreRoleRequest $request)
{
    $role = new Role();
    $role->name = $request->name;
    $role->description = $request->description;
    $role->save();

    return RoleResource::make($role);
}

public function show($id)
{
    $role = Role::included()->findOrfail($id);
    return RoleResource::make($role);
}

public function update(UpdateRoleRequest $request, Role $role)
{
    $role->name = $request->name;
    $role->description = $request->description;
    $role->save();

    return RoleResource::make($role);
}

public function destroy(Role $role)
{
    $role->delete();
    return RoleResource::make($role);
}
}