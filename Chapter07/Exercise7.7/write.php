<?php

$fileFwrite = 'sample/write-with-fwrite.txt';
$fp = fopen($fileFwrite, 'w+');
$written = fwrite($fp, 'File written with fwrite().' . PHP_EOL);

if (false === $written) {
    echo 'Error writing with fwrite.' . PHP_EOL;
} else {
    echo sprintf("> Successfully written %d bytes to [%s] with fwrite():", $written, $fileFwrite) . PHP_EOL;
    fseek($fp, 0);
    echo fread($fp, filesize($fileFwrite)) . PHP_EOL;
}

$fileFpc = 'sample/write-with-fpc.txt';
$written = file_put_contents($fileFpc, 'File written with file_put_contents().' . PHP_EOL);

if (false === $written) {
    echo 'Error writing with fwrite.' . PHP_EOL;
} else {
    echo sprintf("> Successfully written %d bytes to [%s] with file_put_contents():", $written, $fileFpc) . PHP_EOL;
    echo file_get_contents($fileFpc) . PHP_EOL;
}
