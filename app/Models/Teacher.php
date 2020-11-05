<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $table='teachers';

    protected $fillable=[
        'institution_id',
        'rut',
        'name',
        'lastname',
    ];
    
    public function subjects(){

        return $this->belongsToMany('App\Models\Subject');

    }
}


