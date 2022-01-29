<?php
session_start();
require (dirname(dirname(__FILE__)). '/model/logins.php');
class homeControl{
        
    public function __construct(){
        
        //Thực thi nút log out
        if (isset($_REQUEST['logoutAction'])) {
            setcookie("user_login", '', time()-(60*60*24*30));
			setcookie("pass_login", '', time()-(60*60*24*30));
            unset($_SESSION['logined']);
            header("Location:login.php");  
        }

        //Check login
        if (!isset($_SESSION['logined'])) {
                header("Location:login.php");
        } 
    }
}

$homeControl = new homeControl;

?>