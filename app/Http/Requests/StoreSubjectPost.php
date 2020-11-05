<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectPost extends FormRequest
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

            'subject'=>'required|max:50',

        ];

    }

        public function messages(){

        return [

            'subject.required'=>'El campo asignatura es requerido',
            'subject.max'=>'El campo asignatura solo acepta un maximo de 50 caracteres',
            
        ];

    }
}
