<?php
$string="Tom=You&Zach=Me";
echo $string;
echo '<br/><br/><br/>';
$array=array();
parse_str($string,$array);
print_r($array);


?>