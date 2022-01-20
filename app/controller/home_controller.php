<?php

    //Nút logout    
    if (isset($_POST['logoutAction'])) {
        $_SESSION['loggedin'] = false;
        header("Locaiton:login.php");
    }

?>