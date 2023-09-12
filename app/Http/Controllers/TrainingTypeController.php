<?php

namespace App\Http\Controllers;

use App\TrainingType;
use App\Http\Requests\StoreTrainingTypeRequest;
use App\Http\Requests\UpdateTrainingTypeRequest;

class TrainingTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreTrainingTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingType  $trainingType
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingType $trainingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingType  $trainingType
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingType $trainingType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingTypeRequest  $request
     * @param  \App\TrainingType  $trainingType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingTypeRequest $request, TrainingType $trainingType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingType  $trainingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingType $trainingType)
    {
        //
    }
}
