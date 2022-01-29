<?php 
session_start();
require (dirname(dirname(__FILE__)). '/model/logins.php');


class loginControl{

	public function __construct(){

		// Khởi tạo đối tượng logins
		$logins = new logins();

		// Khai báo các biến cần sử dụng
		$_SESSION['nameErr'] = $_SESSION['passwordErr'] = "";
		$name = $password = "";
		$loginHome = true;

		//check login
		if(isset($_COOKIE['user_login']) && isset($_COOKIE['pass_login'])){
			$result = $logins->checkAdmin($_COOKIE['user_login'], md5($_COOKIE['pass_login']));
			if($result){
				$_SESSION['username'] = $_COOKIE['user_login'];
				$_SESSION['logined'] = true;
				header("Location:home.php");
				exit();
			}
		} else {

            // Thực thi nút đăng nhập
            if (isset($_REQUEST['btn-login'])) {

                $user = htmlspecialchars($_REQUEST['user_id']);
                $pass = htmlspecialchars($_REQUEST['password']);


                // Kiểm tra tên đăng nhập
                if (empty($user)) {
                    $_SESSION['nameErr'] = "Hãy nhập tên đăng nhập";
                    $loginHome = false;
                } else if(strlen($user)>7) {
                    $_SESSION['nameErr'] = "Hãy nhập tên đăng nhập tối đa 7 kí tự";
                    $loginHome = false;
                    
                } else {
                    $name = $user;
                }

                // Kiểm tra password
                if (empty($pass)) {
                    $_SESSION['passwordErr'] = "Hãy nhập mật khẩu";
                    $loginHome = false;
                } else if (strlen($pass)<6) {
                    $_SESSION['passwordErr'] = "Hãy nhập mật khẩu tối thiếu 6 kí tự";
                    $loginHome = false;
                } else {
                    $password = md5($pass);
                }

                //Sau khi không có validate, chuyển sang trạng thái kiểm tra đăng nhập
                if ($loginHome) {

                    //Kiểm tra tài khoản mật khẩu
                    $result = $logins->checkAdmin($name, $password);

                    if ($result) {
                        //Kiểm tra nút remember me
                        if (isset($_REQUEST['remember'])) {
                            setcookie("user_login", $_REQUEST['user_id'], time() + (60 * 60 * 24 * 30));
                            setcookie("pass_login", $_REQUEST["password"], time() + (60 * 60 * 24 * 30));
                        }
						$_SESSION['username'] = $name;
                        $_SESSION['logined'] = true;
                        header("Location:home.php");
                    } else {
                        //Validate sai tài khoản mật khẩu
                        $_SESSION['passwordErr'] = " Tên đăng nhập hoặc mật khẩu không đúng";

                    }
                }
            }
        }
	}
}

$loginControl = new loginControl;

?>