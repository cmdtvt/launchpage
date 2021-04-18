<?php
include_once('includes/db.php');
header("Content-Type:application/json");
//This file is for requesting stuff from the database. Data should be returned in JSON format.

$key = "supersecretkey"; //Secret key for this API. (This might not be needed right now but implementing it anyway future in mind.).
$validkey = false;


//Check that user provided key and it matches the $key variable.
//If not kill the php script.
if (isset($_GET['key'])) {
	if ($_GET['key'] == $key) {
		$validkey = true;
	}
}

if ($validkey == false) {
	echo "Access denied. Invalid api key.";
	die();
}


if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'getLinks';
			print_r( $dao_obj->geLinks($_GET['id']));
			break;
		
		default:
			# code...
			break;
	}
} else {
	echo "Connected but no action defined.";
}


?>