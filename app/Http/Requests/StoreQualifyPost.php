<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQualifyPost extends FormRequest
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
            'students' => 'required|array'

        ];

    }

        public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'students.required'=>'Debe seleccionar la asignatura a relacionar',
            'students.array'=>'El campo asignatura es invalido',
        ];

    }
}
