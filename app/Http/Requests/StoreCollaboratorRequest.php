<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollaboratorRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'position_id' => 'required|exists:positions,id',
            'category_id' => 'required|exists:tec_categories,id',
            'appointment_id' => 'required|exists:appointment_types,id',
            'degree_id' => 'required|exists:academic_degrees,id',
            'campus_id' => 'required|exists:campuses,id',
        ];
    }
}
