<?php

echo 'SCRIPT START.', PHP_EOL;

require_once 'err-common/exception-handler.php';

try {

    echo 'Run TRY block.', PHP_EOL;
    if (!isset($argv[1])) {
        echo 'NO ARGUMENT: Will throw exception.', PHP_EOL;
        throw new LogicException('Argument #1 is required.');
    }

    echo 'ARGUMENT: ', $argv[1], PHP_EOL;
    var_dump(new $argv[1]);

} catch (Exception $e) {

    echo 'EXCEPTION: ', sprintf('%s in %s at line %d', $e->getMessage(), $e->getFile(), $e->getLine()), PHP_EOL;

} finally {

    echo "FINALLY block gets executed.\n";

}

echo "Outside TRY-CATCH.\n";

echo 'SCRIPT END.', PHP_EOL;
