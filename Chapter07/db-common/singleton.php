<?php

class DatabaseSingleton
{
    private function __construct()
    {
        //$this->pdo = new PDO(...);
    }

    public static function instance()
    {
        static $instance;
        if (is_null($instance)) {
            $instance = new static;
        }
        return $instance;
    }
}

$databaseSingleton1 = DatabaseSingleton::instance();
$databaseSingleton2 = DatabaseSingleton::instance();

echo "Same class instance? ",
    $databaseSingleton1 === $databaseSingleton2 ? 'YES' : 'NO',
    PHP_EOL;
