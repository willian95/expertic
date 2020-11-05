<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodPost extends FormRequest
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
            'period'=>'required|max:20',

        ];

    }

        public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'period.required'=>'El campo perido es requerido',
            'period.max'=>'El campo periodo solo acepta un maximo de 20 caracteres',
        ];

    }
}
