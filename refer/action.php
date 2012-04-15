<?php

require_once("../email/code.php");
require_once("../email/encryption.php");
require_once("../email/send.php");

// INSERT INTO `tedxuchi_refer`.`referral` (`id`, `timestamp`, `name`, `email`, `code`) VALUES (NULL, CURRENT_TIMESTAMP, 'Pieter', 'pco@uchicago.edu', '1234');

// If email exists in database, just give the code.
// If email doesn't exist, add code, name and email to database and send message.

function codeMessage($code) {

	$content = "<p>Thanks for spreading the word about TEDxUChicago! You can send people directly to uBazaar through this link: <a href=\"http://ubazaar.uchicago.edu/seller/tedxuchicago/?ref=".$code."\">http://ubazaar.uchicago.edu/seller/tedxuchicago/?ref=".$code."</a>.</p>
	<p>Make sure to send this link so you get credit for each person you refer!</p>
	<p>Thanks again for your support!<br/>
		The TEDxUChicago Team
	</p>";

	$content = encrypt($content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");
	return $content;
}

function codeRetrieve() {

	$output = array("result" => "failure");

	$mysqli = new mysqli('localhost', 'tedxuchi_refer', '*pg4zd4je6ATDh69+d2r', 'tedxuchi_refer'); 
	if ($mysqli->connect_errno) {
		return "Error: Unable to connect to database.";
	}

	$email = $mysqli->real_escape_string($_REQUEST['email']);
	$name = $mysqli->real_escape_string($_REQUEST['name']);
	
	$query = "SELECT * FROM `referral` WHERE `email` = \"".$email."\" LIMIT 1;";
	$result = $mysqli->query($query);

	if ($result->num_rows) {
		$row = $result->fetch_assoc();
		$output['result'] = 'success';
		$output['code'] = $row['code'];
	} else {
		$code = generateCode(5);
		if ((isset($_REQUEST['name']) && $_REQUEST['name'] != "") && (isset($_REQUEST['email']) && $_REQUEST['email'] != "")) {
			$email_content = codeMessage($code);
			sendMessage($email, $name, "TEDxUChicago - Referral Link", $email_content);
			$query = "INSERT INTO `referral` (`name`, `email`, `code`) VALUES ('".$name."', '".$email."', '".$code."');";
			if ($mysqli->query($query)) {
				$output['result'] = 'success';
				$output['code'] = $code;	
			}
			else {
				$output['result'] = 'failure';
				$output['error'] = "Unable to insert/update database";
			}
		} else {
			$output['result'] = 'failure';
			$output['error'] = "Incomplete form";
		}
	}

	return json_encode($output);
}

echo codeRetrieve();

?>