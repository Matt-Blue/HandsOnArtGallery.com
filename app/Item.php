<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Mass assignable attributes
    protected $fillable = ['name', 'price'];
    // Specify the associated table
    protected $table = 'items';
}
