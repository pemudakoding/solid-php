<?php

namespace App\Solid\LiskovSubtitution;

abstract class File
{
    //if the file readonly we can use this instance
    //for read the file
    public function read(string $filename): string
    {
        return 'give full path of file name';
    }
}

?>