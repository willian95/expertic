<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public $table='institutions';

    protected $fillable=[
        'rut',
        'institution_name',
        'reason_social',
        'address',
        'website_link',
        'logo',
    ];


    public function modules(){

        return $this->belongsToMany('App\Models\Module');

    }

}
