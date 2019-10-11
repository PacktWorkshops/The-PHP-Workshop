<?php

$filePath = __DIR__ . DIRECTORY_SEPARATOR . $argv[1];
$fileResource = fopen($filePath, 'r');

if ($fileResource === false) {
    exit(sprintf('Cannot read [%s] file.', $filePath));
}

$readLength = $argv[2] ?? 4096;
$iterations = 0;
while (!feof($fileResource)) {
    $iterations++;
    fread($fileResource, $readLength);
}
fclose($fileResource);

echo sprintf("--\n%d iteration(s): memory %.2fMB\n--\n", $iterations, memory_get_peak_usage(true) / 1024 / 1024);
