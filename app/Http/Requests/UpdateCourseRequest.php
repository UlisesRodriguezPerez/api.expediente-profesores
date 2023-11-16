<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $course = $this->route('course'); 
        return [
            'name' => 'required|string|max:255|unique:courses,name,' . $course->id,
            'code' => 'required|string|max:255|unique:courses,code,' . $course->id,
        ];
    }
}
