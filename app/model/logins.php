<?php 

require (dirname(dirname(__FILE__)). '/common/connectDB.php');

class logins extends database{
	public function checkAdmin($name, $pass){
		$countIn =0;
		$sql = "SELECT * FROM `admins` WHERE `login_id` = '$name' AND `password` = '$pass'";
		$result = $this->__conn->query($sql);

		foreach($result as $count){
			$countIn++;
		}

		if($countIn > 0){
			return true;
		} else {
			return false;
		}
	}

}


?>