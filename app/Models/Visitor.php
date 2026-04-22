<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'hits',
        'last_visit',
    ];

    protected $casts = [
        'last_visit' => 'datetime',
    ];
}
