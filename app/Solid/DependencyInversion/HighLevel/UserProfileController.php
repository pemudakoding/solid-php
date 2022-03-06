<?php

namespace App\Solid\DependencyInversion\HighLevel;

use App\Solid\DependencyInversion\Contracts\File;

class UserProfileController
{

    private File $photo;

    public function __construct(File $photo)
    {
        $this->photo = $photo;
    }

    public function profilePhoto()
    {
        return $this->photo->open();
    }

}