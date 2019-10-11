<?php

$filePath = __DIR__ . '/sample/users_list_enclosed.csv';
$fileResource = fopen($filePath, 'r');

if ($fileResource === false) {
    exit(sprintf('Cannot read [%s] file.', $filePath));
}

$recordNumber = 0;
while (!feof($fileResource)) {
    $recordNumber++;
    $line = fgetcsv($fileResource);
    echo sprintf("Line %d: %s", $recordNumber, print_r($line, true));
}
fclose($fileResource);

echo PHP_EOL;
