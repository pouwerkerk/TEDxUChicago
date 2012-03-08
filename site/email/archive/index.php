<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>UMentor | Official Email</title>
	<link rel="stylesheet" type="text/css" href="http://umentor.org/themes/gamma/app.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jqDnR.js"></script>
</head>
<body>
<script type="text/javascript">
$().ready(function() {
	$('#resize').jqResize('.stretch');
});
</script>
<div id="resize" class="overlay" style="display: none">
  <a class="close" title="Close" href="#" alt="Close">Close</a>

<script>
    $(".close").click(function () {
      $(".overlay").hide("slow");
    });    
</script>

	<form method="post" id="searchpeople" target="results" class="awesome" action="http://directory.uchicago.edu">
                <div>
                    <div class="name"><input type="text" name="first" value="First" id="first">
                    <input type="text" name="last" value="Last" id="last"></div>
                    <input type="submit" id="search" value="Search" name="commit">
                </div>
              </form>
	<iframe class="results" name="results" width="500" height="500"></iframe>
	<div class="jqHandle stretch"></div>
</div>
	<div class="wrapper">
		<div class="header">

			<div class="umentor"><a href="http://www.umentor.org">UMentor</a></div>
			<div class="official-email"><h2>Official Email</h2></div> 
		</div>
		<div class="page">
			<div id="top"></div>
				<div class="content">
					<p>Below is the form to send officail emails on UMentor's behalf.</p>

<form action="email_preview.php" method="post">
<h4 class="sub-section">Adressee</h3>
<h4>Name:</h4>
<input type="text" class="full-width" name="fname" width="100%" />

<h4>Email Address: <a href="#" class="open">UChicago Directory</a></h4> <script>
    $(".open").click(function () {
    $(".overlay").show("slow");
    });
    </script>
    
<input type="text" class="full-width" name="email" width="100%" />

<h4>Subject:</h4>
<input type="text" class="full-width" name="subject" width="100%" />

<h4>Content:</h4>
<textarea cols="80" id="content" name="content" rows="10"></textarea>

<h4 class="sub-section">Settings</h4>
<h4>Log-In Button:</h4>
<input type="checkbox" class="box" id="checkbox-log-in" name="log-in" /><label for="checkbox-log-in" class="clarification"> Include a log in button at the top of the message, intended for emails to mentors.</label>
<h4>Date:</h4>
<input type="checkbox" class="box" id="date" name="date" /><label for="date" class="clarification" checked> Include the date at the top right of the message.</label>

<h4>Greeting:</h4>
<input type="checkbox" class="box" id="checkbox-greeting" name="greeting" checked/><label for="checkbox-greeting" class="clarification"> Address the recipient by their name.</label>

<h4 class="sub-section">Action Button</h4>
<p>Add a button that spans the width at the bottom of the email. This can be used to encourage recipients to learn more on UMentor's website or log into UMentor.org.</p>
<ul class="action-type">
<li><input type="radio" class="radial" name="action-button" id="log-in" value="log-in" /><label for="log-in"> Log In</label></li>
<li><input type="radio" class="radial" name="action-button" id="learn-more" value="learn-more" /><label for="learn-more"> Learn More</label></li>
<li><input type="radio" class="radial" value="custom" id="action-button" name="action-button" /><label for="action-button"> Custom</label>
	<ul class="custom">
		<li>Text: <input type="text" name="custom-button" /></li>
		<li>Link: <input type="text" name="custom-button-url" /></li>
	</ul>
</li>
<li><input type="radio" class="radial" name="action-button" value="none" id="no-button" /><label for="no-button"> No button</label></li>
</ul>
<input id="preview" type="submit" value="Preview" />

</form>		
					
				</div>
			<div id="bottom"></div>
		</div>
		<div class="copy">Copyright &copy; <?php echo date(Y); ?> UMentor.org. Coded and Designed by <a href="http://pieterouwerkerk.com/">Pieter Ouwerkerk</a>. All Rights Reserved.</div>
	</div>

</body>

</html>