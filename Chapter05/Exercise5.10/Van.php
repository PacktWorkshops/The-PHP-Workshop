<?php
require_once 'Car.php';

class Van extends Car
{
    public function start()
    {
        $this->engineStatus = true;
    }
}
