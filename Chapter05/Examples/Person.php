<?php
class Person 
{	
	public $name;
	function __construct($username)
	{
		$this->name = $username;
	}
	function getName()
	{
		return $this->name;
	}
	function setName()
	{
		$this->name = 'Jhon Doe';
	}
	function sayGreetings()
	{
		if(date('G') < 12) 
		{
			$greetings = 'Good Morning';
		} 
		elseif(date('G') < 17) 
		{
			$greetings = 'Good Afternoon';
		} 
		else 
		{
			$greetings = 'Good Evening';
		}
		echo "$greetings $this->name! ";
	}

	function __destruct()
	{
		echo 'The object has been removed.';
	}

}

$person1 = new Person('John Doe');
$person2 = new Person('Jen Doe');

echo $person1->name  . PHP_EOL; //prints John Doe
echo $person2->name  . PHP_EOL; //prints Jen Doe
