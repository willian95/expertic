<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodPost extends FormRequest
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
            'start_date_period'=>'required|date|before:end_date_period',
            'end_date_period'=>'required|date|after:start_date_period', 
            'period'=>'required|max:20',

        ];

    }

        public function messages(){

        return [

            'period.required'=>'El campo perido es requerido',
            'period.max'=>'El campo periodo solo acepta un maximo de 20 caracteres',
            'start_date_period.required'=>'El campo fecha de inicio es requerido',
            'start_date_period.date'=>'El campo la fecha de inicio introducida es invalidad',
            'start_date_period.before'=>'La fecha no puede ser mayor a la fecha de fin',
            'end_date_period.required'=>'El campo fecha fin es requerido',
            'end_date_period.date'=>'El campo la fecha de fin introducida es invalidad',
            'end_date_period.after'=>'La fecha no pude se memor a la fecha de inicio',

        ];

    }
}
