<?php

namespace App\Solid\InterfacesSegregation\Providers;

use App\Solid\InterfacesSegregation\Contracts\CDNProvider;
use App\Solid\InterfacesSegregation\Contracts\CloudHostingProviders;
use App\Solid\InterfacesSegregation\Contracts\CloudStorageProvider;

class Amazon implements CloudHostingProviders, CDNProvider, CloudStorageProvider
{
    public function storeFile($name)
    {
        return 'Amazon: File '.$name.' stored';
    }

    public function getFile($name)
    {
        return 'Amazon: File '.$name.' retrieved';
    }

    public function createServer($region)
    {
        return 'Amazon: Server created in '.$region;
    }

    public function listServer($region)
    {
        return 'Amazon: List of servers in '.$region;
    }

    public function getCDNAddress()
    {
        return 'Amazon: CDN address';
    }
}
