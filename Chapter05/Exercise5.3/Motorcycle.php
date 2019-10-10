<?php

require_once 'Vehicle.php';

class Motorcycle extends Vehicle
{
    public $noOfWheels =  2;
    public $stroke = 4;
}

$motorcycle = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
echo "Vehicle Type: " . get_class($motorcycle) . PHP_EOL;
echo " Make: " . $motorcycle->make . PHP_EOL;
echo " Model: " . $motorcycle->model . PHP_EOL;
echo " Color: " . $motorcycle->color . PHP_EOL;
echo " No of wheels: " . $motorcycle->noOfWheels . PHP_EOL;
echo " No of strokes: " . $motorcycle->stroke . PHP_EOL;
