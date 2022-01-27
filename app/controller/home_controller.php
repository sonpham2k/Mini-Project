<?php
class homeControl{
        
    public function __construct(){
       
        //Thực thi nút log out
        if (isset($_REQUEST['logoutAction'])) {
            setcookie("logined", false, time()-(60*60*24*30));
            setcookie("user_login", "", time()-(60*60*24*30));
			setcookie("pass_login","", time()-(60*60*24*30));
            header("Location:login.php");  
        }

        //Check login
        if (!isset($_COOKIE['logined'])) {
            header("Location:login.php");
        }
    }
}

$homeControl = new homeControl;

?>