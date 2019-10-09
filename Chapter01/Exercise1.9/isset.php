<?php
$name1 = '';
$name2 = null;
echo 'checking $name1 : ';
var_dump(isset($name1));
echo '<br>';
echo 'checking $name2: ';
var_dump(isset($name2));
echo '<br>';
echo 'checking undeclared variable $name3: ';
echo var_dump(isset($name3));
?>