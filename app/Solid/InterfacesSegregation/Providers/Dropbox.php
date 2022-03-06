<?php

namespace App\Solid\InterfacesSegregation\Providers;

use App\Solid\InterfacesSegregation\Contracts\CloudStorageProvider;

class Dropbox implements CloudStorageProvider
{
    public function storeFile($name)
    {
        return 'Dropbox: File '.$name.' stored';
    }

    public function getFile($name)
    {
        return 'Dropbox: File '.$name.' retrieved';
    }

    public function createServer($region)
    {
        // nothing
    }

    public function listServer($region)
    {
        // nothing
    }

    public function getCDNAddress()
    {
        // nothing
    }
}