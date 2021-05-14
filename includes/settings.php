<?php
    $db_name = "launchpage";        //Database name
    $db_user = "cmdtvt";            //Database username
    $db_password = "allhailcmdtvt"; //Database password

    $settings = array();
    $settings['cookieLogin'] = true;    //Allow login with cookie stored in browser
    $settings['debug'] = false;          //Show some additional info when true
    
    

    
    if ($settings['debug']) { 
        echo '<p style="color:red;">Debugging enabled in settings.php!</p>';    
        var_dump($settings);
    
    }
?>