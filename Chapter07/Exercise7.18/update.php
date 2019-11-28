<?php

/** @var PDO $pdo */
$pdo = require 'db-common/connection.php';

$updateId = $argv[1] ?? 0;
$updateEmail = $argv[2] ?? '';
$updateStmt = $pdo->prepare("UPDATE users SET email = :email WHERE id = :id");

if ($updateStmt->execute([':id' => $updateId, ':email' => $updateEmail]) === false) {
    list(, , $driverErrMsg) = $updateStmt->errorInfo();
    echo "Error running the query: $driverErrMsg" . PHP_EOL;
    return;
}

echo sprintf("The query ran successfully. %d row(s) were affected.", $updateStmt->rowCount()) . PHP_EOL;
