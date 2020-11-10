<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepresentativePost extends FormRequest
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

            'rut'=>'required|unique:representatives,rut|max:20',
            'representative_name'=>'required|max:50',
            'representative_lastname'=>'required|max:50',
            'phone'=>'required|min:11|max:12',
            'address'=>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|required_with:password_confirmation|string|confirmed',
            'password_confirmation' => 'required| min:8',
            'students' => 'required|array'
        ];

    }

        public function messages(){

        return [
            'rut.required'=>'El campo rut es requerido',
            'rut.unique'=>'El campo rut ya se encuentra registrado',
            'rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'representative_name.required'=>'El campo nombre es requerido',
            'representative_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'representative_lastname.required'=>'El campo apellido es requerido',
            'representative_lastname.max'=>'El campo nombre solo acepta un maximo de 50 caracteres', 
            'phone.required'=>'El campo teléfono es requerido', 
            'phone.min'=>'Cantidad de digitos incompleta',
            'phone.max'=>'Excede la cantidad de digitos',  
            'address.required'=>'El campo dirección es requerido', 
            'email.required'=>'El campo email es requerido',
            'email.email'=>'El campo email es invalido',
            'email.unique'=>'El campo email ya existe en la base de datos',
            'password.required'=>'El campo contraseña es requerido',
            'password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
            'students.required'=>'Debe agregar el estudiante o estudiantes a asociar',
            'students.array'=>'El campo estudiantes es invalido',
        ];

    }
}
