<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    public $table='subject_teacher';

    protected $fillable=[
        'teacher_id',
        'subject_id',
    ];
}
