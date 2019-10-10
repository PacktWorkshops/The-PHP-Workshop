<?php
class MyMagicClass 
{
    private $arr = array();
    public function __set($attribute, $value)
    {
        $this->arr[$attribute] = $value;
    }
    public function __get($attribute)
    {
        if (array_key_exists($attribute, $this->arr)) 
        {
            return $this->arr[$attribute];
        } 
        else 
        {
            echo 'Error: undefined attribute.';
        }
    }
}
$object = new MyMagicClass();
$object->dynamicAttribute = 'I am magic';
echo $object->dynamicAttribute . PHP_EOL; //outputs, I am magic
