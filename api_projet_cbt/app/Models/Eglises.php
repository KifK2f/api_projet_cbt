<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eglises extends Model
{
     protected $fillable = [
        'zone_id',
        'name',
        'pastor',
        'phone'
    ];

    // Une église appartient à une et une seule zone
    public function zone()
    {
        return $this->belongsTo(Zones::class);
    }
}
