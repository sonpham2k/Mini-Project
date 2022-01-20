<?php 

	require '../model/staff.php';
	require '../model/classrooms.php';

	$idUpdateErr = $nameUpdateErr = $addressUpdateErr = $classUpdateErr = $accept = "";
	$idUpdate = $nameUpdate = $addressUpdate = $classUpdate = "";
	$check = "";
	$acceptUpdate = true;

	//Check Login
	session_start();
    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header("Location:../../login.php");
    }

    //Nút sửa thông tin nhân viên
	if (isset($_POST['btn-update'])) {
		if(empty($_POST['id_update'])){
			$idUpdateErr = "Hãy nhập mã nhân viên";
			$acceptUpdate = false;
		} else {
			$idUpdate = $_POST['id_update'];
		}
		
		if(empty($_POST['name_update'])){
			$nameUpdateErr = "Hãy nhập tên nhân viên";
			$acceptUpdate = false;
		} else {
			$nameUpdate = $_POST['name_update'];
		}

		if(empty($_POST['address_update'])){
			$addressUpdateErr = "Hãy nhập quê quán nhân viên";
			$acceptUpdate = false;
		} else {
			$addressUpdate = $_POST['address_update'];
		}

		if(empty($_POST['class_update'])){
			$classUpdateErr = "Hãy nhập phòng nhân viên";
			$acceptUpdate = false;
		} else {
			$classUpdate = $_POST['class_update'];
		}
			
		if($acceptUpdate){
			updateNV($idUpdate, $nameUpdate, $addressUpdate, $classUpdate);
			$accept = "Sửa thành công";
		}
		

	}
?>