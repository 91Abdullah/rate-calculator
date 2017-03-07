<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name'];

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
