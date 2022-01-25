<?php

class homeControl{
        
    public function __construct(){
       
        if (isset($_REQUEST['logoutAction'])) {
            $_SESSION['loggedin'] = false;
            header("Location:login.php");  
        }

        if (!(isset($_COOKIE['login']) && $_COOKIE['login'] == true)) {
            header("Location:login.php");
        }
    }
}

$homeControl = new homeControl;
require_once 'home.php';

?>