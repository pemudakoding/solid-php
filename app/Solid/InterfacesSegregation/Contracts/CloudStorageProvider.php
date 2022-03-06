<?php

namespace App\Solid\InterfacesSegregation\Contracts;

interface CloudStorageProvider
{
    public function storeFile($name);

    public function getFile($name);
}