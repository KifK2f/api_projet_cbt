<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisationCBT extends Model
{
    protected $fillable = [
        'name',
        'role',
        'phone',
        'type',
        'category',
        'is_main',
        'position',
        'url_image',
    ];
}
