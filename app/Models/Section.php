<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $table='sections';

    protected $fillable=[
        'institution_id',
        'section'
    ]; 
}
