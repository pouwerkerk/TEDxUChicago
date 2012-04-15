<?php

require_once("../email/code.php");
require_once("../email/encryption.php");
require_once("../email/send.php");

function acceptMessage($token) {

	$content = "<h2>CONGRATULATIONS!</h2>
<p>We are excited to inform you that you have been accepted to join our TEDx event. Buy your ticket as soon as possible to ensure that you do not miss out on the opportunity to attend TEDxUChicago 2012: Revolutions!</p>

<div style=\"padding:5px; border:1px solid #333;\">
	<h3><a href=\"http://ubazaar.uchicago.edu/seller/tedxuchicago/?token=".$token."\">Please click here to purchase your ticket</a>.</h3>
	<p>Please note that tickets can only be purchased through this link.</p>
</div>

<p>We look forward to having you join us on April 29th.</p>
<p>
	Sincerely,<br/>
	The TEDxUChicago Team
</p>";

	$content = encrypt($content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");
	return $content;
}

function accept() {

$output = array("result" => "failure");

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply'); 
if ($mysqli->connect_errno) {
 	return $output;
}

$query = "SELECT * FROM `application` WHERE `id` = ".$_REQUEST['id']." LIMIT 1;";

if ($result = $mysqli->query($query)) {
	$row = $result->fetch_assoc();
	if ($row['status'] == 4) {
		$email_content = acceptMessage($row['ubazaar']);
		sendMessage($row['email'], $row['first']." ".$row['last'], "Your Invititation to TEDxUChicago 2012", $email_content);
	} else {
		return $output;
	}
} else {
	return $output;
}

$query = "UPDATE `application` SET `status` = 5 WHERE  `id` = ".$_REQUEST['id']." LIMIT 1;";
if ($mysqli->query($query)) {
	$output = array("status" => "success", "id" => $_REQUEST['id']);
} else {
	return $output;
}

return json_encode($output);
}

echo accept();

?>