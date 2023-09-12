<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkUnitAndAdditionalCourse;
use App\Http\Requests\StoreWorkUnitAndAdditionalCourseRequest;
use App\Http\Requests\UpdateWorkUnitAndAdditionalCourseRequest;
use App\Http\Resources\WorkUnitAndAdditionalCourseResource;

class WorkUnitAndAdditionalCourseController extends Controller
{

    public function index()
    {
        $workUnitAndAdditionalCourses = WorkUnitAndAdditionalCourse::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return WorkUnitAndAdditionalCourseResource::collection($workUnitAndAdditionalCourses);
    }

    public function store(StoreWorkUnitAndAdditionalCourseRequest $request)
    {
        $workUnitAndAdditionalCourse = new WorkUnitAndAdditionalCourse();
        $workUnitAndAdditionalCourse->collaborator_id = $request->collaborator_id;
        $workUnitAndAdditionalCourse->description = $request->description;
        $workUnitAndAdditionalCourse->save();

        return WorkUnitAndAdditionalCourseResource::make($workUnitAndAdditionalCourse);
    }

    public function show($id)
    {
        $workUnitAndAdditionalCourse = WorkUnitAndAdditionalCourse::included()->findOrfail($id);
        return WorkUnitAndAdditionalCourseResource::make($workUnitAndAdditionalCourse);
    }

    public function update(UpdateWorkUnitAndAdditionalCourseRequest $request, WorkUnitAndAdditionalCourse $workUnitAndAdditionalCourse)
    {
        $workUnitAndAdditionalCourse->collaborator_id = $request->collaborator_id;
        $workUnitAndAdditionalCourse->description = $request->description;
        $workUnitAndAdditionalCourse->save();

        return WorkUnitAndAdditionalCourseResource::make($workUnitAndAdditionalCourse);
    }

    public function destroy(WorkUnitAndAdditionalCourse $workUnitAndAdditionalCourse)
    {
        $workUnitAndAdditionalCourse->delete();
        return WorkUnitAndAdditionalCourseResource::make($workUnitAndAdditionalCourse);
    }
}
