<html>
<head>
<title>UMentor | Official Email Send</title>
</head>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Mentor Application</title>
	<link rel="stylesheet" type="text/css" href="http://umentor.org/themes/gamma/app.css" />
</head>
<body>

	<div class="wrapper">
		<div class="header">

			<div class="umentor"><a href="http://www.umentor.org">UMentor</a></div>
			<div class="official-email"><h2>Official Email</h2></div> 
		</div>
		<div class="page">
			<div id="top"></div>
				<div class="content">
					<p style="text-align: center;"><img src="http://umentor.org/themes/gamma/images/email/envelope.png" height="198" width="306" /></p>
					<p>
					<div class="console" style="display:none; text-align: center;">
<?php 

include("event_mail.php");
require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

$email_address = $_POST["sent_email"];
$email_name = $_POST["sent_name"];
$email_subject = $_POST["sent_subject"];
$email_content = $_POST["sent_content"];

$email_greeting = $_POST["sent_greeting"];

$email_date = $_POST["sent_date"];
$email_log_in = $_POST["sent_log_in"];
$email_action = $_POST["sent_action_button"];
$email_action_url = $_POST["sent_custom_button_url"];
$email_action_title = $_POST["sent_custom_button"];

$HTML_content = email_HTML($email_content, $email_name, $email_greeting, $email_date, $email_log_in, $email_action, $email_action_title, $email_action_url);

try {
  $mail->Host       = "mail.umentor.org"; // SMTP server
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.umentor.org"; // sets the SMTP server
  $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "mail-noreply@umentor.org"; // SMTP account username
  $mail->Password   = "i;1??F'gls0B7z90m/zj";        // SMTP account password
  $mail->AddReplyTo('mail-noreply@umentor.org', 'UMentor.org');
  $mail->AddAddress($email_name, $email_name);
  $mail->SetFrom('mail-noreply@umentor.org', 'UMentor');
  $mail->AddReplyTo('mail-noreply@umentor.org', 'UMentor');
  $mail->Subject = $email_subject;
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($HTML_content);
//  $mail->AddAttachment('images/phpmailer.gif');      // attachment
//  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "</div>Your message has been sent.</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

?>
</p>
				</div>
			<div id="bottom"></div>
		</div>
		<div class="copy">Copyright &copy; 2010 UMentor.org. Designed by <a href="http://pieterouwerkerk.com" title="PieterOuwerkerk.com">Pieter Ouwerkerk</a>.</div>
	</div>

</body>

</html>