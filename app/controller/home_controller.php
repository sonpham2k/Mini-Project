<?php

class homeControl{
        
    public function __construct(){
        $_SESSION['demo']="123";
        if (isset($_REQUEST['logoutAction'])) {
            // $_SESSION['loggedin'] = false;
            // header("Location:login.php");
            // $_SESSION['demo']="123";
        }

        // if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        //     header("Location:login.php");
        // }
    }
}

$homeControl = new homeControl;
// require_once '../../home.php';

?>