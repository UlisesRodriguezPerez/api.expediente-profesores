<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppointmentType;
use App\Http\Requests\StoreAppointmentTypeRequest;
use App\Http\Requests\UpdateAppointmentTypeRequest;

class AppointmentTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreAppointmentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentType $appointmentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(AppointmentType $appointmentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentTypeRequest  $request
     * @param  \App\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentTypeRequest $request, AppointmentType $appointmentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppointmentType  $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentType $appointmentType)
    {
        //
    }
}
