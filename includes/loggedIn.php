<?php
require_once 'db.php';
session_start();
if (isset($_COOKIE['auth'])) {
	$dao_obj->checkAuth($_COOKIE['auth']);
}
?>