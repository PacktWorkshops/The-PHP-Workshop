<?php
$a = 5;
$b = 3;

if($a - $b) {
	if ($a > $b) {
		$difference = $a - $b;
	} else {
		$difference = $b - $a;
	}
	print("The difference is $difference");
} else {
	print("The numbers are equal");
}

