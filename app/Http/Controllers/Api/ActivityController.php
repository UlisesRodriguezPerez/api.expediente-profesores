<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;

class ActivityController extends Controller 
{

public function index()
{
    $activitys = Activity::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return ActivityResource::collection($activitys);
}

public function store(StoreActivityRequest $request)
{
    $activity = new Activity();
    $activity->name = $request->name;
    $activity->description = $request->description;
    $activity->save();

    return ActivityResource::make($activity);
}

public function show($id)
{
    $activity = Activity::included()->findOrfail($id);
    return ActivityResource::make($activity);
}

public function update(UpdateActivityRequest $request, Activity $activity)
{
    $activity->name = $request->name;
    $activity->description = $request->description;
    $activity->save();

    return ActivityResource::make($activity);
}

public function destroy(Activity $activity)
{
    $activity->delete();
    return ActivityResource::make($activity);
}
}