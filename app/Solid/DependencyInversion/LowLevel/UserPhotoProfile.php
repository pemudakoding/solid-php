<?php

namespace App\Solid\DependencyInversion\LowLevel;

use App\Solid\DependencyInversion\Contracts\File;

class UserPhotoProfile implements File
{

    private $isOpen = false;

    public function open()
    {
        if($this->isOpen) {
            return 'Photo is already open';
        }

        $this->isOpen = true;

        return 'Photo is open with internalStorage';
    }

    public function save($pathToSave)
    {
        //complicated code to save a file
    }
}