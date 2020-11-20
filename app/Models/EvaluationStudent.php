<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationStudent extends Model
{
    public $table='evaluation_student';

    protected $fillable=[
        'evaluation_id',
        'student_id',
        'score',
    ];

    public function evaluations(){

        return $this->belongsTo('App\Models\Evaluation','evaluation_id');

    }

    public function students()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }
}
