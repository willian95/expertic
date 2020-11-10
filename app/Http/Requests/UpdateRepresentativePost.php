<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRepresentativePost extends FormRequest
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

            'data.rut'=>'required|max:20',
            'data.representative_name'=>'required|max:50',
            'data.representative_lastname'=>'required|max:50',
            'data.phone'=>'required|min:11|max:12',
            'data.address'=>'required',
            'data.email' => 'required|email',
            'data.password' => 'sometimes|required_with:password_confirmation|string|confirmed',
            'data.password_confirmation' => 'sometimes|min:8',
            'data.students' => 'required|array'
        ];

    }

        public function messages(){

        return [
            'data.rut.required'=>'El campo rut es requerido',
            'data.rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'data.representative_name.required'=>'El campo nombre es requerido',
            'data.representative_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'data.representative_lastname.required'=>'El campo apellido es requerido',
            'data.representative_lastname.max'=>'El campo nombre solo acepta un maximo de 50 caracteres', 
            'data.phone.required'=>'El campo teléfono es requerido', 
            'data.phone.min'=>'Cantidad de digitos incompleta',
            'data.phone.max'=>'Excede la cantidad de digitos', 
            'data.address.required'=>'El campo dirección es requerido', 
            'data.email.required'=>'El campo email es requerido',
            'data.email.email'=>'El campo email es invalido',
            'data.password.required'=>'El campo contraseña es requerido',
            'data.password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'data.password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'data.password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'data.password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'data.password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
            'data.students.required'=>'Debe agregar el estudiante o estudiantes a asociar',
            'data.students.array'=>'El campo estudiantes es invalido',
        ];

    }
}
