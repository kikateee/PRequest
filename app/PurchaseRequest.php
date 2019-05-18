<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    // Table Name
    protected $table = 'purchase_requests';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamp
    // public $timestamps = true;
}
