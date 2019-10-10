<?php
require_once 'AbstractVehicle.php';
require_once 'DriveInterface.php';

class Car extends AbstractVehicle implements DriveInterface
{

    public $doors = 4;
    public $passengerCapacity = 5;
    public $steeringWheel = true;
    public $transmission = 'Manual';

    private $hasKeyinIgnition = true;

    public function start()
    {
        if ($this->hasKeyinIgnition) {
            $this->engineStatus = true;
        }
    }

    public function changeSpeed($speed)
    {
        echo "The car has been accelerated to " . $speed . " kph. " . PHP_EOL;
    }

    public function changeGear($gear)
    {
        echo "Shifted to gear number " . $gear . ". " . PHP_EOL;
    }

    public function applyBreak()
    {
        echo "All the 4 breaks in the wheels applied. " . PHP_EOL;
    }
}
/*
$car = new Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
echo "Vehicle Type: " . get_class($car) . PHP_EOL;
echo " Make: " . $car->getMake() . PHP_EOL;
echo " Model: " . $car->getModel() . PHP_EOL;
echo " Color: " . $car->getColor() . PHP_EOL;
echo " No of wheels: " . $car->getNoOfWheels() . PHP_EOL;

echo " No of Doors: " . $car->doors . PHP_EOL;
echo " Transmission: " . $car->transmission . PHP_EOL;
echo " Passenger capacity: " . $car->passengerCapacity . PHP_EOL;
*/
//echo " No of wheels: " . $car->noOfWheels . PHP_EOL;
//echo " Engine number: " . $car->engineNumber . PHP_EOL;
/*
$car1 = new Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
$car2 = new Car('Toyota', 'Allion', 'White', 4, '24CJ4568');
$car3 = new Car('Hyundai', 'Elantra', 'Black', 4, '24CJ1234');
$car4 = new Car('Chevrolet', 'Camaro', 'Yellow', 4, '23CJ9397');

echo "Available cars are " . Car::$counter . PHP_EOL;
*/
/*
$car = new Car('Honda', 'Civic', 'Red', 4, '23CJ4567');

$car->start();
echo "The car is " . ($car->getEngineStatus() ? 'running' : 'stopped') . PHP_EOL;
$car->stop();
echo "The car is " . ($car->getEngineStatus() ? 'running' : 'stopped') . PHP_EOL;
*/

$car = new Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
  
$car->changeSpeed(65);
$car->applyBreak();
$car->changeGear(4);
$car->changeSpeed(75);
$car->applyBreak();
