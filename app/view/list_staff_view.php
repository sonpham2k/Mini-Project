<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../web/css/list_staff.css">
	<title>Tìm kiếm nhân viên</title>
	
</head>
<body>
	<?php 
		require '../controller/list_staff_controller.php';
        
	?>
	<button class="custombackHome">
        <a style="text-decoration: none" href="../../home.php">
            <img src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" />
            <p>Trang chủ</p>
        </a>
	</button>
    <form action='' method='POST'>
        
        	<!-- Nhập tên nhân viên  -->
           	<div>
                <label class="name-add">Tên nhân viên </label>
                <input type="text" class="name-input" name="name_search" size="30" />
            </div>

            <!-- Nhập quê quán nhân viên  -->
            <div>
                <label class="address-add"> Quê quán </label>
                <input type="text" class="address-input" name="address_search" size="30" />
            </div>
            
            <!-- Nhập phòng ban nhân viên  -->
            <div>
                <label class="class-add"> Phòng ban </label>
                <select class="select-nameClass" name="class_search">
                    <option></option>
                    <?php 

                        $result = listClass();
                        for ($i = 0; $i <  count($result); $i++){
                     ?>
                    <option><?php echo $result[$i]->TenPB; ?></option>

                    <?php 
                        }
                    ?>
                </select>
            </div>
        
            <!-- Nút tìm kiếm  -->
        	 <div>
                   <input type="submit" class="btn-search" value="Tìm kiếm" name="btn_search">
            </div>

            <!-- Đếm số thiết bị tìm thấy  -->
            <div class="count">
            	Số thiết bị tìm thấy: <?php echo count($resultSearchStaff); ?>

        	</div>

        	<!-- Bảng hiển thị kết quả tìm kiếm  -->
        	<table>
                <tr>
                    <th>Mã nhân viên</td>
                    <th>Họ và tên</td>
                    <th>Quê quán</td>
                    <th>Phòng ban</th>
                    <th>Action</td>
                </tr>

                <?php
                    for($i=0 ; $i < count($resultSearchStaff); $i++){    
                ?>
                <tr>
                    <td><?php echo $resultSearchStaff[$i]->MaNV; ?></td>
                    <td><?php echo $resultSearchStaff[$i]->TenNV; ?></td>
                    <td><?php echo $resultSearchStaff[$i]->QueQuan; ?></td>
                    <td><?php echo $resultSearchStaff[$i]->TenPB; ?></td>
                    <td>
                        <input type="submit" name="update<?php echo $resultSearchStaff[$i]->MaNV ?>" value="Sửa" class = "UandD">
                        <input type="submit" name="delete<?php echo $resultSearchStaff[$i]->MaNV ?>" value="Xóa" class = "UandD">
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
    </form>

	
</body>
</html>