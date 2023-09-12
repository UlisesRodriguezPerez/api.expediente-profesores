<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityTypeRequest extends FormRequest
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
        $activityType = $this->route('activityType');
        return [
            'name' => 'required|string|max:255|unique:activity_types,name,' . $activityType->id,
            'description' => 'nullable|string',
        ];
    }
}
