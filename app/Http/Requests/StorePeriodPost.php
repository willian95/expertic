<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodPost extends FormRequest
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

            'period'=>'required|max:20',

        ];

    }

        public function messages(){

        return [

            'period.required'=>'El campo perido es requerido',
            'period.max'=>'El campo periodo solo acepta un maximo de 20 caracteres',
        ];

    }
}
