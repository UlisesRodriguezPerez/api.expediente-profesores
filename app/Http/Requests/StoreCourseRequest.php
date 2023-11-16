<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Aquí permitimos a todos crear un curso, pero se verificará en el controlador si el usuario tiene permiso para hacerlo.
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:courses,name',
            'code' => 'required|string|max:255|unique:courses,code',
        ];
    }
}
