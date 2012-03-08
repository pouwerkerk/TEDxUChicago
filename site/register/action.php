<?php

require_once("../email/code.php");

$mysqli = new mysqli('tedxuchicagocom.ipagemysql.com', 'apply_attend', '3W2MuJLh9iem9kh4P6snhjya', 'apply_attend'); 
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

foreach ($_POST as $key=>$value) {
    $input[$key] = $mysqli->real_escape_sring($value);
}

$token = generateCode(10); 

$query = "INSERT INTO  `application` (`first`, `last`, `email`, `q1`, `q2`, `t1`, `t2`, `t3`, `status`, `token`) VALUES (
'".$input['firstName']."', '".$input['lastName']."', '".$input['email']."', '".$input['questionOne']."', '".$input['questionTwo']."', '".$input['firstTopic']."', '".$input['secondTopic']."', '".$input['thirdTopic']."', 0);"

/* Create table doesn't return a resultset */
if ($mysqli->query($query) === TRUE) {
	$result = array("result" => "success", "email" => $input['email']);
} else {
	$result = array("result" => "failure");
}

/* 



Array (
	[firstName] => Pieter
	[lastName] => Ouwerkerk
	[email] => pieter.ouwerkerk@gmail.com
	[questionOne] => Test
	[questionTwo] => TEs
	[firstTopic] => Tst
	[secondTopic] => Test
	[thirdTopic] => Test
)

*/

?>

