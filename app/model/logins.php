<?php 

require_once '../common/connectDB.php';

class logins extends database{

	public function checkAdmin($name, $pass){
		// $countIn = 0;

		$sql = "SELECT * FROM `admins` WHERE `login_id` = '$name' AND `password` = '$pass'";
		$result = $this->__conn->query($sql);
		
		// foreach($result as $count){
		// 	$countIn++;
		// }

		// if ($countIn > 0) {
		// 	$_SESSION['loggedin'] = true;
		// 	return true;
		// } else {
		// 	$_SESSION['loggedin'] = false;
		// 	return false;
		// }
		// return $countIn;
	}

	public function checkAdmin2($name, $pass){
		$count = 5;
		return $count;
	}

}

$logins = new logins;
?>