<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampusRequest extends FormRequest
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
        $campus = $this->route('campus');
        return [
            'name' => 'required|string|max:255|unique:campuses,name,' . $campus->id,
            'description' => 'required|string',
            'acronym' => 'required|string|max:10|unique:campuses,acronym,' . $campus->id,
        ];
    }
}
