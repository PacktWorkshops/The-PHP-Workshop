<?php

$fruits = [
    'Pear',
    'orange', // notice orange is all lowercase
    'Apple',
    'Banana',
];

natcasesort($fruits);

print_r($fruits);
