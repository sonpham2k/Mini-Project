<?php 
	
class loginControl{

	public function __construct(){

		$_SESSION['nameErr'] = $_SESSION['passwordErr'] = "";
		$name = $password = "";
		$loginHome = true;


		if(isset($_REQUEST['btn-login'])){

			if(empty($_REQUEST['user_id'])){
				$_SESSION['nameErr'] = "Hãy nhập tên đăng nhập";
				$loginHome = false;
			} else {
				$name = $_REQUEST['user_id'];
			}

			if (empty($_REQUEST["password"])) {
		        $_SESSION['passwordErr'] = "Hãy nhập password";
		        $loginHome = false;
		    } else {
		        $password = md5($_REQUEST["password"]);
		    }


		    if ($loginHome) {
		    	require_once '../model/logins.php';
		        if ($login->checkAdmin($name, $password)) {
			        if(isset($_REQUEST['remember'])){
			        	setcookie("user_login", $_REQUEST['user_id'], time()+(60*60*24*30));
			        	setcookie("pass_login", $_REQUEST["password"], time()+(60*60*24*30));
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

$loginControl = new loginControl;
require_once '../../login.php';

?>