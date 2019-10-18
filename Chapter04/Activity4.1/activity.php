<?php
declare(strict_types=1);

/**
* Calculates the factorial of the input $number.
*
* The factorial is n! where n is the given $number.
* @see https://en.wikipedia.org/wiki/Factorial
*
* @param int $number
* @return float
*/
function factorial(int $number): float
{
    $factorial = $number;
    while ($number > 2) {
        $number--;
        $factorial *= $number;
    }
    return $factorial;
}

/**
* Return the sum of its inputs. Give as many inputs as you like.
*
* @return float
*/
function sum(): float
{
return array_sum(func_get_args());
}

/**
* Determines if the input $number is a prime number.
*
* It only divides the number by 2 up until the square root of the number;
*
* @param int $number
* @return bool
*/
 function prime(int $number): bool
 {
     // everything equal or smaller than 2 is not a prime number
     if (2 >= $number) {
         return false;
     }
     for ($i = 2; $i <= sqrt($number); $i++) {
         if ($number % $i === 0) {
             return false;
         }
     }
     return true;
 }

/**
* @param string $operation
* @return bool|float|mixed
*/
function performOperation(string $operation)
{
switch ($operation) {
case 'factorial':
// get the second parameter, it must be ant int, we will cast
it to int to be sure
$number = (int) func_get_arg(1);
return factorial($number);
case 'sum':
// get all parameters
$params = func_get_args();
// remove the first parameter, because it is the operation
array_shift($params);
return call_user_func_array('sum', $params);
case 'prime':
$number = (int) func_get_arg(1);
return prime($number);
}
}

echo performOperation("factorial", 3) . PHP_EOL;
echo performOperation('sum', 2, 2, 2) . PHP_EOL;
echo (performOperation('prime', 3)) ? "The number you entered was prime."
. PHP_EOL : "The number you entered was not prime." . PHP_EOL;
