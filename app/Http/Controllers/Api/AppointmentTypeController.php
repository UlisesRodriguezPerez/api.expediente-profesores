<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppointmentType;
use App\Http\Requests\StoreAppointmentTypeRequest;
use App\Http\Requests\UpdateAppointmentTypeRequest;
use App\Http\Resources\AppointmentTypeResource;

class AppointmentTypeController extends Controller
{

    public function index()
    {
        $appointmentTypes = AppointmentType::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return AppointmentTypeResource::collection($appointmentTypes);
    }

    public function store(StoreAppointmentTypeRequest $request)
    {
        $appointmentType = new AppointmentType();
        $appointmentType->name = $request->name;
        $appointmentType->description = $request->description;
        $appointmentType->save();

        return AppointmentTypeResource::make($appointmentType);
    }

    public function show($id)
    {
        $appointmentType = AppointmentType::included()->findOrfail($id);
        return AppointmentTypeResource::make($appointmentType);
    }

    public function update(UpdateAppointmentTypeRequest $request, AppointmentType $appointmentType)
    {
        $appointmentType->name = $request->name;
        $appointmentType->description = $request->description;
        $appointmentType->save();

        return AppointmentTypeResource::make($appointmentType);
    }

    public function destroy(AppointmentType $appointmentType)
    {
        $appointmentType->delete();
        return AppointmentTypeResource::make($appointmentType);
    }
}
