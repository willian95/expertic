<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimetableDetail extends Model
{
    public $table='timetable_details';

    protected $fillable=[
        'timetable_id',
        'teacher_id',
        'subject_id',
        'day',
        'hour',
    ];
    
    public function timetables(){

        return $this->belongsTo('App\Models\Timetable','timetable_id');

    }

    public function teachers(){

        return $this->belongsTo('App\Models\Teacher','teacher_id');

    }

    public function subjects(){

        return $this->belongsTo('App\Models\Subject','subject_id');

    }



}
