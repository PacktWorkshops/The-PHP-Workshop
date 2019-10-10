<?php

require_once 'Vehicle.php';


$vehicle = new Vehicle();
echo "Make: " . $vehicle->make . PHP_EOL;
echo "Model: " . $vehicle->model . PHP_EOL;
echo "Color: " . $vehicle->color . PHP_EOL;
//echo "No of wheels: " . $vehicle->noOfWheels . PHP_EOL;
//echo "Engine No: " . $vehicle->engineNumber . PHP_EOL;
echo "No of wheels: " . $vehicle->getNoOfWheels() . PHP_EOL;
echo "Engine No: " . $vehicle->getEngineNumber() . PHP_EOL;