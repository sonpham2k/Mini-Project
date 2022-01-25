<?php 
	
require_once '../common/connectDB.php';

class staff extends database{

	//Thêm nhân viên mới
	public function addStaff($name, $address, $class){

		$sqlAddStaff = "INSERT INTO `nhanvien`(`MaNV`, `TenNV`, `QueQuan`, `MaPB`) VALUES (null,'$name','$address','$class')";
		$addStaff = $this->__conn->query($sqlAddStaff);
	    
	}

	//Tìm kiếm nhân viên
	public function searchStaff($name, $address, $class){

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
		
		return $this->__conn -> query($sqlSearch);
	}

	//Xóa nhân viên
	public function deleteStaff($maNV){

		$sqlDelete = "DELETE FROM `nhanvien` WHERE MaNV = '$maNV'";
		$delete = $this->__conn -> query($sqlDelete);
		
	}

	//Tìm nhân viên với mã nhân viên theo yêu cầu sửa
	public function giveStaff($maNV){

		$sqlGive = "SELECT nhanvien.MaNV, nhanvien.TenNV ,nhanvien.QueQuan, phongban.TenPB, phongban.MaPB FROM `nhanvien`CROSS JOIN phongban ON nhanvien.MaPB = phongban.MaPB WHERE MaNV = '$maNV'";
		return $this->__conn -> query($sqlGive);
	}

	//Mã của nhân viên được thêm vào cuối cùng trong công ty
	public function lastMaNV(){

		$sqlLast = "SELECT `MaNV` FROM `nhanvien` ORDER BY `MaNV` DESC LIMIT 1";
		return $this->__conn -> query($sqlLast);
		
	}

	//Cập nhật thông tin của nhân viên
	public function updateNV($maNV, $tenNV, $queNV, $maPB){

		$sqlUpdate = "UPDATE `nhanvien` SET `TenNV`='$tenNV',`QueQuan`='$queNV',`MaPB`='$maPB' WHERE MaNV = '$maNV'";
		$update = $this->__conn -> query($sqlUpdate);
		
	}
}


?>