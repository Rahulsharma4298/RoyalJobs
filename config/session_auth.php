<?php
    
    if(!isset($_SESSION["email"])) {
        redirect("login.php", "You must login first!", "error");
        exit();
    }
?>