<?php

$sourceFilePath = 'sample/to-copy.txt';
$targetFilePath = 'sample/to-copy.txt.bak';

if (!is_file($sourceFilePath)) {
    echo sprintf('The [%s] file does not exist.', $sourceFilePath) . PHP_EOL;
    return;
}

if (copy($sourceFilePath, $targetFilePath)) {
    echo sprintf('The [%s] file was copied to [%s].', $sourceFilePath, $targetFilePath) . PHP_EOL;
} else {
    echo sprintf('The [%s] file cannot be copied to [%s].', $sourceFilePath, $targetFilePath) . PHP_EOL;
}
