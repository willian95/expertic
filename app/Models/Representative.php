<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    public $table='representatives';

    protected $fillable=[
        'user_id',
        'institution_id',
        'representative_id',
        'rut',
        'representative_name',
        'representative_lastname',
        'address',
        'phone',
        'leading',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function representatives()
    {
        return $this->belongsTo('App\Models\Representative', 'id','representative_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }
}