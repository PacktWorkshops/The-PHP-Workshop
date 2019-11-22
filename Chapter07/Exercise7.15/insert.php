<?php

/** @var PDO $pdo */
$pdo = require 'db-common/connection.php';

$insertStmt = "INSERT INTO users (email) VALUES ('john.smith@mail.com')";

if ($pdo->exec($insertStmt) === false) {
    list(, , $driverErrMsg) = $pdo->errorInfo();
    echo "Error inserting into the users table: $driverErrMsg" . PHP_EOL;
    return;
}

echo "Successfully inserted into users table the record with id " . $pdo->lastInsertId() . PHP_EOL;
