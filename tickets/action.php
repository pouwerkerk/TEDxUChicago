<?php

require_once("../email/code.php");
require_once("../email/encryption.php");
require_once("../email/send.php");

function applyMessage($token) {
	$content = "<p><h2 style=\"text-align: center\">Thank you for applying!</h2> Our team looks forward to reviewing your application and we will email you within five (5) days to inform you of your status. At that time, you will receive a link to purchase your ticket.</p><div style=\"background:#fe7; padding:5px; border:1px solid #333;\"><b>To speed things up:</b><br/><h3 style=\"text-align: center;\"><a href=\"http://tedxuchicago.com/email/confirm.php?token=".$token."\">Please confirm your email address</a>.</h3></div><p>-The TEDxUChicago 2012 Team</p>";

	return $content = encrypt($content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");
}

function submission() {

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply');
// $mysqli = new mysqli('tedxuchicagocom.ipagemysql.com', 'apply_attend', '3W2MuJLh9iem9kh4P6snhjya', 'apply_attend'); 
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

foreach ($_POST as $key=>$value) {
    $input[$key] = $mysqli->real_escape_string($value);
}

$token = generateCode(10);

$query = "INSERT INTO  `application` (`first`, `last`, `email`, `q1`, `q2`, `t1`, `t2`, `t3`, `token`) VALUES (
'".$input['firstName']."', '".$input['lastName']."', '".$input['email']."', '".$input['questionOne']."', '".$input['questionTwo']."', '".$input['firstTopic']."', '".$input['secondTopic']."', '".$input['thirdTopic']."', '".$token."');";

/* Create table doesn't return a resultset */
if ($mysqli->query($query) === TRUE) {
	$result = array("result" => "success", "email" => $input['email']);
} else {
	$result = array("result" => "failure");
}

$email_content = applyMessage($token);

sendMessage($input['email'], $input['firstName']." ".$input['lastName'], "Application Confirmation to TEDxUChicago 2012", $email_content);

return json_encode($result);
}

echo submission();

?>
