<?php

class User 
{
    public $name;
    private $mailer;
    private $database;
    
    function __construct(string $name, Mailer $mailer, Database $db)
    {
        $this->name = $name;
        $this->mailer = $mailer;
        $this->database = $db;
    }
}
class Mailer
{

}
class Database
{

}
$mailer = new Mailer();
$database = new Database();
$user = new User('John Doe', $mailer, $database);