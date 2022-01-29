<?php 
	
require_once '../common/connectDB.php';

class classrooms extends database{

	public function listClass(){
		
		$sqlClass = 'SELECT * FROM `phongban`';
	    $listClass = $this->__conn ->query($sqlClass);
	    
		return $listClass;
	}

	public function checkClass($id){
		$countIn = 0;
		$sqlClass = "SELECT * FROM `phongban` WHERE MaPB = '$id'";
		$listClass = $this->__conn ->query($sqlClass);

		foreach($listClass as $count){
			$countIn++;
		}

		if($countIn > 0){
			return false;
		} else {
			return true;
		}
	}
	
}

$classrooms = new classrooms;

?>