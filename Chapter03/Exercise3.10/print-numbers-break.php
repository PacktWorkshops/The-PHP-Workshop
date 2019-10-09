<?php

$number = 1;

while ($number <= 10) {
        echo $number . " ";
        if ($number===8) {
                echo "ends the execution of loop.";
                break;
        }
        $number++;
}

