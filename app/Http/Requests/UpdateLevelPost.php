<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLevelPost extends FormRequest
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
            'level'=>'required|max:20',

        ];

    }

        public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'level.required'=>'El campo nivel es requerido',
            'level.max'=>'El campo nivel solo acepta un maximo de 20 caracteres',
        ];

    }
}
