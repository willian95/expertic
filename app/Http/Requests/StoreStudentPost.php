<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentPost extends FormRequest
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

            'student.rut'=>'required|unique:students,rut|max:20',
            'student.student_name'=>'required|max:50',
            'student.student_lastname'=>'required|max:50',
            'student.phone'=>'required|min:11',
            'student.address'=>'required',
            'student.email' => 'required|email|unique:users,email',
            'student.password' => 'required|required_with:password_confirmation|string|confirmed',
            'student.password_confirmation' => 'required| min:8',
            'student.blood_type'=>'required',
        ];

    }

        public function messages(){

        return [
            'student.rut.required'=>'El campo rut es requerido',
            'student.rut.unique'=>'El campo rut ya se encuentra registrado',
            'student.rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'student.student_name.required'=>'El campo nombre es requerido',
            'student.student_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'student.student_lastname.required'=>'El campo apellido es requerido',
            'student.student_lastname.max'=>'El campo nombre solo acepta un maximo de 50 caracteres', 
            'student.phone.required'=>'El campo teléfono es requerido', 
            'student.phone.min'=>'El campo teléfono es invalido', 
            'student.address.required'=>'El campo dirección es requerido', 
            'student.email.required'=>'El campo email es requerido',
            'student.email.email'=>'El campo email es invalido',
            'email.unique'=>'El campo email ya existe en la base de datos',
            'student.password.required'=>'El campo contraseña es requerido',
            'student.password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'student.password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'student.password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'student.password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'student.password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
            'student.blood_type.required'=>'El campo gurpo sanguineo es requerido',
        ];

    }
}
