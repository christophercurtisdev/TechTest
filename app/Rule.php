<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public function microservice()
    {
        return $this->belongsTo('App\Microservice');
    }
}
