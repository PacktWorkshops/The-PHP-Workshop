<?php
namespace Student;

class Student
{
	public $name;
	public $title = 'student';

	function __construct(string $name)
	{
		$this->name = $name;
	}
}