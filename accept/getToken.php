<?php

$url = "http://ubazaar.uchicago.edu/tools/api/token.php?key=J16K60YTJU0UKR6&type=2&lim=10";
$variable = file_get_contents($url);
$decoded = json_decode($variable);

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply'); 
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
