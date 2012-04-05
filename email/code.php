<?php

function generateCode($length) {
	$co = "";
	for ($i=0; $i<$length; $i++) {
		$d=rand(1,30)%2;
		$co .= $d ? chr(rand(65,90)) : chr(rand(48,57));
	};
    return $co;
}

?>