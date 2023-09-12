<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTecCategoryRequest extends FormRequest
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
        $tecCategory = $this->route('tec_category');
        return [
            'name' => 'required|string|max:255|unique:tec_categories,name,' . $tecCategory->id,
            'description' => 'required|string',
        ];
    }
}
