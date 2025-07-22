<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Musico\StatusMusico;
use App\Enums\Banda\StatusBanda;

class BandMember extends Model
{
    protected $table = 'band_member';

    protected $fillable = [
        'band_id',
        'member_id',
        'status_member',
        'status_band',
    ];

    protected $casts = [
        'status_member' => StatusMusico::class,
        'statys_band' => StatusBanda::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
