<?php

namespace App\Models;

use App\Enums\Banda\StatusBanda;
use Illuminate\Database\Eloquent\Model;
use Music;

class Band extends Model
{
    protected $fillable = [
        'name',
        'cover',
        'photo',
        'status',
        'description'
    ];

    protected $casts = [
        'status' => StatusBanda::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function members(){
        return $this->belongsToMany(Member::class, 'band_member');
    }

    public function music(){
        return $this->hasMany(Music::class);
    }
}
