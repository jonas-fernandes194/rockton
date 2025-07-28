<?php

use App\Models\Band;
use Illuminate\Database\Eloquent\Model;

class Music extends Model 
{
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