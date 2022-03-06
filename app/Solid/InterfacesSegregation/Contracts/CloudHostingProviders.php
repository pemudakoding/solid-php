<?php

namespace App\Solid\InterfacesSegregation\Contracts;

interface CloudHostingProviders
{
    public function createServer($region);

    public function listServer($region);
}