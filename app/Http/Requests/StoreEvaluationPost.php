<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationPost extends FormRequest
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
            'date'=>'required|date',
            'period_id'=>'required',
            'level_id'=>'required',
            'section_id'=>'required',
            'subject_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'students' => 'required|array'

        ];

    }

        public function messages(){

        return [
            'date.required'=>'El campo fecha  es requerido',
            'date.date'=>'El campo la fecha introducida es invalidad',
            'period_id.required'=>'El campo periodo es requerido',
            'level_id.required'=>'El campo nivel es requerido',
            'section_id.required'=>'El campo sección es requerido',
            'subject_id.required'=>'El campo asignatura es requerido',
            'start_time.required'=>'El campo hora de inicio es requerida',
            'end_time.required'=>'El campo hora de fin es requerida',
            'students.required'=>'Debe seleccionar la asignatura a relacionar',
            'students.array'=>'El campo asignatura es invalido',
        ];

    }
}
