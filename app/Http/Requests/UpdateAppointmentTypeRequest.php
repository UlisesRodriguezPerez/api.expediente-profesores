<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentTypeRequest extends FormRequest
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
        $appointmentType = $this->route('appointment_type');
        return [
            'name' => 'required|string|max:255|unique:appointment_types,name,' . $appointmentType->id,
            'description' => 'required|string',
        ];
    }
}
