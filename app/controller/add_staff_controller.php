<?php 
session_start();
require_once '../model/staff.php';
require_once '../model/classrooms.php';

class addStaff{
	public function __construct(){

		//Khởi tạo biến staff
		$staff = new staff;
		$classroom = new classrooms;

		//Các biến 
		$_SESSION['nameErr'] = $_SESSION['addressErr'] = $_SESSION['classErr'] = "";
		$name = $address = $class = "";
		$_SESSION['addinfo'] ="";
		$acceptAdd = true;

		//Check login
        if (!isset($_SESSION['logined'])) {
			header("Location:../../login.php");
		} 
		
		//Nút thêm nhân viên
		if(isset($_REQUEST['btn-add'])){

			$nameInput = htmlspecialchars($_REQUEST['name_input']);
			$addressInput = htmlspecialchars($_REQUEST['address_add']);
			$classInput = htmlspecialchars($_REQUEST['name_Class']);

			if(empty($nameInput)){
				$_SESSION['nameErr'] = "Hãy nhập tên nhân viên";
				$acceptAdd = false;
			} else if(strlen($nameInput)>50){
				$_SESSION['nameErr'] = "Hãy nhập tên nhân viên tối đa 50 kí tự";
				$acceptAdd = false;
			} else {
				$name = $nameInput;
			}

			if(empty($addressInput)){
				$_SESSION['addressErr'] = "Hãy nhập quê quán nhân viên";
				$acceptAdd = false;
			} else if(strlen($addressInput)>50){
				$_SESSION['addressErr'] = "Hãy nhập quê nhân viên tối đa 50 kí tự";
				$acceptAdd = false;
			} else {
				$address = $addressInput;
			}

			if(empty($classInput)){
				$_SESSION['classErr'] = "Hãy nhập chọn phòng ban";
				$acceptAdd = false;
			} else if($classroom->checkClass($classInput)){
				$_SESSION['classErr'] = "Nhập phòng ban không hợp lệ";
				$acceptAdd = false;
			} else {
				$class = $classInput;
			}

			if($acceptAdd){
				$staff->addStaff($name, $address, $class);
				$_SESSION['addinfo'] = "Thêm thành công";
			}
		}
	}
}

$addStaff = new addStaff;

?>