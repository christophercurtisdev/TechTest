<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microservice extends Model
{
    public function rules()
    {
        return $this->hasMany('App\Rule');
    }
}
