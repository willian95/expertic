<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnotationPost extends FormRequest
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
            'date'=>'required|date',
            'period_id'=>'required',
            'level_id'=>'required',
            'section_id'=>'required',
            'student_id' => 'required',
            'subject_id' => 'required',
            'annotation' => 'required',
        ];

    }

        public function messages(){

        return [
            'id.required'=>'El campo id es requerido',
            'id.integer'=>'El campo id es invalido',
            'date.required'=>'El campo fecha  es requerido',
            'date.date'=>'El campo la fecha introducida es invalidad',
            'period_id.required'=>'El campo periodo es requerido',
            'level_id.required'=>'El campo nivel es requerido',
            'section_id.required'=>'El campo sección es requerido',
            'student_id.required'=>'El campo estudiante es requerido',
            'subject_id.required'=>'El campo asignatura es requerido',
            'annotation.required'=>'El campo anotación es requerido',
        ];

    }
}
