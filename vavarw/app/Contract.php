<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'file',
        'client_id',
        'car_id',
        'start_date',
        'end_date'
    ];

    public function client()
    {
        return $this->belongsTo(\App\Institution::class, 'client_id');
    }

    public function car()
    {
        return $this->belongsTo(\App\Car::class);
    }
}
