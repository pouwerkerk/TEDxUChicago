<?php

require_once("encryption.php");
require_once("send.php");

$content = encrypt("Test", "3yFCH6Jhdsn1CyafOAz0Q3kXi");

sendMessage("pieter.ouwerkerk@gmail.com", "Pieter Ouwerkerk", "Test", $content);

?>