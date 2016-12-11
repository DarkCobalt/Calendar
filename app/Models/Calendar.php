<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'user_id', 'title', 'color'
    ];

    public function events(){
        return $this->belongsToMany(Event::class, 'calendar_events','calendar_id', 'event_id');
    }
}
