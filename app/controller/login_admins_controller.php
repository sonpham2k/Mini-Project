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
	        $valid = false;
	    } else {
	        $password = md5($_POST["password"]);
	    }

	    if ($login) {
        if (checkAdmin($name, $password)) {
            header("Location:home.php");
        } else {
            $passwordErr =  " Tên đăng nhập hoặc mật khẩu không đúng";
        }
    }

	}


?>