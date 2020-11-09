<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table='students';

    protected $fillable=[
        'user_id',
        'institution_id',
        'representative_id',
        'rut',
        'student_name',
        'student_lastname',
        'blood_type',
        'phone',
        'allergies',
        'address',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}