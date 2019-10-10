<?php

abstract class AbstractVehicle
{
    public $make;
    public $model;
    public $color;
    protected $noOfWheels;
    private $engineNumber;
    public static $counter = 0;
    protected $engineStatus = false;

    function __construct($make = 'DefaultMake', $model = 'DefaultModel', $color = 'DefaultColor', $wheels = 4, $engineNo = 'XXXXXXXX')
    {
        $this->make = $make;
        $this->model = $model;
        $this->color = $color;
        $this->noOfWheels = $wheels;
        $this->engineNumber = $engineNo;
        self::$counter++;
    }

    function getMake()
    {
        return $this->make;
    }

    function getModel()
    {
        return $this->model;
    }

    function getColor()
    {
        return $this->color;
    }

    function getNoOfWheels()
    {
        return $this->noOfWheels;
    }

    function getEngineNumber()
    {
        return $this->engineNumber;
    }

    function setMake($make)
    {
        $this->make = $make;
    }

    function setModel($model)
    {
        $this->model = $model;
    }

    function setColor($color)
    {
        $this->color = $color;
    }

    function setNoOfWheels($wheels)
    {
        $this->noOfWheels = $wheels;
    }

    function setEngineNumber($engineNo)
    {
        $this->engineNumber = $engineNo;
    }

    abstract function start();

    function stop()
    {
        $this->engineStatus = false;
    }

    function getEngineStatus()
    {
        return $this->engineStatus;
    }
}
