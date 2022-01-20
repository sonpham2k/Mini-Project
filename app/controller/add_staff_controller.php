<?php 
	require '../model/staff.php';
	require '../model/classrooms.php';

	$nameErr = $addressErr = $classErr = $addInfo = "";
	$name = $address = $class = "";
	$acceptAdd = true;

	if(isset($_POST['btn-add'])){

		if(empty($_POST['name_input'])){
			$nameErr = "Hãy nhập tên nhân viên";
			$acceptAdd = false;
		} else {
			$name = $_POST['name_input'];
		}

		if(empty($_POST['address_add'])){
			$addressErr = "Hãy nhập quê quán nhân viên";
			$acceptAdd = false;
		} else {
			$address = $_POST['address_add'];
		}

		if(empty($_POST['name_Class'])){
			$classErr = "Hãy nhập chọn phòng ban";
			$acceptAdd = false;
		} else {
			$class = $_POST['name_Class'];
		}

		if($acceptAdd){
			addStaff($name, $address, $class);
			$addInfo = "Thêm thành công";
		}
	}
	

?>