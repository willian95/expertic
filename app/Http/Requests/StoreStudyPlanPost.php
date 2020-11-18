<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyPlanPost extends FormRequest
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
            'subject_id' => 'required',
            'start_date_study_plan'=>'required|date|before:end_date_study_plan',
            'end_date_study_plan'=>'required|date|after:start_date_study_plan',
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages(){

        return [
            'period_id.required'=>'El campo periodo es requerido',
            'level_id.required'=>'El campo nivel es requerido',
            'section_id.required'=>'El campo sección es requerido',
            'subject_id.required'=>'El campo asignatura es requerido',
            'start_date_study_plan.required'=>'El campo fecha de inicio es requerido',
            'start_date_study_plan.date'=>'El campo fecha es invalidad',
            'start_date_study_plan.before'=>'La fecha inicio no puede ser mayor a la fecha de fin',
            'end_date_study_plan.required'=>'El campo fecha final  es requerido',
            'end_date_study_plan.date'=>'El campo fecha es invalidad',
            'end_date_study_plan.before'=>'La fecha final no puede ser menor a la fecha de inicio',
            'title.required'=>'El campo titulo es requerido',
            'content.required'=>'El campo contenido es requerido',
        ];

    }
}
