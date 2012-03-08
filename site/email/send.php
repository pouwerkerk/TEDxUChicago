<?php 

//phpinfo();
	
include("mail_formatter.php");
require_once('class.phpmailer.php');

function sendMessage($email_address, $email_name, $email_subject, $email_content, $bccN = NULL, $bccE = NULL) {
	
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	
	$mail->IsSMTP(); // telling the class to use SMTP
		
	$HTML_content = email_HTML($email_content, $email_name);
	
	try { 
		$mail->Host = "smtp.gmail.com"; // SMTP server
		$mail->SMTPDebug = 1;										 // enables SMTP debug information (for testing)
		$mail->SMTPAuth = true;									// enable SMTP authentication
		$mail->Host = "ssl://smtp.gmail.com"; // sets the SMTP server
		$mail->Port = 465;										// set the SMTP port for the GMAIL server
		
		$mail->Username = "ubazaar.uchicago@gmail.com"; // SMTP account username
		$mail->Password = "yB1Id7pmPnLic1cMXOCQ";				// SMTP account password
		$mail->AddReplyTo('ubazaar.uchicago@gmail.com', 'uBazaar');
		$mail->AddAddress($email_address, $email_name);
		$mail->SetFrom('ubazaar.uchicago@gmail.com', 'uBazaar');
		$mail->AddReplyTo('ubazaar.uchicago@gmail.com', 'uBazaar');
		if($bccE) {
			$mail->AddBCC($bccE, $bccN);
		} 
		$mail->Subject = $email_subject;
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		$mail->MsgHTML($HTML_content);
	//	$mail->AddAttachment('images/phpmailer.gif');		// attachment
	//	$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
		$mail->Send();		
	} catch (phpmailerException $e) {
		$e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
		$e->getMessage(); //Boring error messages from anything else!
	}
		
	return;
}

?>