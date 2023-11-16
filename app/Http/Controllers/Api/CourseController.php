<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::included()
            ->filter()
            ->sort()
            ->exactFilter()
            ->getOrPaginate();
        return CourseResource::collection($courses);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->code = $request->code;
        $course->save();

        return CourseResource::make($course);
    }

    public function show($id)
    {
        $course = Course::included()->findOrfail($id);
        return CourseResource::make($course);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->name = $request->name;
        $course->code = $request->code;
        $course->save();

        return CourseResource::make($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return CourseResource::make($course);
    }
}
