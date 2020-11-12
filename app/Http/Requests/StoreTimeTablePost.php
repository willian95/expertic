<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeTablePost extends FormRequest
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
            'timetable'=>'required|json',

        ];

    }

        public function messages(){

        return [

            'period_id.required'=>'El campo periodo es requerido',
            'level_id.required'=>'El campo nivel es requerido',
            'section_id.required'=>'El campo sección es requerido',
            'timetable.required'=>'El campo horario es requerido',
            'timetable.json'=>'El campo horario no cumple con la estructura necesaria',
            
        ];

    }
}
