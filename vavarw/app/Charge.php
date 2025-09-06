<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'car_id', 'expense_id', 'driver_id', 'roadmap', 'amount', 'date', 'files', 'supplier', 'payment_mode'
    ];
   
}
