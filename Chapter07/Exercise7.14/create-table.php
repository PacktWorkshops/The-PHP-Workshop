<?php

/** @var PDO $pdo */
$pdo = require 'db-common/connection.php';

$createStmt = "CREATE TABLE users
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(254) NOT NULL UNIQUE,
    signup_time DATETIME default CURRENT_TIMESTAMP NOT NULL
)";

if ($pdo->exec($createStmt) === false) {
    list(, , $driverErrMsg) = $pdo->errorInfo();
    echo "Error creating the users table: $driverErrMsg" . PHP_EOL;
    return;
}

echo "The users table was successfully created.";
