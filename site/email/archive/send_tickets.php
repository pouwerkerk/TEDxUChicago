<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('encryption.php');
require_once('send.php');

function email($email, $name, $subject, $body) {
	$email_content = encrypt($body, "3yFCH6Jhdsn1CyafOAz0Q3kXi");

	//sendMessage("pieter.ouwerkerk@gmail.com", "Pieter Ouwerkerk", "Test", "Test")

	sendMessage($email, $name, "Contact Us: ".$subject, $email_content);

    return;
}

email("pieter.ouwerkerk@gmail.com", "Pieter Ouwerkerk", "Test Message", "Sample content");

?>