<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevelPost extends FormRequest
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

            'level'=>'required|max:20',

        ];

    }

        public function messages(){

        return [

            'level.required'=>'El campo nivel es requerido',
            'level.max'=>'El campo nivel solo acepta un maximo de 20 caracteres',
        ];

    }
}
