<?php include_once 'config/init.php'; ?>

<?php
    // Destroy session
	unset($_SESSION['email']);
	redirect("index.php", "Logout Successfull!", "success");
	session_destroy();
    /*if(session_destroy()) {
        // Redirecting To Home Page
        redirect("index.php", "Logout Successfull!", "success");
    }*/
?>