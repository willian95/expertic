<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherPost extends FormRequest
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
            'rut'=>'required|unique:teacher|max:20',
            'teacher_name'=>'required|max:50',
            'teacher_lastname'=>'required|max:50',

        ];

    }

        public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'rut.required'=>'El campo rut es requerido',
            'rut.unique'=>'El campo rut ya se encuentra registrado',
            'rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'teacher_name.required'=>'El campo nombre es requerido',
            'teacher_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'teacher_lastname.required'=>'El campo apellido es requerido',
            'teacher_lastname.max'=>'El campo nombre solo apellido un maximo de 50 caracteres',
        ];

    }
}
