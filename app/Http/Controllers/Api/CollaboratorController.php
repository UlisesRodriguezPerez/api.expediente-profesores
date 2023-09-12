<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Collaborator;
use App\Http\Requests\StoreCollaboratorRequest;
use App\Http\Requests\UpdateCollaboratorRequest;

class CollaboratorController extends Controller
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
     * @param  \App\Http\Requests\StoreCollaboratorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollaboratorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function show(Collaborator $collaborator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function edit(Collaborator $collaborator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollaboratorRequest  $request
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        //
    }
}
