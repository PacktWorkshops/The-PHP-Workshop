<?php

function sayHello($name = 'John')
{
    return "Hello $name";
}

echo sayHello() . "\n";
echo sayHello('Anna');
