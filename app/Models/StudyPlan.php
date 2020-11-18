<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    public $table='study_plans';

    protected $fillable=[
        'institution_id',
        'period_id',
        'level_id',
        'section_id',
        'teacher_id',
        'subject_id',
        'start_date_study_plan',
        'end_date_study_plan',
        'title',
        'content',
    ];

    public function institutions(){

        return $this->belongsTo('App\Models\Institution','institution_id');

    }

    public function periods(){

        return $this->belongsTo('App\Models\Period','period_id');

    }

    public function levels(){

        return $this->belongsTo('App\Models\Level','level_id');

    }

    public function sections(){

        return $this->belongsTo('App\Models\Section','section_id');

    }

    public function teachers(){

        return $this->belongsTo('App\Models\Teacher','teacher_id');

    }

    public function subjects(){

        return $this->belongsTo('App\Models\Subject','subject_id');

    }
}