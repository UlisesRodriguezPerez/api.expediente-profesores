<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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
            'period_id' => 'required|exists:periods,id',
            // 'creator_id' => 'required|exists:collaborators,id',
            'involved_id' => 'required|exists:collaborators,id',
            'name' => 'required|string|max:255',
        ];
    }
}
