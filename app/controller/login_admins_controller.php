<?php 
	
class loginControl(){

	public function __construct(){

		$nameErr = $passwordErr = "";
		$name = $password = "";
		$loginHome = true;


		if(isset($_POST['btn-login'])){

			if(empty($_POST['user_id'])){
				$nameErr = "Hãy nhập tên đăng nhập";
				$loginHome = false;
			} else {
				$name = $_POST['user_id'];
			}

			if (empty($_POST["password"])) {
		        $passwordErr = "Hãy nhập password";
		        $loginHome = false;
		    } else {
		        $password = md5($_POST["password"]);
		    }


		    if ($loginHome) {
		    	require_once '../model/logins.php';
		        if ($login->checkAdmin($name, $password)) {
			        if(isset($_POST['remember'])){
			        	setcookie("user_login", $_POST['user_id'], time()+(60*60*24*30));
			        	setcookie("pass_login", $_POST["password"], time()+(60*60*24*30));
			        } else {
			        	if(isset($_COOKIE['user_login'])){
			        		setcookie("user_login", "");
			        	}
			        	if(isset($_COOKIE['pass_login'])){
			        		setcookie("pass_login", "");
			        	}
			        }
		            header("Location:home.php");
		        } else {
		            $passwordErr =  " Tên đăng nhập hoặc mật khẩu không đúng";
		        }
		    }
		}
	}	
}

$loginControl = new loginControl();
require_once '../../login.php';

?>