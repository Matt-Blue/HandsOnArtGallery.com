<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Mass assignable attributes
    protected $fillable = ['name', 'description', 'date', 'start_time', 'end_time', 'type', 'image'];
    // Specify the associated table
    protected $table = 'events';
}
