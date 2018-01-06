<?php
declare(strict_types = 1);
class FilesystemRegexFilter
{
    private $regex;

    public function __construct($path)
    {
        $filter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

        $this->regex = $filter;
    }

    public function regFilter(string $regular):array
    {
        $arr = [];
        $count = 0;

        while( $count < 10 && $this->regex->valid()){
            $fileInfo = new SplFileInfo($this->regex->current()->getPathname());

            $fileName = $fileInfo->getFilename();

            if(preg_match($regular, $fileName)){
                $arr[] = $fileName;
                $count++;
            }
            $this->regex->next();
        }
        return $arr;
    }
}

