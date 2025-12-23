<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juice extends Model
{
    protected $fillable = [
        'title',
        'details',
        'price',
        'image',
    ];
}
