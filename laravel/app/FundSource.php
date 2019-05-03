<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundSource extends Model
{
    // Table Name
    protected $table = 'fund_sources';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamp
    // public $timestamps = true;
}
