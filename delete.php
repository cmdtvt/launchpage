<?php
    require_once 'includes/db.php';


    //Delete link by given id.
    session_start();
    if (isset($_GET['id']) && isset($_SESSION['id'])) {
        $id = $_GET['id'];
        $owner = $_SESSION['id']; //This is a security thing. deleteLink requires also user ID so anyone can't just delete anyone's links.
        
        $dao_obj->deleteLink($owner,$id);
    }
    
    header("Location: index.php");
?>
