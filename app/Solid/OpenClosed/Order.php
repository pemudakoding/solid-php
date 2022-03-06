<?php

namespace App\Solid\OpenClosed;

use App\Solid\OpenClosed\Contracts\ShippingContract;
use App\Solid\OpenClosed\ShippingMethod\JntMethod;

class Order
{
    private ShippingContract $shipping;

    private $weight;

    public function __construct(ShippingContract $shipping)
    {
        $this->shipping = $shipping;
    }

    public function getWeight()
    {
        $this->setWeight(10);

        return $this->weight;
    }

    public function getShippingCost()
    {
        return $this->shipping->getShippingCost($this);
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    //don't ever do this
    public function getShippingCostArtefak($shipping)
    {
        if($shipping === 'jnt'){
            //more code for get shipping cost by
            //shipping method API
        }

        if($shipping === 'pos'){
            //more code for get shipping cost by
            //shipping method API
        }

        if($shipping === 'jntpos'){
            //more code for get shipping cost by
            //shipping method API
        }
    }
}

