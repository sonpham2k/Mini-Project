<?php 
	require 'app/model/logins.php';

	$nameErr = $passwordErr = "";
	$name = $password = "";
	$login = true;



	if(isset($_POST['btn-login'])){

		if(empty($_POST['user_id'])){
			$nameErr = "Hãy nhập tên đăng nhập";
			$login = false;
		} else {
			$name = $_POST['user_id'];
			
		}

		if (empty($_POST["password"])) {
	        $passwordErr = "Hãy nhập password";
	        $login = false;
	    } else {
	        $password = md5($_POST["password"]);
	        
	    }

	    if ($login) {
	        if (checkAdmin($name, $password)) {
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


?>