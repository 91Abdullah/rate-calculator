<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'weight_limit'];

    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
}
