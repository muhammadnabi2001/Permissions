<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=
    [
        'name',
        'is_active'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'role_users','user_id','role_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permissions','role_id','permission_id');
    }
}
