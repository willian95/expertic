<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupStudentPost extends FormRequest
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

            'period_id'=>'required',
            'level_id'=>'required',
            'section_id'=>'required',
            'students' => 'required|array'
        ];

    }

        public function messages(){

        return [
            'period_id.required'=>'El campo periodo es requerido',
            'level_id.required'=>'El campo nivel es requerido',
            'section_id.required'=>'El campo sección es requerido',
            'students.required'=>'Debe agregar el estudiante o estudiantes a asociar',
            'students.array'=>'El campo estudiantes es invalido',
        ];

    }
}
