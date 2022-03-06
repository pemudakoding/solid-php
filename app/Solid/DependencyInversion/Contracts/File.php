<?php

namespace App\Solid\DependencyInversion\Contracts;

interface File
{
    public function open();

    public function save($pathToSave);
}