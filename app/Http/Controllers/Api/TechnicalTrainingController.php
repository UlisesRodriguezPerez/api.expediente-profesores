<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TechnicalTraining;
use App\Http\Requests\StoreTechnicalTrainingRequest;
use App\Http\Requests\UpdateTechnicalTrainingRequest;

class TechnicalTrainingController extends Controller
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
     * @param  \App\Http\Requests\StoreTechnicalTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnicalTrainingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TechnicalTraining  $technicalTraining
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicalTraining $technicalTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TechnicalTraining  $technicalTraining
     * @return \Illuminate\Http\Response
     */
    public function edit(TechnicalTraining $technicalTraining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnicalTrainingRequest  $request
     * @param  \App\TechnicalTraining  $technicalTraining
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnicalTrainingRequest $request, TechnicalTraining $technicalTraining)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TechnicalTraining  $technicalTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechnicalTraining $technicalTraining)
    {
        //
    }
}
