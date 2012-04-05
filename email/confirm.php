<?php 

function renderPage() {

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply'); 
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

if(isset($_GET['token'])) {

$token = $mysqli->real_escape_string($_GET['token']);

$query = "SELECT `id`, `status` FROM  `application` WHERE `token` = '".$token."' LIMIT 1;";
$result = $mysqli->query($query);
if ($result->num_rows == 1) {
	$application = $result->fetch_assoc();
	if ($application['status'] == 1) {
		return "Thanks again, this email address has already been confirmed.";
	} else {
		$update = "UPDATE `application` SET `status` = '1' WHERE `id` = ".$application['id']." LIMIT 1 ;";
		$mysqli->query($update);
		return "Thank you for confirming your email address.";
	}
}

}

return "Sorry, there was an error processing your request. Please try again. <p>If this problem persists, don't hesitate to email us: <a href=\"mailto:info@tedxuchicago.com\">info@tedxuchicago.com</a>.</p>";

}

?>
<!-- TODO:
	- Change team to actual picture of team. -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>TEDxUChicago</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css" />	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<div id="wrapper-bg">
<div id="home">
<div id="divider"></div>
    <div id="wrapper" class="row-fluid">
<div id="menu-wrapper">
<div id="menu">
	<ul class="nav">
		<li><a href="/#home" class="logo">TEDxUChicago</a></li>
	    <li><a href="/#speakers" class="speakers">Speakers</a></li>
    	<li><a href="/#event" class="event">Event Details</a></li>
	    <li><a href="/#about" class="about">About</a></li>
    </ul>
</div>
</div>
        <!-- Begin Hero -->	
    	<div id="header" class="row">
    		<a href="/" id="logo"><h1>TEDxUChicago</h1></a>
		</div>
		<div class="divider"></div>		
		<div id="page" class="contact">
		
		<h2>Confirm Email Address:</h2>
		<? echo renderPage(); ?>
		</div>
		</div>
    <div id="footer-pattern">
	    <footer>
	    <h3>Navigation</h3>
	<ul class="links">
		<li><a href="#" class="logo">TEDxUChicago</a></li>
	    <li><a href="#" class="speakers">Speakers</a></li>
    	<li><a href="#" class="event">Event Details</a></li>
	    <li><a href="#" class="about">About</a></li>
    </ul>
	<ul class="sosumi">
		<li>&copy; 2012 TEDxUChicago. All rights reserved.</li>
		<li class="unimportant">This independent TEDx event is operated under license from TED.</li>
		<li class="unimportant">Designed by <a href="http://pieterouwerkerk.com/">Pieter Ouwerkerk</a>, Danny Henn and Saltanat Muslim-Ali.</li>
	</ul>
		</footer>	
	</div>
</div>

</div>

</body>
</html>