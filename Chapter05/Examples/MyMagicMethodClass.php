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
/*
outputs,
array(2) {
  [0]=>
  string(14) "object context"
  [1]=>
  string(15) "second argument"
}
array(3) {
  [0]=>
  string(14) "object context"
  [1]=>
  string(15) "second argument"
  [2]=>
  string(14) "third argument"
}
array(1) {
  [0]=>
  string(14) "static context"
} 
*/
