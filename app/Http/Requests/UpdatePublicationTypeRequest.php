<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublicationTypeRequest extends FormRequest
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
        $publicationType = $this->route('publicationType');
        return [
            'name' => 'required|string|max:255|unique:publication_types,name,' . $publicationType->id,
            'description' => 'nullable|string',
        ];
    }
}
