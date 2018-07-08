<?php

namespace HandsOnArtGallery.com;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    // Mass assignable attributes
    protected $fillable = ['event_id', 'user_id', 'details', 'accomodations', 'location','status'];
    // Specify the associated table
    protected $table = 'requests';
}
