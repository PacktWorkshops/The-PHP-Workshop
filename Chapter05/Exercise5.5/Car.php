<?php
require_once 'Vehicle.php';

class Car extends Vehicle
{

    public $doors = 4;
    public $passengerCapacity = 5;
    public $steeringWheel = true;
    public $transmission = 'Manual';

    //class body
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

$car1 = new Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
$car2 = new Car('Toyota', 'Allion', 'White', 4, '24CJ4568');
$car3 = new Car('Hyundai', 'Elantra', 'Black', 4, '24CJ1234');
$car4 = new Car('Chevrolet', 'Camaro', 'Yellow', 4, '23CJ9397');
  
echo "Available cars are " . Car::$counter . PHP_EOL;