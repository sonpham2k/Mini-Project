<?php 

	function checkAdmin($name, $pass)
	{
			require 'app/common/connectDB.php';
			$sql = "SELECT * FROM `admins` WHERE `login_id` = '{$name}' AND `password` = '{$pass}'";
			$result = $conn->query($sql);
			$result->execute();

			$user_data = $result->fetch();
			if ($result->rowCount() > 0) {

				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $name;
				date_default_timezone_set('Asia/Bangkok');
				$_SESSION['time'] = date("Y-m-d H:i");

			if ($user_data['login_id'] == "admin001" || $user_data['login_id'] == "admin002") {
				$_SESSION['sa'] = true;
			} else {
				$_SESSION['sa'] = false;
			}
			return true;
		} else {
			$_SESSION['loggedin'] = false;
			$_SESSION['name'] = '';
			$_SESSION['time'] = '';
			$_SESSION['sa'] = false;
			return false;
		}
	}
?>