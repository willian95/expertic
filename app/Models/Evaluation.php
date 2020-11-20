<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public $table='evaluations';

    protected $fillable=[
        'institution_id',
        'period_id',
        'level_id',
        'section_id',
        'teacher_id',
        'subject_id',
        'date',
        'start_time',  
        'end_time'
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

    public function studentEvaluations()
    {
        return $this->belongsTo('App\Models\EvaluationStudent');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

}



 
