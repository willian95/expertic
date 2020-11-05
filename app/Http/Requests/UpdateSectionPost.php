<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionPost extends FormRequest
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
            
            'id'=>'required|integer',
            'section'=>'required|max:20',

        ];

    }

        public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'section.required'=>'El campo sección es requerido',
            'section.max'=>'El campo sección solo acepta un maximo de 20 caracteres',
        ];

    }
}
