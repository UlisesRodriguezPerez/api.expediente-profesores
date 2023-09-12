<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;
use App\Http\Resources\ActivityTypeResource;
use App\Models\ActivityType;

class ActivityTypeController extends Controller
{
    public function index()
    {
        $activityTypes = ActivityType::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return ActivityTypeResource::collection($activityTypes);
    }

    public function store(StoreActivityTypeRequest $request)
    {
        $activityType = new ActivityType();
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        $activityType->save();

        return ActivityTypeResource::make($activityType);
    }

    public function show($id)
    {
        $activityType = ActivityType::included()->findOrfail($id);
        return ActivityTypeResource::make($activityType);
    }

    public function update(UpdateActivityTypeRequest $request, ActivityType $activityType)
    {
        $activityType->name = $request->name;
        $activityType->description = $request->description;
        $activityType->save();

        return ActivityTypeResource::make($activityType);
    }

    public function destroy(ActivityType $activityType)
    {
        $activityType->delete();
        return ActivityTypeResource::make($activityType);
    }
}
