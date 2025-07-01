<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'name',
        'cover',
        'description'
    ];

    protected $casts = [
        'status' => '',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
