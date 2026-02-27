<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class President extends Model
{
     protected $fillable = [
        'name',
        'title',
        'message',
        'url_image',
    ];
}
