<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DateUtile extends Model
{
      protected $fillable = [
        "title",
        "label",
        "event_date",
        "year"
    ];
}
