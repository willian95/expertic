<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    public $table='modules';

    protected $fillable=[
        'module_name',
        'module_description',
    ];

    public function Institutions(){

        return $this->belongsToMany('App\Models\Institution');

    }
}
