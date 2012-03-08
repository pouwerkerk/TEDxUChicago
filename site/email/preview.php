<?php

require_once("mail_formatter.php");
require_once("encryption.php");
require_once("code.php");

$token = generateCode(10);

$link = "http://tedxuchicago.com/email/confirm.php?token=".$token;

$content = "<p><h2 style=\"text-align: center\">Thank you for applying!</h2> Our team looks forward to reviewing your application and we will email you within five (5) days to inform you of your status. At that time, you will receive a link to purchase your ticket.</p><div style=\"background:#fe7; padding:5px; border:1px solid #333;\"><b>To speed things up:</b><br/><h3 style=\"text-align: center;\"><a href=\"".$link."\">Please confirm your email address</a>.</h3></div><p>-The TEDxUChicago 2012 Team</p>";

$content = encrypt($content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");

echo email_formatter($content, "Pieter Ouwerkerk");

?>