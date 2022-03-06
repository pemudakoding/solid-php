<?php

namespace App\Solid\LiskovSubtitution;

class WrittableFile extends File
{

    //When the file is writtable we can use this instace
    //for update the writtable file
    //this instance also have a read method from File class

    public function save(string $filename, string $content): void
    {
        // save content to file
    }
}

?>