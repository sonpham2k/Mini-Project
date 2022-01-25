<?php 

class updateStaff{

	public function __construct(){
		$_SESSION['idUpdateErr'] = $_SESSION['nameUpdateErr'] = $_SESSION['addressUpdateErr'] = $_SESSION['classUpdateErr'] = $_SESSION['accept'] = "";
		$_SESSION['number'] = "";
		$_SESSION['id'] = $_SESSION['name'] = $_SESSION['address'] = $_SESSION['class'] = $_SESSION['class']  = "";
		$idUpdate = $nameUpdate = $addressUpdate = $classUpdate = "";
		$check = "";
		$number = $info = "";
		$acceptUpdate = true;

		//Check Login
		if (!(isset($_COOKIE['login']) && $_COOKIE['login'] == true)) {
	        header("Location:../../login.php");
	    }

	    //Lấy mã nhân viên cần sửa
	    if(isset($_GET['num'])){
	    	$number = $_GET['num'];
	    }

	    //Trả về kết quả truy vấn tìm nhân viên cần sửa
	    require_once '../model/staff.php';
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
			
			if(empty($_REQUEST['id_update'])){
				$_SESSION['idUpdateErr'] = "Hãy nhập mã nhân viên";
				$acceptUpdate = false;
			} else {
				$idUpdate = $_REQUEST['id_update'];
			}

			
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
				require_once '../model/staff.php';
				$staff->updateNV($idUpdate, $nameUpdate, $addressUpdate, $classUpdate);
				$_SESSION['accept'] = "Sửa thành công";
			}
			
		}
	}
}

$updateStaff = new updateStaff;
require_once '../view/update_staff_view.php';

?>