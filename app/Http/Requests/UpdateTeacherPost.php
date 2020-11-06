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
            
            'data.id'=>'required|integer',
            'data.rut'=>'required|max:20',
            'data.teacher_name'=>'required|max:50',
            'data.teacher_lastname'=>'required|max:50',
            'data.email' => 'required|email',
            'data.password' => 'sometimes|required_with:password_confirmation|string|confirmed',
            'data.password_confirmation' => 'sometimes|min:8',
            'data.subjects' => 'required|array'


        ];

    }

        public function messages(){

        return [
            'data.id.required'=>'El campo id es requerido',
            'data.id.integer'=>'El campo id es invalido',
            'data.rut.required'=>'El campo rut es requerido',
            'data.rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'data.teacher_name.required'=>'El campo nombre es requerido',
            'data.teacher_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'data.teacher_lastname.required'=>'El campo apellido es requerido',
            'data.teacher_lastname.max'=>'El campo nombre solo apellido un maximo de 50 caracteres',
            'data.email.required'=>'El campo email es requerido',
            'data.email.email'=>'El campo email es invalido',
            'data.password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'data.password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'data.password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'data.password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
            'data.subjects.required'=>'Debe seleccionar la asignatura a relacionar',
            'data.subjects.array'=>'El compo asignatura es invalido',
        ];

    }
}
