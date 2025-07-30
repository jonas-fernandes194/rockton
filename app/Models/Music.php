<?php

namespace App\Models;

use App\Models\Band;
use Illuminate\Database\Eloquent\Model;

class Music extends Model 
{
    protected $table = 'musics';
    
    protected $fillable = [
        'title',
        'photo',
        'band_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function band(){
        return $this->belongsTo(Band::class);
    }
}