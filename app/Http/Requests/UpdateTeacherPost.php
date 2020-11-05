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
            'email' => 'required|email',
            'password' => 'sometimes|required_with:password_confirmation|string',
            'password_confirmation' => 'same:password| min:8',
            'subjects' => 'required|array'


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
            'email.required'=>'El campo email es requerido',
            'email.email'=>'El campo email es invalido',
            'password.required'=>'El campo contraseña es requerido',
            'password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'password.string'=>'El campo contraseña debe ser de tipo alphanumerica',
            'password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
            'subjects.required'=>'Debe seleccionar la asignatura a relacionar',
            'subjects.array'=>'El compo asignatura es invalido',
        ];

    }
}
