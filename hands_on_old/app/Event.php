<?php

namespace HandsOnArtGallery.com;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Mass assignable attributes
    protected $fillable = ['name', 'description', 'start_date', 'start_time', 'end_date', 'end_time', 'type', 'price'];
    // Specify the associated table
    protected $table = 'events';
}
