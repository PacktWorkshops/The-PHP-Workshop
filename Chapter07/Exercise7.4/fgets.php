<?php

$filePath = __DIR__ . '/sample/users_list.csv';
$fileResource = fopen($filePath, 'r');

if ($fileResource === false) {
    exit(sprintf('Cannot read [%s] file.', $filePath));
}

$lineNumber = 0;
while (!feof($fileResource)) {
    $lineNumber++;
    $line = fgets($fileResource);
    echo sprintf("Line %d: %s", $lineNumber, $line);
}
fclose($fileResource);

echo PHP_EOL;
