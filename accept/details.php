<?php

$id = $_REQUEST['id'];

$mysqli = new mysqli('localhost', 'tedxuchi_apply', '33GT9j9YaTUj8?B)d4hw', 'tedxuchi_apply'); 
if ($mysqli->connect_errno) {
 	$result = array("result" => "failure");
    exit();
}

$query = "SELECT * FROM `application`  WHERE `id` = ".$id." LIMIT 1;";

/* Create table doesn't return a resultset */
$result = $mysqli->query($query);
$result = $result->fetch_assoc();

echo "<h2>".$result['first']." ".$result['last']."</h2>";
echo "<h3>Define Revolution</h3><p>".$result['q1']."</p>";
echo "<h3>Who would you sit next to at TEDxUChicago?</h3><p>".$result['q2']."</p>";
echo "<h3>Talk to me about:</h3>";
echo "<ul><li>".$result['t1']."</li><li>".$result['t2']."</li><li>".$result['t3']."</li></ul>";

switch ($result['status']) {
    case 0:
        $status = "Unverified";
        break;
    case 1:
        $status = "Verified";
        break;
    default:
    	$status = "Unverified";
    	break;
}

echo "<h4>Email status:</h4><p>".$status."</p>";
echo '<input type="hidden" name="id" id="id" value="'.$result['id'].'" />';

?>