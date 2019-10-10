<?php

class A {
    public function say() {
        echo 'Base ';
    }
}

trait T  {
    public function say() {
        parent::say();
        echo 'Trait ';
    }
}

class MyClass extends A{
    use T;

    public function say() {
    	echo 'overrriden ';
    }
}

$object = new MyClass();
$object->say();
