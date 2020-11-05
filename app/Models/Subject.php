<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table='subjects';

    protected $fillable=[
        'institution_id',
        'subject'
    ]; 
}
