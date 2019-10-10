<?php
class Vehicle
{
    public $make = 'DefaultMake';
    public $model = 'DefaultModel';
    public $color = 'DefaultColor';
    public $noOfWheels = 0;
    public $engineNumber = 'XXXXXXXX';
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
}
$object = new Vehicle();
$object->setMake('Honda');
$object->setModel('Civic');
$object->setColor('Red');
$object->setNoOfWheels(4);
$object->setEngineNumber('ABC123456');
echo "Make : " . $object->getMake() . PHP_EOL;
echo "Model : " . $object->getModel() . PHP_EOL;
echo "Color : " . $object->getColor() . PHP_EOL;
echo "No. of wheels : " . $object->getNoOfWheels() . PHP_EOL;
echo "Engine no. : " . $object->getEngineNumber() . PHP_EOL;
