<?php

namespace App\Solid\OpenClosed\ShippingMethods;

use App\Solid\OpenClosed\Contracts\ShippingContract;
use App\Solid\OpenClosed\Order;

class PosLaju implements ShippingContract
{
    public function getShippingCost(Order $order)
    {
        return $order->getWeight() * 0.05 + 10;
    }
}