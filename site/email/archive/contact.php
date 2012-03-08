<?php 

require_once('send.php');

$content = $_REQUEST['content'];
$content = "Testing 1 2 3";

$email_content = encrypt($content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");
sendMessage("pieter.ouwerkerk@gmail.com", "Pieter Ouwerkerk", "Test", $email_content);

?>