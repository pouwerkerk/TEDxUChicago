<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>UMentor | Official Email - Event Invitation</title>
	<link rel="stylesheet" type="text/css" href="http://umentor.org/themes/gamma/app.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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

<form action="event_draft.php" method="post">
<h4 class="sub-section">Adressee</h3>
<h4>Email Address: <a href="#" class="open">UChicago Directory</a></h4> <script>
    $(".open").click(function () {
    $(".overlay").show("slow");
    });
    </script>
    
<input type="text" class="full-width" name="email" width="100%" />

<h4>Subject:</h4>
<input type="text" class="full-width" name="subject" width="100%" value="UMentor: Info Session on 11/17" />

<h4>Content:</h4>
			<textarea cols="80" id="content" name="content" rows="10">&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href="http://ckeditor.com/"&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
			<script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.
				CKEDITOR.replace( 'content' ).setData( "<h2><b>UChicago Mentorship by Correspondence:<br/>Info Session</b></h2><p><b>Wednesday, November 17: 8:00pm - 9:00pm</b></br>Location: McCormick Tribune Lounge</p><p>Make the difference with just one hour a week! Come and find out how you can empower disadvantaged high school students from the comfort of your couch. If you are interested in high impact, low time commitment service, come join us for lots of free and delicious food from Chipotle and information about the RSO!</p><p>See you there,<br/>The UMentor Team</p>" );

			//]]>
			</script>

<input id="preview" type="submit" value="Preview" />

</form>		
					
				</div>
			<div id="bottom"></div>
		</div>
		<div class="copy">Copyright &copy; <?php echo date(Y); ?> UMentor.org. Coded and Designed by <a href="http://pieterouwerkerk.com/">Pieter Ouwerkerk</a>. All Rights Reserved.</div>
	</div>

</body>

</html>