<?php
namespace MyNamespaceA;

const MYCONST = 'constant';
function myFunction() 
{
    echo 'from namespace A';
}
class MyClass
{
    public function hello(){
        echo 'hello ';
    }
}

namespace MyNamespaceB;

use MyNamespaceA\MyClass as A; //imports the class name
$object = new A();//instantiates the object of class MyNamespaceA\MyClass
$object->hello();

use function MyNamespaceA\myFunction;//importing a function
myFunction();//calls MyNamespaceA\myFunction
