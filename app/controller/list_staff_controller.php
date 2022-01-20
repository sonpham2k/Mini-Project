<?php 
	require '../model/staff.php';
	require '../model/classrooms.php';

	$name = $address = $class = "";
	$resultSearchStaff = "";
	$numLast = "";
	$check = "";
	$idUpdate = $nameUpdate = $addressUpdate = $classUpdate = "";

	//check login
	session_start();
    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header("Location:../../login.php");
    }

    //Tìm kiếm thông tin
	if(isset($_POST['btn_search'])){

		$name = $_POST['name_search'];
		$address = $_POST['address_search'];
		$class = $_POST['class_search'];

	}

	//Phương thức trả về kế quả tìm kiếm
	$resultSearchStaff = searchStaff($name, $address, $class);

	//Trả về mã nhân viên lớn nhất
	$lastMa = lastMaNV();
	$numLast = $lastMa[0]->MaNV;

	//Xóa nhân viên
	for($i=0; $i <= $numLast; $i++){
		if(isset($_POST['delete'.$i])){
			deleteStaff($i);
			header('location: list_staff_view.php');
		}
	}

	// for($i=0; $i <= $numLast; $i++){
	// 	if(isset($_POST['update'.$i])){
	// 		$idUpdate = $resultSearchStaff[$i]->MaNV;
	// 		$nameUpdate = $resultSearchStaff[$i]->TenNV;
	// 		$addressUpdate = $resultSearchStaff[$i]->QueQuan;
	// 		$classUpdate = $resultSearchStaff[$i]->TenPB;
	// 		header('location: update_staff_view.php');
	// 	}
	// }

	if (isset($_POST['btn-update'])) {
		$idUpdate = $_POST['id_update'];
		$nameUpdate = $_POST['name_update'];
		$addressUpdate = $_POST['address_update'];
		$classUpdate = $_POST['class_update'];
		updateNV($idUpdate, $nameUpdate, $addressUpdate, $classUpdate);
	}
?>