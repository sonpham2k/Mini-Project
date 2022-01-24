<?php 

class listStaff{

	public function __construct(){

		$name = $address = $class = "";
		
		$_SESSION['count']="";
		$resultSearchStaff ="";
		

		//check login
		// session_start();
	 //    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	 //        header("Location:../../login.php");
	 //    }

	    //Tìm kiếm thông tin
		if(isset($_REQUEST['btn_search'])){

			$name = $_REQUEST['name_search'];
			$address = $_REQUEST['address_search'];
			$class = $_REQUEST['class_search'];
		}

		require_once '../model/staff.php';
		$_SESSION['resultSearch'] = $staff->searchStaff($name, $address, $class);
		

		//Trả về mã nhân viên lớn nhất

		$lastMa = $staff->lastMaNV();
		foreach($lastMa as $rom){
			$numlast = $rom['MaNV'];
		}

		// $_SESSION['count'] = $numlast;

		//Xóa nhân viên
		for($i=0; $i <= $numlast; $i++){
			if(isset($_REQUEST['delete'.$i])){
				require_once '../model/staff.php';
				$staff->deleteStaff($i);
				header('location: list_staff_view.php');
			}
		}
		
		//Chuyển sang màn sửa thông tin nhân viên
		for($i=0; $i <= $numlast; $i++){
			if(isset($_REQUEST['update'.$i])){
				header('location: update_staff_view.php?num='.$i.'');

			}
		}
	}
}

$listStaff = new listStaff;
require_once '../view/list_staff_view.php';
	
?>