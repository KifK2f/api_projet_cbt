<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zones extends Model
{
    protected $fillable = [
        'name',
        'moderator',
        'phone',
        'year',
    ];

    //Une zone peut avoir plusieurs églises
    public function eglises()
    {
        return $this->hasMany(Eglises::class);
    }

}
