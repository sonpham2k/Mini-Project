<?php 
	
	function addStaff($name, $address, $class){
		
		require '../common/connectDB.php';

		$sqlAddStaff = "INSERT INTO `nhanvien`(`MaNV`, `TenNV`, `QueQuan`, `MaPB`) VALUES (null,'$name','$address','$class')";
	    $addStaff = $conn->prepare($sqlAddStaff);
	    $addStaff -> execute();
	}

	function searchStaff($name, $address, $class){

		require '../common/connectDB.php';

		$sqlSearch = "SELECT nhanvien.MaNV, nhanvien.TenNV ,nhanvien.QueQuan, phongban.TenPB FROM `nhanvien`CROSS JOIN phongban ON nhanvien.MaPB = phongban.MaPB ";
		if($name == '' && $address == '' && $class == ''){
			$sqlSearch2 = "";
		} else if($name != '' && $address == '' && $class == ''){
			$sqlSearch2 = "WHERE nhanvien.TenNV = '$name'";
		} else if($name == '' && $address != '' && $class == ''){
			$sqlSearch2 = "WHERE nhanvien.QueQuan = '$address'";
		}else if($name == '' && $address == '' && $class != ''){
			$sqlSearch2 = "WHERE phongban.TenPB = '$class'";
		}else if($name != '' && $address != '' && $class == ''){
			$sqlSearch2 = "WHERE nhanvien.TenNV = '$name' AND nhanvien.QueQuan = '$address'";
		}else if($name == '' && $address != '' && $class != ''){
			$sqlSearch2 = "WHERE nhanvien.QueQuan = '$address' AND phongban.TenPB = '$class'";
		}else if($name != '' && $address == '' && $class != ''){
			$sqlSearch2 = "WHERE nhanvien.TenNV = '$name' AND phongban.TenPB = '$class'";
		}else {
			$sqlSearch2 = "WHERE nhanvien.TenNV = '$name' AND nhanvien.QueQuan = '$address' AND phongban.TenPB = '$class'";
		}

		$order = "ORDER BY nhanvien.MaNV";
		$sqlSearch2 .= $order;
		$sqlSearch .= $sqlSearch2;
		$search = $conn -> prepare($sqlSearch);
		$search -> execute();

		$resultSearch = $search->fetchAll(PDO::FETCH_OBJ);

		return $resultSearch;
	}

	function deleteStaff($maNV){

		require '../common/connectDB.php';

		$sqlDelete = "DELETE FROM `nhanvien` WHERE MaNV = '$maNV'";
		$Delete = $conn -> prepare($sqlDelete);
		$Delete -> execute();
	}

	function giveStaff($maNV){

		require '../common/connectDB.php';

		$sqlGive = "SELECT nhanvien.MaNV, nhanvien.TenNV ,nhanvien.QueQuan, phongban.TenPB, phongban.MaPB FROM `nhanvien`CROSS JOIN phongban ON nhanvien.MaPB = phongban.MaPB WHERE MaNV = '$maNV'";
		$Give = $conn -> prepare($sqlGive);
		$Give -> execute();

		$resultGive = $Give->fetchAll(PDO::FETCH_OBJ);

		return $resultGive;
	}

	function lastMaNV(){

		require '../common/connectDB.php';

		$sqlLast = "SELECT `MaNV` FROM `nhanvien` ORDER BY `MaNV` DESC LIMIT 1";
		$Last = $conn -> query($sqlLast);
		$Last -> execute();

		$resultLast = $Last->fetchAll(PDO::FETCH_OBJ);

		return $resultLast;
	}

	function updateNV($maNV, $tenNV, $queNV, $maPB){
		require '../common/connectDB.php';

		$sqlUpdate = "UPDATE `nhanvien` SET `TenNV`='$tenNV',`QueQuan`='$queNV',`MaPB`='$maPB' WHERE MaNV = '$maNV'";
		$update = $conn -> prepare($sqlUpdate);
		$update -> execute();
	}
?>