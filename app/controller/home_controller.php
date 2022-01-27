<?php
session_start();
require (dirname(dirname(__FILE__)). '../model/logins.php');
class homeControl{
        
    public function __construct(){
        
        // $login = new logins;
        //Thực thi nút log out
        if (isset($_REQUEST['logoutAction'])) {
            // $login->deletetoken($_COOKIE['user_login']);
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