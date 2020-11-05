<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{

    public $table='periods';

    protected $fillable=[
        'institution_id',
        'period'
    ];    

}
