<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;

class StudentController extends Controller 
{

public function index()
{
    $students = Student::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
    return StudentResource::collection($students);
}

public function store(StoreStudentRequest $request)
{
    $student = new Student();
    $student->publication_id = $request->publication_id;
    $student->full_name = $request->full_name;
    $student->postgraduate_scholarship = $request->postgraduate_scholarship;
    $student->TFG = $request->TFG;
    $student->save();

    return StudentResource::make($student);
}

public function show($id)
{
    $student = Student::included()->findOrfail($id);
    return StudentResource::make($student);
}

public function update(UpdateStudentRequest $request, Student $student)
{
    $student->publication_id = $request->publication_id;
    $student->full_name = $request->full_name;
    $student->postgraduate_scholarship = $request->postgraduate_scholarship;
    $student->TFG = $request->TFG;
    $student->save();

    return StudentResource::make($student);
}

public function destroy(Student $student)
{
    $student->delete();
    return StudentResource::make($student);
}
}