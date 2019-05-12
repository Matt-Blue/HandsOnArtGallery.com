<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    // Mass assignable attributes
    protected $fillable = ['name', 'description', 'height', 'width', 'date_posted', 'price', 'image'];
    // Specify the associated table
    protected $table = 'gallery';
}
