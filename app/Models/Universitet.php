<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitet extends Model
{
    protected $fillable=[
        'name',
        'adress',
        'facultet',
    ];
}
