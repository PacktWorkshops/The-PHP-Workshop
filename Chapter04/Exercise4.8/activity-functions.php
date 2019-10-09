<?php
$directors = [
'steven-spielberg' => [
'ET',
'Raiders of the lost ark',
'Saving Private Ryan'
],
'martin-scorsese' => [
'Ashes and Diamonds',
'The Leopard',
'The River'
],
'kathryn-bigelow' => [
'Detroit',
'Last Days',
'The Hurt Locker'
],
'felix-gary-gray' => [
'Men in Black: International',
'The Fate of the Furious',
'Law Abiding Citizen'
]
];
function processDirectorName($name){
$nameParts = explode('-', $name);
$firstname = ucfirst($nameParts[0]);
$lastname = strtoupper($nameParts[1]);
return "$firstname $lastname";
}

function processMovies($movies)
{
$formattedStrings = [];
for ($i = 0; $i < count($movies); $i++) {
$formattedStrings[] = '"' . strtoupper($movies[$i]) . '"';
}
return implode(",", $formattedStrings);
}

ksort($directors);
foreach ($directors as $key => $value) {
echo processDirectorName($key) . ": ";
echo processMovies($value);
echo PHP_EOL;
}