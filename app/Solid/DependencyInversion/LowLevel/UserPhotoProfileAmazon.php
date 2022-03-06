<?php

namespace App\Solid\DependencyInversion\LowLevel;

use App\Solid\DependencyInversion\Contracts\File;

class UserPhotoProfileAmazon implements File
{

    private $isOpen = false;

    public function open()
    {
        if($this->isOpen) {
            return 'Photo is already open';
        }

        $this->isOpen = true;

        return 'Photo is open with Amazon S3';
    }

    public function save($pathToSave)
    {
        //complicated code to save a file
    }
}