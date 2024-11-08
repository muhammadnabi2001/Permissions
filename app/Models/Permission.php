<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=[
        'name',
        'key'
    ];
    public function roles()
    {
        return $this->belongsToMany('role_permissions','permission_id','role_id');
    }
}
