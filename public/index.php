<?php
require __DIR__.'/../vendor/autoload.php';

use App\Solid\OpenClosed\Order;
use App\Solid\OpenClosed\ShippingMethods\JntMethod;
use App\Solid\OpenClosed\ShippingMethods\PosLaju;

$Jntorder = new Order(new JntMethod);
$posLaju = new Order(new PosLaju);

echo $Jntorder->getShippingCost(). PHP_EOL;
echo $posLaju->getShippingCost();