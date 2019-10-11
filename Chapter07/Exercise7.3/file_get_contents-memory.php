<?php file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $argv[1]);

echo sprintf("--\nmemory %.2fMB\n--\n", memory_get_peak_usage(true) / 1024 / 1024);
