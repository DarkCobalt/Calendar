<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_event',
        'end_event',
        'all_day',
        'all_day_date'
    ];

    protected $dates = ['start_event', 'end_event', 'all_day_date'];
}
