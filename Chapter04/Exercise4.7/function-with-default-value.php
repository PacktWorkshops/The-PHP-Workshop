<?php

function firstFunction($arg1, $arg2 = '2')
{
    return "The first argument is $arg1 and the second is $arg2";
}

echo firstFunction("sample") . "\n";
echo firstFunction("sample", "test");
