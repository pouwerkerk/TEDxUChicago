<?php

$url = "http://ubazaar.uchicago.edu/tools/api/token.php?key=J16K60YTJU0UKR6&type=2&lim=3";
$variable = file_get_contents($url);
$decoded = json_decode($variable);

$mysqli = new mysqli('tedxuchicagocom.ipagemysql.com', 'apply_attend', '3W2MuJLh9iem9kh4P6snhjya', 'apply_attend'); 
if ($mysqli->connect_errno) {
 	$result = array("status" => "failure");
}

$query = "UPDATE `application` SET `status` = 4, `ubazaar` =  '".$decoded->token."' WHERE  `id` = ".$_REQUEST['id']." LIMIT 1;";

/* Create table doesn't return a resultset */
if ($mysqli->query($query) === TRUE) {
	$result = array("status" => "success", "id" => $_REQUEST['id']);
} else {
	$result = array("status" => "failure");
}

echo json_encode($result);

?>