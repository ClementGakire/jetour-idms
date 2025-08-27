<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // allow mass assignment for new fields
    protected $fillable = [
        'user_id', 'files', 'voucherNo', 'institution', 'invoiceNumber', 'payment_date', 'amounts',
        'car_id', 'booking_date', 'return_date', 'client', 'booked_by', 'unit_price', 'phone_number',
        'id_number', 'caution', 'total_price', 'driver_id', 'advance'
    ];

    /**
     * Driver relation
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
