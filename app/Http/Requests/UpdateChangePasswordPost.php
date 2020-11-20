<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChangePasswordPost extends FormRequest
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
            'password' => 'required|required_with:password_confirmation|string|confirmed',
            'password_confirmation' => 'required| min:8',
        ];

    }

        public function messages(){

        return [

            'password.required'=>'El campo contraseña es requerido',
            'password.required_with'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'password.string'=>'El campo contraseña debe ser de tipo alfanumérico',
            'password.confirmed'=>'El campo contraseña no concuerda con la verificacón de la misma',
            'password_confirmation.required'=>'La confirmación de la contraseña es requerida',
            'password_confirmation.min'=>'La contraseña debe contener minimo 8 caracteres',

        ];

    }
}
