<?php 
session_start();
require_once '../model/staff.php';
class listStaff{

	public function __construct(){

		//Khởi tạo đối tượng nhân viên
		$staff = new staff;

		//Khởi tạo biến
		$name = $address = $class = "";
		$_SESSION['count']= "";

		//Check login
        if (!isset($_SESSION['logined'])) {
			header("Location:../../login.php");
		} 

	    //Tìm kiếm thông tin
		if(isset($_REQUEST['btn_search'])){

			$name = $_REQUEST['name_search'];
			$address = $_REQUEST['address_search'];
			$class = $_REQUEST['class_search'];
		}

		//Lưu tất cả những nhân viên được tìm kiếm
		$_SESSION['resultSearch'] = $staff->searchStaff($name, $address, $class);


		//Trả về mã nhân viên lớn nhất
		$lastMa = $staff->lastMaNV();
		foreach($lastMa as $rom){
			$numlast = $rom['MaNV'];
		}

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

	
?>