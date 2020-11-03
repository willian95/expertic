<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $table='user_roles';

    protected $fillable=[
        'user_id',
        'role_id',
    ];

    public function users()
    {
        return $this->hasMany('App\User','user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }
}
