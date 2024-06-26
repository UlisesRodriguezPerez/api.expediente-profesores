<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnicalTrainingRequest extends FormRequest
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
        return [
            'training_type_id' => 'required|exists:training_types,id',
            'activity_id' => 'required|exists:activities,id',
            'institution_name' => 'required|string|max:255',
            'semester_hours' => 'required|integer',
        ];
    }
}
