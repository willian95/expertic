<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionPost extends FormRequest
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

            'section'=>'required|max:20',

        ];

    }

        public function messages(){

        return [

            'section.required'=>'El campo sección es requerido',
            'section.max'=>'El campo sección solo acepta un maximo de 20 caracteres',
            
        ];

    }
}
