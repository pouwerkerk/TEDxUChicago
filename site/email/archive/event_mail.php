
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

function email_HTML($body, $name, $greeting, $date, $log_in, $action_type, $action_text, $action_url)
{
	$output = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Email</title>
</head>

<body style="padding:0;">';
	$output .= email_formatter($body, $name, $greeting, $date, $log_in, $action_type, $action_text, $action_url);
	
	$output .= "
</body>
</html>";
 return $output;
}

function email_formatter($body, $name, $greeting, $date, $log_in, $action_type, $action_text, $action_url)
{

$today_date = date("l, F j, Y");

$content = '
<div id="email" style="width:640px; margin:10px auto">
<div id="top">
  <div><img src="http://umentor.org/themes/gamma/images/email/tl.png" height="10" width="10" style="float:left"/></div>
  <div id="middle" style="background-color: #b3d197; border-top: 1px solid #88ad59; float: left; display:block; height:9px; width:620px"></div>
  <div><img src="http://umentor.org/themes/gamma/images/email/tr.png" height="10" width="10" style="float:left"/></div>
  <div style="display:block; height:50px; width:638px; background-color: #b3d197; border-left: 1px solid #88ad59; border-right: 1px solid #88ad59;"></div>
</div>

<div id="content" style="border-left: 1px solid #88ad59;  background-color: #b3d197; display:block;  border-right: 1px solid #88ad59; width: 638px;">
  
  <div id="page" style="padding:0 44px">
  	<div id="top-page">
      <div><img src="http://umentor.org/themes/gamma/images/email/ptl.png" height="5" width="5" style="float:left; float:left;""/></div>
	  <div style="display:block; width:540px; height: 4px; background: #fff; float:left; border-top: 1px solid #a4a4a4;"></div>
        <div><img src="http://umentor.org/themes/gamma/images/email/ptr.png" height="5" width="5" style="float:left"/></div>
	  <div style="width:522px; background:#fff; border-left: 1px solid #a4a4a4; border-right: 1px solid #a4a4a4; border-bottom: 1px solid #e6e6e6; padding:16px 13px 11px 13px;">
	  <div><a href="http://umentor.org/" title="UMentor" alt="UMentor"><img src="http://umentor.org/themes/gamma/images/email/umentor.png" title="UMentor" alt="UMentor" height="28" width="120" border="0" /></a>
	<div id="right-links" style="float:right; margin-top: 2px;">
        <a href="http://umentor.org/" title="UMentor.org" alt="UMentor.org"><img src="http://umentor.org/themes/gamma/images/email/umentor-org.png" height="22" width="89" border="0" /></a>';
	    
  $content .= '
	</div></div></div>  
  </div>
  <div class="text" style="background:#fff; padding:0; border-left: 1px solid #a4a4a4; border-right: 1px solid #a4a4a4;"><div class="message-starter">';
    
  $content .= "</div><div style='clear:both; padding-top:1px;'>";
  $content .= '<img src="http://umentor.org/themes/gamma/images/email/calendar.jpg" height="206" width="160" border="0" style="float:left; margin-top:35px;" /><div style="padding: 15px; padding-left: 175px">';

  	$email_body = decrypt($body, "3yFCH6Jhdsn1CyafOAz0Q3kXi");
  	$email_body = stripslashes($email_body);
  	
  $content .= $email_body .'</div></div></div><div id="action">';
  
//  "log-in", "learn-more", "none", and "custom"
  
    $content .= '<a href="http://umentor.org/"><img src="http://umentor.org/themes/gamma/images/email/bottom-learn-more.png" border="0" width="550" height="51"/></a>';
 
 $content .=
  
'</div></div></div>
<div id="bottom">
  <div style="display:block; height:28px; width:638px; background-color: #b3d197; border-left: 1px solid #88ad59; border-right: 1px solid #88ad59; color:#fff; font-size:10px; text-align:center; padding-top:12px">&copy; Copyright 2010 <a href="http://umentor.org/" style="color:#fff; text-decoration:none;">UMentor</a> Inc. All Rights Reserved.</div>
  <div><img src="http://umentor.org/themes/gamma/images/email/bl.png" height="10" width="10" style="float:left"/></div>
  <div id="middle" style="background-color: #b3d197; border-bottom: 1px solid #88ad59; float: left; display:block; height:9px; width:620px"></div>
  <div><img src="http://umentor.org/themes/gamma/images/email/br.png" height="10" width="10" style="float:left"/></div>
</div>
</div>';

 return $content;
 
}

?>