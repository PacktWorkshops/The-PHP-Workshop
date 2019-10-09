<?php
// declare global $count variable
$count = 0;
/**
* This function increments the global
* $count variable each time it is called.
*/
function countMe()
{
$GLOBALS['count']++;
}
// call the function countMe once
countMe();
// and twice
countMe();
// print global $count
echo $count;
// print a newline for clarity
echo PHP_EOL;