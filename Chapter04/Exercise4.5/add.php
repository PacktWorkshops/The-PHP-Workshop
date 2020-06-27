<?php
function add($param1, $param2): string
{
if (false === is_numeric($param1)) {
throw new DomainException('$param1 should be numeric.');
}
if (false === is_numeric($param2)) {
throw new DomainException('$param2 should be numeric.');
}

$sum = $param1 + $param2;

return "The sum of $param1 and $param2 is: $sum";

//return 'The sum of ' . $param1 . ' and ' . $param2 . ' is: ' . $sum;
}

echo add(1, 2);

echo PHP_EOL;
