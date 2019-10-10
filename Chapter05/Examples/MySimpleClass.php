<?php
class MySimpleClass
{
	public $publicMember = 'Public Memeber';
	protected $protectedMember = 'Protected Member';
	private $privateMember = 'Private Member';

	public function myPublicFunction()
	{
		//function body
	}

	protected function myProtectedFunction()
	{
		//function body
	}

	private function myPrivateFunction()
	{
		//function body
	}
}

$object = new MySimpleClass();
$object->protectedMember;//fatal error