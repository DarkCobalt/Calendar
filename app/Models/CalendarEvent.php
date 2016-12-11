<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $fillable = [
        'user_id', 'calendar_id', 'event_id'
    ];
    public $timestamps = false;
}
