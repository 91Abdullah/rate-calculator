<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['rate', 'service_id', 'destination_id', 'upto', 'additional_rate', 'additional_weight'];

    public function destination()
    {
        return $this->belongsTo('App\Destination');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
