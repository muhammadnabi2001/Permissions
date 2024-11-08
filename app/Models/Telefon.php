<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefon extends Model
{
    protected $fillable=[
        'model',
        'color',
        'price',
        'count',
    ];
}
