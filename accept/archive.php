<?php

$id = $_REQUEST['id'];

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply'); 
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

$query = "UPDATE `application` SET `status` =  '-1' WHERE  `id` = ".$id." LIMIT 1;";

if($result = $mysqli->query($query)) {
	$output['status'] = "Success";
} else {
	$output['status'] = "Bad";
}

echo json_encode($output);

?>