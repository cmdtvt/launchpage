<?php
	//Clear session data.
    session_start();
    session_destroy();

    //Destroy the re-login cookie from users browser.
    unset($_COOKIE['auth']);
    setcookie('auth',null,-1);

    //Go back to frontpage.
    header("Location: index.php");
?>