<?php

/** @var PDO $pdo */
$pdo = require 'db-common/connection.php';

$statement = "SELECT * FROM users";

$result = $pdo->query($statement);
if ($result === false) {
    list(, , $driverErrMsg) = $pdo->errorInfo();
    echo "Error querying the users table: $driverErrMsg" . PHP_EOL;
    return;
}

echo "All records" . PHP_EOL;
while ($record = $result->fetch()) {
    echo implode("\t", $record) . PHP_EOL;
}

$result = $pdo->query("SELECT * FROM users LIMIT 2");
echo PHP_EOL . "Use LIMIT 2" . PHP_EOL;
while ($record = $result->fetch()) {
    echo implode("\t", $record) . PHP_EOL;
}

$result = $pdo->query("SELECT * FROM users WHERE id > 3");
echo PHP_EOL . "Use WHERE id > 3" . PHP_EOL;
while ($record = $result->fetch()) {
    echo implode("\t", $record) . PHP_EOL;
}

$result = $pdo->query("SELECT * FROM users ORDER BY id DESC");
echo PHP_EOL . "Use ORDER BY id DESC" . PHP_EOL;
while ($record = $result->fetch()) {
    echo implode("\t", $record) . PHP_EOL;
}
