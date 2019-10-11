<?php

$filePath = 'sample/to-move.txt';
$targetDirectory = 'sample/archive/2019';

if (!is_file($filePath)) {
    echo sprintf('The [%s] file does not exist.', $filePath) . PHP_EOL;
    return;
}

if (!is_dir($targetDirectory)) {
    echo sprintf('The target directory [%s] does not exist. Will create... ', $targetDirectory);
    if (!mkdir($targetDirectory, 0777, true)) {
        echo sprintf('The target directory [%s] cannot be created.', $targetDirectory) . PHP_EOL;
        return;
    }
    echo 'Done.' . PHP_EOL;
}

$targetFilePath = $targetDirectory . DIRECTORY_SEPARATOR . basename($filePath);
if (rename($filePath, $targetFilePath)) {
    echo sprintf('The [%s] file was moved in [%s].', basename($filePath), $targetDirectory) . PHP_EOL;
} else {
    echo sprintf('The [%s] file cannot be moved in [%s].', basename($filePath), $targetDirectory) . PHP_EOL;
}
