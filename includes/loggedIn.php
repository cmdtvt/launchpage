<?php
session_start();
if (isset($_SESSION['username'])) {
	//echo "Logged in as: ".$_SESSION['username'];
}
?>