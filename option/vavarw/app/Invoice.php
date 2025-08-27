<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    public function institution()
    {
    	 return $this->belongsTo('App\Institution');
    }
    public function payment()
    {
    	return $this->hasOne('App\Payment');
    	# code...
    }
    public function contractor()
    {
    	 return $this->belongsTo('App\Contractor');
    }
}
