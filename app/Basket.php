<?php

namespace App;

use Session;

class Basket
{
    //

    public function __construct()
    {
      $this->cart = Session::get('basket') ?? [];
    }


    public function getTotalQt()
    {

        $sumQt = array_reduce($this->cart, function($carry, $item)
        {
            return $carry + $item->quantity;
        });

        return $sumQt;
    }


    public function getTotalPrice()
    {

        $sumQt = array_reduce($this->cart, function($carry, $item)
        {
            return $carry + $item->shoes->price * $item->quantity;
        });

        return $sumQt;
    }

}
