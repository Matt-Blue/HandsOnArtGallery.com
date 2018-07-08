<?php

namespace HandsOnArtGallery.com;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    // Mass assignable attributes
    protected $fillable = ['event_id', 'user_id', 'paid'];
    // Specify the associated table
    protected $table = 'signups';
}
