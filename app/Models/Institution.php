<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public $table='institutions';

    protected $fillable=[
        'rut',
        'institution_name',
        'business_name',
        'address',
        'website_link',
        'logo',
    ];
}
