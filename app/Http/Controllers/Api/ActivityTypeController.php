<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;
use App\Models\ActivityType;

class ActivityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activityTypes = ActivityType::all();
        return $activityTypes;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActivityTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityTypeRequest $request)
    {
        $activityType = new ActivityType();
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        $activityType->save();

        return $activityType;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityType $activityType)
    {
        return $activityType;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityTypeRequest  $request
     * @param  \App\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityTypeRequest $request, ActivityType $activityType)
    {
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        $activityType->save();

        return $activityType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityType $activityType)
    {
        $activityType->delete();
        return $activityType;
    }
}
