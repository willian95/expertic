<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    public $table='groups_students';

    protected $fillable=[
        'institution_id',
        'period_id',
        'level_id',
        'section_id',
        'student_id',
        'active',
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

    public function students()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }

}
       