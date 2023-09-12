<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublicationRequest extends FormRequest
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
            'collaborator_id' => 'required|exists:collaborators,id',
            'publication_type_id' => 'required|exists:publication_types,id',
            'name' => 'required|string|max:255',
            'coauthors' => 'required|string',
            'objectives' => 'required|string',
            'goals' => 'required|string',
            'dissemination_medium' => 'required|string|max:255',
            'ORCID' => 'required|boolean',
        ];
    }
}
