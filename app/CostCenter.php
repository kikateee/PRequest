<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    // Table Name
    protected $table = 'cost_centers';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamp
    // public $timestamps = true;
}
