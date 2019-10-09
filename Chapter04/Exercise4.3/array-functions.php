<?php
$signal = ['red', 'amber', 'green'];

print_r($signal);

$reversed = array_reverse($signal);

print_r($reversed);

print_r($signal);

$reversed = array_reverse($signal, $preserve_keys = true);

$streets = [
'walbrook',
'Moorgate',//Starts with an uppercase
'crosswall',
'lothbury',
];

sort($streets, SORT_STRING | SORT_FLAG_CASE );
print_r($streets);

sort($streets, SORT_STRING & SORT_FLAG_CASE );
print_r($streets);