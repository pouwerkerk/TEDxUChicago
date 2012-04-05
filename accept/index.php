
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>TEDxUChicago: Accept Applications</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<style>
	.verified {color: green;}
	</style>
	<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="application/javascript" src="js/bootstrap.min.js"></script>
	<script>

function ajaxEmail(id, increment) {
	var url = "sendAcceptance.php?id="+id;
	$.getJSON(url, function(data) {
		console.log("Email sent for " + data.id);
		var currentWidth = $(".progress .bar").width();
		var newWidth = currentWidth + increment;
		console.log(newWidth);
		$(".progress .bar").width("+="+newWidth);
	});
}

$(document).ready(function() {
	$(".details").click(function(event) {
		event.preventDefault();
		var id = $(this).parent().parent().attr("id");
		var url = "details.php?id="+id;
		console.log(url);
		$("#preview .modal-body").load(url, function(data) {
			console.log(data);
			$("#preview").modal('show');
		});
	});
	$("#archive").click(function(event) {
		event.preventDefault();
		var id = $("#preview #id").val();
		var url = "archive.php?id="+id;
		$.getJSON(url, function(data) {
			$("#preview").modal('hide');
			if(data.status == "Success") {
				$("tr#"+id).remove();
				$(".alert").removeClass("hide").fadeIn(1000).delay(3000).fadeOut(1000);
			}
  		});
	});
	$("#submit").click(function(event) {
		event.preventDefault();
		$(this).addClass("disabled");
		var array = $("#form").serializeArray();
		var increment = (1 / array.length) * $(".progress").width();
		$.each(array, function() {
			console.log(this.name);
			var url = "getToken.php?id="+this.name;
			$.getJSON(url, function(data) {
				if(data.status == "success") {
					console.log("Token Generated for " + data.id);
					ajaxEmail(data.id, increment);
				}
			});
		});	
	});	
});
	</script>
</head>
<body>
<div class="container">
<h1>TEDxUChicago Applications</h1>
<div class="alert hide alert-success">
  <strong>Removed</strong> This entry was archived and removed!
</div>
<div class="modal hide fade" id="preview">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Application Details</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" id="archive" class="btn btn-danger">Archive</a>
    <a href="#" data-dismiss="modal" class="btn">Close</a>
  </div>
</div>
<?php

function printRow($row) {
	if ($row['status'] == 1) {
		$emailClass = " verified";
		// $checked = " checked";
	}
	$output = "<tr id=\"".$row['id']."\">
		<td class=\"date\">".date("n/j/y \a\\t g:ia", strtotime($row['timestamp']))."</td>
		<td class=\"name\">".$row['first']." ".$row['last']."</td>
		<td class=\"email".$emailClass."\">".$row['email']."</td>
		<td class=\"action\"><a class=\"details\" href=\"#\">Details</a><input".$checked." type=\"checkbox\" name=\"".$row['id']."\" /></td>
	</tr>\n\t";
	return $output;
}

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply'); 
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

$query = "SELECT `id`, `timestamp`, `first`, `last`, `email`, `status` FROM `application`  WHERE (`status` < 5 && `status` >= 0) LIMIT 0, 30;";

/* Create table doesn't return a resultset */
$result = $mysqli->query($query);
if ($result->num_rows == 0) { 
	echo "There are no applications awaiting your approval!";
} else {
	$output = "<form action='#' id=\"form\"><table class=\"span10 offset1 table table-striped table-bordered table-condensed\">
	<thead>
    <tr>
      <th>Date</th>
      <th>Name</th>
      <th>Email Address</th>
      <th>Actions</th>
    </tr>
  </thead>";
	while ($row = $result->fetch_assoc()) {
		$output .= printRow($row);
	}
	$output .= "</table>
<div class=\"span10 offset1 progress progress-success progress-striped active\">
  <div class=\"bar\" style=\"width: 0%;\"></div>
</div>
	<div class=\"row span12 controllers\">
		<button id=\"reset\" class=\"btn btn-large\">Reset</button>
		<button id=\"submit\" type=\"submit\" class=\"btn btn-primary btn-large\">Accept</button>
	</div>
	</form>";
}

echo $output;

?>
</div>
</body>
</html>