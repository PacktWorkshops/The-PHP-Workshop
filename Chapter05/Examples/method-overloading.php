<?php

class MyMagicMethodClass 
{


    public function __call($method, $arguments)
    {
        var_dump($arguments);
    }

    public static function __callStatic($method, $arguments)
    {
        var_dump($arguments);
    }

}


$object = new MyMagicMethodClass();
$object->showMagic('object context', 'second argument');
$object->showMagic('object context', 'second argument', 'third argument');
MyMagicMethodClass::showMagic('static context');
