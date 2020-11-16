<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
    public $table='annotations';

    protected $fillable=[
        'institution_id',
        'period_id',
        'level_id',
        'section_id',
        'teacher_id',
        'subject_id',
        'student_id',
        'date',
        'annotation',
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

        return $this->belongsTo('App\Models\Subject','student_id');

    }
    public function students()
    {
        
        return $this->belongsTo('App\Models\Student','student_id');
        
    }
}


