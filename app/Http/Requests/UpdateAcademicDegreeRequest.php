<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicDegreeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $academicDegree = $this->route('academic_degree');
        return [
            'name' => 'required|string|max:255|unique:academic_degrees,name,' . $academicDegree->id,
            'description' => 'required|string',
        ];
    }
}
