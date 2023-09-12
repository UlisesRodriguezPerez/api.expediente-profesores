<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PedagogicalTraining;
use App\Http\Requests\StorePedagogicalTrainingRequest;
use App\Http\Requests\UpdatePedagogicalTrainingRequest;

class PedagogicalTrainingController extends Controller
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
     * @param  \App\Http\Requests\StorePedagogicalTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedagogicalTrainingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PedagogicalTraining  $pedagogicalTraining
     * @return \Illuminate\Http\Response
     */
    public function show(PedagogicalTraining $pedagogicalTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedagogicalTraining  $pedagogicalTraining
     * @return \Illuminate\Http\Response
     */
    public function edit(PedagogicalTraining $pedagogicalTraining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedagogicalTrainingRequest  $request
     * @param  \App\PedagogicalTraining  $pedagogicalTraining
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedagogicalTrainingRequest $request, PedagogicalTraining $pedagogicalTraining)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedagogicalTraining  $pedagogicalTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedagogicalTraining $pedagogicalTraining)
    {
        //
    }
}
