<?php

namespace App\Solid\OpenClosed\Contracts;

use App\Solid\OpenClosed\Order;

interface ShippingContract
{
    public function getShippingCost(Order $order);
}