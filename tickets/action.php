<?php

require_once("../email/code.php");
require_once("../email/encryption.php");
require_once("../email/send.php");

function applyMessage($token, $input) {
	$content = "<p>Thank you, you've successfully created a badge with the following three topics:</p>
				<ol>
					<li>".$input['firstTopic']."</li>
					<li>".$input['secondTopic']."</li>
					<li>".$input['thirdTopic']."</li>										
				</ol>
				<p>Secure your place at TEDxUChicago 2012 at http://ubazaar.uchicago.edu, before they sell out.</p>
				<p>&mdash;The TEDxUChicago Team</p>";

	return $content = encrypt($content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");
}

function submission() {

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply');
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

foreach ($_POST as $key=>$value) {
    $input[$key] = $mysqli->real_escape_string($value);
}

$token = generateCode(10);

$query = "INSERT INTO  `application` (`first`, `last`, `email`, `t1`, `t2`, `t3`, `token`) VALUES (
'".$input['firstName']."', '".$input['lastName']."', '".$input['email']."', '".$input['firstTopic']."', '".$input['secondTopic']."', '".$input['thirdTopic']."', '".$token."');";

/* Create table doesn't return a resultset */
if ($mysqli->query($query) === TRUE) {
	$result = array("result" => "success", "email" => $input['email']);
} else {
	$result = array("result" => "failure");
}

$email_content = applyMessage($token, $input);

sendMessage($input['email'], $input['firstName']." ".$input['lastName'], "Tickets to TEDxUChicago 2012", $email_content);

return json_encode($result);
}

echo submission();

?>
