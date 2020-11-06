<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $table='teachers';

    protected $fillable=[
        'user_id',
        'institution_id',
        'rut',
        'teacher_name',
        'teacher_lastname',
    ];
    
    public function subjects(){

        return $this->belongsToMany('App\Models\Subject');

    }

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}


