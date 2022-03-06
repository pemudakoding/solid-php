<?php
require __DIR__.'/../vendor/autoload.php';

use App\Solid\DependencyInversion\HighLevel\UserProfileController;
use App\Solid\DependencyInversion\LowLevel\UserPhotoProfile;
use App\Solid\DependencyInversion\LowLevel\UserPhotoProfileAmazon;

$internalStorage = new UserPhotoProfile;
$externalStorage = new UserPhotoProfileAmazon;

echo (new UserProfileController($internalStorage))->profilePhoto(). PHP_EOL.PHP_EOL;

echo (new UserProfileController($externalStorage))->profilePhoto();
