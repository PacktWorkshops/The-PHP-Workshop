<?php

/** @var PDO $pdo */
$pdo = require 'db-common/connection.php';

$partialMatch = $argv[1] ?? '';
$deleteStmt = $pdo->prepare("DELETE FROM users WHERE email LIKE :partialMatch");

if ($deleteStmt->execute([':partialMatch' => "%$partialMatch%"]) === false) {
    list(, , $driverErrMsg) = $deleteStmt->errorInfo();
    echo "Error deleting from the users table: $driverErrMsg" . PHP_EOL;
    return;
}

if($rowCount = $deleteStmt->rowCount()){
    echo sprintf("Successfully deleted %d records matching '%s' from users table.", $rowCount, $partialMatch) . PHP_EOL;
} else {
    echo sprintf("No records matching '%s' were found in users table.", $partialMatch) . PHP_EOL;
}
