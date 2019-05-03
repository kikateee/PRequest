<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Table Name
    protected $table = 'items';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamp
    // public $timestamps = true;
}
