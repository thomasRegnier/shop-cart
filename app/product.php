<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public function orders(){
        return $this->hasMany(OrderProduct::class);
    }

}
