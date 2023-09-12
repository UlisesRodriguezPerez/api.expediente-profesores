<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Http\Requests\StoreRoleUserRequest;
use App\Http\Requests\UpdateRoleUserRequest;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoleUser $roleUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleUser $roleUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleUserRequest  $request
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleUserRequest $request, RoleUser $roleUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleUser $roleUser)
    {
        //
    }
}
