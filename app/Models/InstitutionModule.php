<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionModule extends Model
{
    public $table='institution_module';

    protected $fillable=[
        'institution_id',
        'module_id',
    ];

}
