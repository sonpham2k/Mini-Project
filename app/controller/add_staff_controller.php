<?php 

require_once '../model/staff.php';
class addStaff{
	public function __construct(){

		//Khởi tạo biến staff
		$staff = new staff;

		//Các biến 
		$_SESSION['nameErr'] = $_SESSION['addressErr'] = $_SESSION['classErr'] = "";
		$name = $address = $class = "";
		$_SESSION['addinfo'] ="";
		$acceptAdd = true;

		//Check login
	    
	    if (!(isset($_COOKIE['login']) && $_COOKIE['login'] == true)) {
            header("Location:../../login.php");
        }
		
		//Nút thêm nhân viên
		if(isset($_REQUEST['btn-add'])){

			if(empty($_REQUEST['name_input'])){
				$_SESSION['nameErr'] = "Hãy nhập tên nhân viên";
				$acceptAdd = false;
			} else {
				$name = $_REQUEST['name_input'];
			}

			if(empty($_REQUEST['address_add'])){
				$_SESSION['addressErr'] = "Hãy nhập quê quán nhân viên";
				$acceptAdd = false;
			} else {
				$address = $_REQUEST['address_add'];
			}

			if(empty($_REQUEST['name_Class'])){
				$_SESSION['classErr'] = "Hãy nhập chọn phòng ban";
				$acceptAdd = false;
			} else {
				$class = $_REQUEST['name_Class'];
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