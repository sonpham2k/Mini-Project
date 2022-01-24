<?php 

require_once '../common/connectDB.php';

class login extends database{
	public function checkAdmin($name, $pass)
	{
			$sql = "SELECT * FROM `admins` WHERE `login_id` = '{$name}' AND `password` = '{$pass}'";
			$result = $conn->query($sql);
			

			$user_data = $result->fetch();
			if ($result->rowCount() > 0) {
				$_SESSION['loggedin'] = true;
			return true;
		} else {
			$_SESSION['loggedin'] = false;
			return false;
		}
	}
}

$login = new login();
?>