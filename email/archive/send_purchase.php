<?php

require_once('encryption.php');
require_once('send.php');

if(sendMessage($_REQUEST['email'], $_REQUEST['name'], stripslashes($_REQUEST['subject']), $_REQUEST['body'])) {
	header("location: http://ubazaar.uchicago.edu/tools/cash/result.php?token=".$_REQUEST['token']);
} else {
	header("location: http://ubazaar.uchicago.edu/tools/cash/result.php?token=".$_REQUEST['token']);
}

?>