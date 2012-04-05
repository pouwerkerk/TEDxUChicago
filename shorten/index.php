<?php ?>
<!DOCTYPE html>
<head>
	<title>TEDxUChicago | URL shortener</title>
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="header">
	<a class="logo" title="TEDxUChicago" alt="TEDxUChicago" href="http://tedxuchicago.com/">TEDxUChicago</a>
</div>
<div class="form">
	<form method="post" action="shorten.php" id="shortener">
		<p class="label">URL:</p>
		<input type="text" name="longurl" id="longurl"><br/>
		<div class="submit"><input type="submit" value="Shorten"></div>
	</form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
	$('#shortener').submit(function () {
		$.ajax({data: {longurl: $('#longurl').val()}, url: 'shorten.php', complete: function (XMLHttpRequest, textStatus) {
			$('#longurl').val(XMLHttpRequest.responseText);
		}});
		return false;
	});
});
</script>
</body>
</html>
