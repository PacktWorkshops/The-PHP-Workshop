<?php

/** @var PDO $pdo */
$pdo = require 'db-common/connection.php';

$insertStmt = $pdo->prepare("INSERT INTO users (email) VALUES (:email)");

if ($insertStmt->execute([':email' => $argv[1] ?? null]) === false) {
    list(, , $driverErrMsg) = $insertStmt->errorInfo();
    echo "Error inserting into the users table: $driverErrMsg" . PHP_EOL;
    return;
}

echo "Successfully inserted into users table the record with id " . $pdo->lastInsertId() . PHP_EOL;
