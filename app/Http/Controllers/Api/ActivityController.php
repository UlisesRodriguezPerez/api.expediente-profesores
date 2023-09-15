<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

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
        $activity->period_id = $request->period_id;
        // $activity->creator_id = $request->creator_id;
        $activity->involved_id = $request->involved_id;
        $activity->name = $request->name;

        $collaborator = auth()->user()->collaborator;
        $activity->creator_id = $collaborator->id;
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
        $activity->period_id = $request->period_id;
        // $activity->creator_id = $request->creator_id;
        $activity->involved_id = $request->involved_id;
        $activity->name = $request->name;
        $activity->save();

        return ActivityResource::make($activity);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return ActivityResource::make($activity);
    }
}
