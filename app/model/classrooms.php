<?php 
	
require_once '../common/connectDB.php';

class classrooms extends database{

	public function listClass(){
		
		$sqlClass = 'SELECT * FROM `phongban`';
	    $listClass = $this->__conn ->query($sqlClass);
	    
		return $listClass;
	}
}

$classrooms = new classrooms();

?>