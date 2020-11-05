<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitutionPost extends FormRequest
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
            'rut'=>'required|max:20',
            'institution_name'=>'required|max:100',
            'reason_social'=>'required|max:150',
            'address'=>'required|max:200',

        ];

    }

    public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'rut.required'=>'El campo rut de la institución es requerido',
            'rut.max'=>'El campo rut solo acepta un maximo de 20 caracteres',
            'institution_name.required'=>'El campo nombre de la institución es requerido',
            'institution_name.max'=>'El campo nombre de la institución solo acepta un maximo de 100 caracteres',
            'reason_social.required'=>'El campo razón social de la institución es requerido',
            'reason_social.max'=>'El campo razón social de la institución solo acepta un maximo de 150 caracteres',
            'address.required'=>'El campo dirección de la institución es requerido',
            'address.max'=>'El campo dirección de la institución solo acepta un maximo de 200 caracteres',
        ];

    }
}
