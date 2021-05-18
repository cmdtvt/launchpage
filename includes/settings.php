<?php
    //This is the setting file. Change these to connect to the database and switch to debug mode.
    
    $db_name = "launchpage";        //Database name
    $db_user = "cmdtvt";            //Database username
    $db_password = "allhailcmdtvt"; //Database password

    $settings = array();                 //This array contains all "extra" settings.
    $settings['cookieLogin'] = true;     //Allow login with cookie stored in browser
    $settings['debug'] = false;          //Show some additional info when true
    
    

    //If debug is set = true show debug is on message and var_dump all settings on the page.
    if ($settings['debug']) { 
        echo '<p style="color:red;">Debugging enabled in settings.php!</p>';    
        var_dump($settings);
    }
?>
