<?php
require_once dirname(__FILE__) . "/regexIterator.php";

$it = new FilesystemRegexFilter('.');

do{
    $answer = $it->regFilter('/^new/i');
    print_r( $answer);
}while(fgets(STDIN) == "n\n");

//$dirFile = $fileInfo->isDir();