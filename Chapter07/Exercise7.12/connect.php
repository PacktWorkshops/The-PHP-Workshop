<?php

$dsn = "mysql:host=mysql-host;port=3306;charset=utf8mb4";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
$pdo = new PDO($dsn, "php-user", "php-pass", $options);

echo sprintf(
        "Connected to MySQL server v%s, on %s",
        $pdo->getAttribute(PDO::ATTR_SERVER_VERSION),
        $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS)
    ) . PHP_EOL;
