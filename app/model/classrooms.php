<?php 
	
	function listClass(){
		global $conn;
		require '../common/connectDB.php';
		$sqlClass = 'SELECT * FROM `phongban`';
	    $listClass = $conn ->query($sqlClass);
	    $listClass -> execute();
	
		$result = $listClass->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}

	

?>