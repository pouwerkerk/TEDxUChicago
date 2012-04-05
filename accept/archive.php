<?php

$id = $_REQUEST['id'];

$mysqli = new mysqli('tedxuchicagocom.ipagemysql.com', 'apply_attend', '3W2MuJLh9iem9kh4P6snhjya', 'apply_attend'); 
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