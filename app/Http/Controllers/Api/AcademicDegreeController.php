<?php

namespace App\Http\Controllers\Api;

use App\AcademicDegree;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcademicDegreeRequest;
use App\Http\Requests\UpdateAcademicDegreeRequest;

class AcademicDegreeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAcademicDegreeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicDegreeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicDegree  $academicDegree
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicDegree $academicDegree)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcademicDegreeRequest  $request
     * @param  \App\AcademicDegree  $academicDegree
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcademicDegreeRequest $request, AcademicDegree $academicDegree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicDegree  $academicDegree
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicDegree $academicDegree)
    {
        //
    }
}
