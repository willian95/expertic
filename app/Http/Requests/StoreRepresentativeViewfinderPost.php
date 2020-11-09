<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepresentativeViewfinderPost extends FormRequest
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

            'representative.rut'=>'required|unique:representatives,rut|max:20',
            'representative.representative_name'=>'required|max:50',
            'representative.representative_lastname'=>'required|max:50',
            'representative.phone'=>'required|min:11',
            'representative.address'=>'required',
            'representative.email' => 'required|email|unique:users,email',
            'representative.password' => 'required|required_with:password_confirmation|string|confirmed',
            'representative.password_confirmation' => 'required| min:8',
        ];

    }

        public function messages(){

        return [
            'representative.rut.required'=>'El campo rut es requerido',
            'representative.rut.unique'=>'El campo rut ya se encuentra registrado',
            'representative.rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'representative.representative_name.required'=>'El campo nombre es requerido',
            'representative.representative_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'representative.representative_lastname.required'=>'El campo apellido es requerido',
            'representative.representative_lastname.max'=>'El campo nombre solo acepta un maximo de 50 caracteres', 
            'representative.phone.required'=>'El campo teléfono es requerido', 
            'representative.phone.min'=>'El campo teléfono es invalido', 
            'representative.address.required'=>'El campo dirección es requerido', 
            'representative.email.required'=>'El campo email es requerido',
            'representative.email.email'=>'El campo email es invalido',
            'email.unique'=>'El campo email ya existe en la base de datos',
            'representative.password.required'=>'El campo contraseña es requerido',
            'representative.password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'representative.password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'representative.password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'representative.password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'representative.password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
        ];

    }
}
