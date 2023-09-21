<?php

namespace App\Http\Requests;

use App\Models\Workload;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkloadRequest extends FormRequest
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
            'collaborator_id' => [
                'required',
                'exists:collaborators,id',
                function ($attribute, $value, $fail) {
                    $period_id = $this->get('period_id');
                    $exists = Workload::where('collaborator_id', $value)
                        ->where('period_id', $period_id)
                        ->where('id', '!=', $this->route('workload')) // Asume que estás pasando el id de workload como parámetro de ruta
                        ->exists();
                    if ($exists) {
                        $fail('A workload for this collaborator and period already exists.');
                    }
                },
            ],
            'period_id' => 'required|exists:periods,id',
            'workload' => 'required|numeric|min:0|max:5',
        ];
    }
}
