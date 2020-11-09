<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepresentativeStudent extends Model
{
    public $table='representative_student';

    protected $fillable=[
        'representative_id',
        'student_id',
    ];
}
