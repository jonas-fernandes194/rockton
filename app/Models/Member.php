<?php

namespace App\Models;

use App\Enums\Musico\StatusMusico;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 
        'cover',
        'band_id',
        'description',
        'photo',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'status' => StatusMusico::class
    ];
}
