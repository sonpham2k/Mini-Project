<?php

class homeControl{
        
    public function __construct(){

        // require_once 'app/model/logins.php';

        if (isset($_REQUEST['logoutAction'])) {
            $_SESSION['loggedin'] = false;
            header("Location:login.php");

        }
    }
}

$homeControl = new homeControl;
require_once '../../home.php';

?>