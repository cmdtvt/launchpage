<?php
    require_once 'includes/db.php';
    session_start();
    if (isset($_GET['id']) && isset($_SESSION['username'])) {
        $id = $_GET['id'];
        echo $id;
        $dao_obj->deleteLink($id);
    }
    
    header("Location: index.php");
?>