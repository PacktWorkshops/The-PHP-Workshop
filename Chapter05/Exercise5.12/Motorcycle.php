<?php
namespace Vehicle;

spl_autoload_register();

class Motorcycle extends AbstractVehicle implements DriveInterface 
{
	public $noOfWheels =  2;
	public $stroke = 4;

	private $hasKey = true;
	private $hasKicked = true;


	public function start()
	{
		if($this->hasKey && $this->hasKicked) {
			$this->engineStatus = true;
		}
	}

	public function changeSpeed($speed)
	{
		echo "The motorcycle has been accelerated to ". $speed. " kph. "  . PHP_EOL;
	}

	public function changeGear($gear)
	{
		echo "Gear shifted to ". $gear. ". " . PHP_EOL;
	}

	public function applyBreak()
	{
			echo "The break applied. " . PHP_EOL;
	}

	function getPrice()
	{
		return $this->price - $this->price * 0.05;
	}
}


/*
$motorcycle = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');

echo "Vehicle Type: " . get_class($motorcycle)  . PHP_EOL;
echo " Make: " . $motorcycle->make  . PHP_EOL;
echo " Model: " . $motorcycle->model  . PHP_EOL;
echo " Color: " . $motorcycle->color  . PHP_EOL;

echo " No of wheels: " . $motorcycle->noOfWheels  . PHP_EOL;
echo " No of strokes: " . $motorcycle->stroke  . PHP_EOL;
*/


/*
$motorcycle1 = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
$motorcycle2 = new Motorcycle('Suzuki', 'Gixxer SF', 'Blue', 2, '53WVC14599');
$motorcycle2 = new Motorcycle('Harley Davidson', 'Street 750', 'Black', 2, '53WVC14234');
echo "Available motorcycles are " . Motorcycle::$counter  . PHP_EOL;
*/

/*
$motorcycle = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');

$motorcycle->start();
echo "The motorcycle is " . ($motorcycle->getEngineStatus()?'running':'stopped') . PHP_EOL;
$motorcycle->stop();
echo "The motorcycle is " . ($motorcycle->getEngineStatus()?'running':'stopped') . PHP_EOL;
*/

/*
$motorcycle = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');

$motorcycle->changeSpeed(45);
$motorcycle->changeGear(3);
$motorcycle->applyBreak();
*/

/*
$motorcycle = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
$motorcycle->setPrice(5000);
echo "The price is  ". $motorcycle->getPrice() . PHP_EOL;
*/

$motorcycle = new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
$motorcycle->start();
echo "The motorcycle is " . ($motorcycle->getEngineStatus()?'running':'stopped') . PHP_EOL;
$motorcycle->changeGear(3);
$motorcycle->changeSpeed(35);
$motorcycle->applyBreak();
$motorcycle->stop();
echo "The motorcycle is " . ($motorcycle->getEngineStatus()?'running':'stopped') . PHP_EOL;
$motorcycle->setPrice(5000);
echo "The price is  ". $motorcycle->getPrice() . PHP_EOL;
