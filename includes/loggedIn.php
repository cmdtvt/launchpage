<?php
require_once 'db.php';
session_start();
//If user has a cookie try to log user in with it.
if (isset($_COOKIE['auth'])) {
	$auth_info = $dao_obj->checkAuth($_COOKIE['auth']); //Check if cookie can be used to login.
	//If successful set up things needed for user login.
	if ($auth_info) {
		if ($settings['debug']) {echo "You have been logged in with cookie information<br><br>";}
		
		$_SESSION['username'] = $auth_info[1];
		$_SESSION['id'] = $auth_info[0];

		//Update the users login cookie.
		setcookie("auth", $dao_obj->updateSecureString($auth_info[0]), time()+3600);
		
	}
}
?>