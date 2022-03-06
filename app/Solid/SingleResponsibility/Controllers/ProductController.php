<?php

namespace App\Solid\SingleResponsibility\Controllers;

use App\Solid\SingleResponsibility\Actions\Products\StoreProduct;
use App\Solid\SingleResponsibility\Actions\Products\UpdateProduct;

class ProductController
{
    public function store($requestFromClient)
    {
        $store = (new StoreProduct)->handle($requestFromClient);

        return $store;
    }

    public function update($requestFromClient)
    {
        $update = (new UpdateProduct)->handle($requestFromClient);

        return $update;
    }
}