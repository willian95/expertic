<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public $table='timetables';

    protected $fillable=[
        'institution_id',
        'period_id',
        'level_id',
        'section_id',
        'timetable',
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

}

