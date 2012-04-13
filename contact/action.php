<?php

require_once("../email/encryption.php");
require_once("../email/send.php");

function submission() {

sendContact($_POST['email'], $_POST['name'], $_POST['subject'], encrypt($_POST['message'], "3yFCH6Jhdsn1CyafOAz0Q3kXi"));

$result = array("result" => "success"); 

return json_encode($result);
}

echo submission();

?>
