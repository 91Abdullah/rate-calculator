<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
