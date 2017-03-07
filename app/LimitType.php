<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitType extends Model
{
    protected $fillable = ['name'];

    public function type()
    {
        return $this->hasMany('App\Type');
    }
}
