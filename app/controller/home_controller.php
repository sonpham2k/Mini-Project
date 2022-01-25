<?php
class homeControl{
        
    public function __construct(){
       
        //Thực thi nút log out
        if (isset($_REQUEST['logoutAction'])) {
            setcookie("login", false, time()+(60*60*24*30));
            header("Location:login.php");  
        }

        //Check login
        if (!(isset($_COOKIE['login']) && $_COOKIE['login'] == true)) {
            header("Location:login.php");
        }
    }
}

$homeControl = new homeControl;

?>