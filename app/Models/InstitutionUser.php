<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionUser extends Model
{
    public $table='institution_user';

    protected $fillable=[
        'user_id',
        'institution_id',
    ];

}
