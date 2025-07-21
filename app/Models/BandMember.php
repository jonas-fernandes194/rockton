<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BandMember extends Model
{
    protected $table = 'band_member';

    protected $fillable = [
        'band_id',
        'member_id',
        'status_member',
        'status_band',
    ];
}
