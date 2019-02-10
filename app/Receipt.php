<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    // Mass assignable attributes
    protected $fillable = ['event_id', 'user_id'];
    // Specify the associated table
    protected $table = 'receipts';
}
