<?php

class MyMagicClass 
{

    private $arr = array('dynamicAttribute' => NULL,'anotherAttribute' => NULL);


    public function __set($attribute, $value)
    {
        if (array_key_exists($attribute, $this->arr)) {
        	$this->arr[$attribute] = $value;
	    } else {
        	echo 'Error: the attribute is not allowed. ';
        }
    }

    public function __get($attribute)
    {
        if (array_key_exists($attribute, $this->arr)) {
            return $this->arr[$attribute];
        } else {
        	echo 'Error: undefined attribute. ';
        }
    }

}


$object = new MyMagicClass();
$object->dynamicAttribute = 'I am magic';
echo $object->dynamicAttribute . PHP_EOL;

$object->testAttribute = 'test'; //outputs, Error: the attribute is not allowed. 
echo $object->testAttribute  . PHP_EOL; //outputs, Error: undefined attribute. 
