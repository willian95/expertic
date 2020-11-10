<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentPost2 extends FormRequest
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

            'stud.representative_id'=>'required',
            'stud.rut'=>'required|max:20',
            'stud.student_name'=>'required|max:50',
            'stud.student_lastname'=>'required|max:50',
            'stud.phone'=>'required|min:11|max:12',
            'stud.address'=>'required',
            'stud.email' => 'required',
            'stud.password' => 'sometimes|required_with:password_confirmation|string|confirmed',
            'stud.password_confirmation' => 'sometimes|min:8',
            'stud.blood_type'=>'required',
        ];

    }

        public function messages(){

        return [
            
            'student.representative_id.required'=>'El campo rut del apoderado es requerido',
            'stud.rut.required'=>'El campo rut es requerido',
            'stud.rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'stud.student_name.required'=>'El campo nombre es requerido',
            'stud.student_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'stud.student_lastname.required'=>'El campo apellido es requerido',
            'stud.student_lastname.max'=>'El campo nombre solo acepta un maximo de 50 caracteres', 
            'stud.phone.required'=>'El campo teléfono es requerido', 
            'stud.phone.min'=>'Cantidad de digitos incompleta',
            'stud.phone.max'=>'Excede la cantidad de digitos',  
            'stud.address.required'=>'El campo dirección es requerido', 
            'stud.email.required'=>'El campo email es requerido',
            'stud.email.email'=>'El campo email es invalido',
            'stud.password.required'=>'El campo contraseña es requerido',
            'stud.password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'stud.password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'stud.password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'stud.password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'stud.password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
            'stud.blood_type.required'=>'El campo gurpo sanguineo es requerido',
        ];

    }
}
