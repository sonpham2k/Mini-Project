<?php
	
	session_start();

    //Check login
    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header("Location:login.php");
    }

    //Nút logout    
    if (isset($_POST['logoutAction'])) {
        $_SESSION['loggedin'] = false;
        $_SESSION['name'] = '';
        header("Locaiton:login.php");
    }

?>