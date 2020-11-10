<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRepresentativeViewfinderPost extends FormRequest
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

            'Repre.rut'=>'required|max:20',
            'Repre.representative_name'=>'required|max:50',
            'Repre.representative_lastname'=>'required|max:50',
            'Repre.phone'=>'required|min:11|max:12',
            'Repre.address'=>'required',
            'Repre.email' => 'required|email',
            'Repre.password' => 'sometimes|required_with:password_confirmation|string|confirmed',
            'Repre.password_confirmation' => 'sometimes|min:8',
        ];

    }

        public function messages(){

        return [
            'Repre.rut.required'=>'El campo rut es requerido',
            'Repre.rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'Repre.representative_name.required'=>'El campo nombre es requerido',
            'Repre.representative_name.max'=>'El campo nombre solo acepta un maximo de 50 caracteres',
            'Repre.representative_lastname.required'=>'El campo apellido es requerido',
            'Repre.representative_lastname.max'=>'El campo nombre solo acepta un maximo de 50 caracteres', 
            'Repre.phone.required'=>'El campo teléfono es requerido', 
            'Repre.phone.min'=>'Cantidad de digitos incompleta',
            'Repre.phone.max'=>'Excede la cantidad de digitos', 
            'Repre.address.required'=>'El campo dirección es requerido', 
            'Repre.email.required'=>'El campo email es requerido',
            'Repre.email.email'=>'El campo email es invalido',
            'Repre.password.required'=>'El campo contraseña es requerido',
            'Repre.password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'Repre.password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'Repre.password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'Repre.password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'Repre.password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',
        ];

    }
}
