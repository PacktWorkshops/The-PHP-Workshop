<?php

$filepath = 'sample/to-delete.txt';

if (is_file($filepath)) {
    if (unlink($filepath)) {
        echo sprintf('The [%s] file was deleted.', $filepath) . PHP_EOL;
    } else {
        echo sprintf('The [%s] file cannot be deleted.', $filepath) . PHP_EOL;
    }
} else {
    echo sprintf('The [%s] file does not exist.', $filepath) . PHP_EOL;
}
