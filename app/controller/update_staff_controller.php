<?php 
session_start();
require_once '../model/staff.php';
class updateStaff{

	public function __construct(){

		//Khởi tạo đối đượng nhân viên
		$staff = new staff;

		//Khởi tạo các biến
		$_SESSION['nameUpdateErr'] = $_SESSION['addressUpdateErr'] = $_SESSION['classUpdateErr'] = $_SESSION['accept'] = "";
		$_SESSION['number'] = "";
		$_SESSION['id'] = $_SESSION['name'] = $_SESSION['address'] = $_SESSION['class'] = $_SESSION['class']  = "";
		$idUpdate = $nameUpdate = $addressUpdate = $classUpdate = "";
		$number = "";
		$acceptUpdate = true;

		//Check login
        if (!isset($_SESSION['logined'])) {
			header("Location:../../login.php");
		} 

	    //Lấy mã nhân viên cần sửa
	    if(isset($_GET['num'])){
	    	$number = $_GET['num'];
	    }

	    //Trả về kết quả truy vấn tìm nhân viên cần sửa
	    $updateStaffOne = $staff->giveStaff($number);
	    foreach($updateStaffOne as $rock){
			$_SESSION['id'] = $rock['MaNV'];
			$_SESSION['name'] = $rock['TenNV'];
			$_SESSION['address'] = $rock['QueQuan'];
			$_SESSION['class'] = $rock['TenPB'];
			$_SESSION['classid'] = $rock['MaPB'];
		}

	    //Nút sửa thông tin nhân viên
		if (isset($_REQUEST['btn-update'])) {
			$idUpdate = $_SESSION['id'];

			if(empty($_REQUEST['name_update'])){
				$_SESSION['nameUpdateErr'] = "Hãy nhập tên nhân viên";
				$acceptUpdate = false;
			} else {
				$nameUpdate = $_REQUEST['name_update'];
			}

			if(empty($_REQUEST['address_update'])){
				$_SESSION['addressUpdateErr'] = "Hãy nhập quê quán nhân viên";
				$acceptUpdate = false;
			} else {
				$addressUpdate = $_REQUEST['address_update'];
			}

			if(empty($_REQUEST['class_update'])){
				$_SESSION['classUpdateErr'] = "Hãy nhập phòng nhân viên";
				$acceptUpdate = false;
			} else {
				$classUpdate = $_REQUEST['class_update'];
			}
				
			if($acceptUpdate){
				$staff->updateNV($idUpdate, $nameUpdate, $addressUpdate, $classUpdate);
				header("Location:update_staff_view.php?num=$number");
			}
			
		}
	}
}

$updateStaff = new updateStaff;

?>