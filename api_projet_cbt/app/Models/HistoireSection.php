<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoireSection extends Model
{
    protected $fillable = [
        'order',
        'title',
        'content',
    ];
}
