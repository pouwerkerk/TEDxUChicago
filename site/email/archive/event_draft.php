
<?php

/*
Variables:
	$content (string): The text (HTML supported) contained in the body of the email.
	$date (bool): If true, show the date at the top of the email.
	$log_in (bool): If true, provide a link to log in to UMentor. Should be disabled for bulk mailings to non-members (recruitment, etc.).
	$action_type (string): The full-width button at the bottom of the message, supported types are "log-in", "learn-more", "none", and "custom".
	$action_text (string): If "custom" is provided as the previous argument, the text the button should have. NULL if not "custom".
	$action_url (string): If "custom" is provided as $action-type, the URL for the button.  NULL if not "custom".
*/

require_once('encryption.php');
require_once('event_mail.php');

$email_address = $_POST["email"];
$email_name = $_POST["fname"];
$email_subject = $_POST["subject"];
$email_content = $_POST["content"];

$email_greeting = $_POST["greeting"];

$email_date = $_POST["date"];
$email_log_in = $_POST["log-in"];
$email_action = $_POST["action-button"];
$email_action_url = $_POST["custom-button-url"];
$email_action_title = $_POST["custom-button"];

$today_date = date("l, F j, Y");

$content = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>UMentor | Official Email Preview</title>
<link rel="stylesheet" type="text/css" href="http://umentor.org/themes/gamma/preview.css" />
<script TYPE="text/javascript" SRC="backlink.js"></script>
</head>

<body style="padding:0;">';


$content .= '<div class="email-header"><div class="email-metadata">';

$content .= '<span style="font-weight: bold; color:#888888; width: 60px; margin-right: 5px; display: inline-block; text-align:right;">From:</span> UMentor.org &lt;mail-noreply@umentor.org&gt;<br />
	<span style="font-weight: bold; color:#888888; width: 60px; margin-right: 5px; display: inline-block; text-align:right;">Subject:</span> <b>'.$email_subject.'</b><br />
	<span style="font-weight: bold; color:#888888; width: 60px; margin-right: 5px; display: inline-block; text-align:right;">Date:</span> ' .$today_date. '<br />
	<span style="font-weight: bold; color:#888888; width: 60px; margin-right: 5px; display: inline-block; text-align:right;">To:</span> ' .$email_address. '&lt;' .$email_address. '&gt;';
	
$content .= '</div></div>';

$email_content = encrypt($email_content, "3yFCH6Jhdsn1CyafOAz0Q3kXi");

 $content .= email_formatter($email_content, $email_name, $email_greeting, $email_date, $email_log_in, $email_action, $email_action_url, $email_action_title);

 $content .= ' 
 <form method="post" action="event_publish.php">
<input type="hidden" name="sent_email" value="'.$email_address.'">
<input type="hidden" name="sent_name" value="'.$email_address.'">
<input type="hidden" name="sent_subject" value="'.$email_subject.'">
<input type="hidden" name="sent_content" value="'.$email_content.'">
<input type="hidden" name="sent_greeting" value="'.$email_greeting.'">
<input type="hidden" name="sent_date" value="'.$email_date.'">
<input type="hidden" name="sent_log_in" value="'.$email_log_in.'">
<input type="hidden" name="sent_action_button" value="'.$email_action.'">
<input type="hidden" name="sent_custom_button_url" value="'.$email_action_url.'">
<input type="hidden" name="sent_custom_button" value="'.$email_action_title.'">
	<div class="footer"><div class="send-edit"><input id="bottom-button" class="send" type="submit" value="Send" />
	<SCRIPT TYPE="text/javascript">
		var gb = new backlink();
		gb.type = "button";
		gb.write();
	</SCRIPT>
	</div></div>
	<input id="top-button" class="send" type="submit" value="Send" />
</form>';

$content .= '<div class="spacing">Spacing</div></body>
</html>';

echo $content;

?>
