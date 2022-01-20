<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../web/css/update_staff.css">
	<title>Tìm kiếm nhân viên</title>
	
</head>
<body>
	<?php 
		require '../controller/update_staff_controller.php'; 
        // echo $check; 
	?>
	<button class="custombackHome">
        <a style="text-decoration: none" href="../../home.php">
            <img src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" />
            <p>Trang chủ</p>
        </a>
	</button>
    <form action='' method='POST'>
            
            <!-- Nhập mã nhân viên -->
            <div>
                <label class="name-add">Mã nhân viên </label>
                <!-- <label type="text" class="name-input-label" name="id_update"> </label> -->
                <input type="text" class="name-input" name="id_update" size="30" />
            </div> 

            <!-- Validate mã nhân viên  -->
            <div>
                <span class="error"><?php echo $idUpdateErr; ?></span> 
            </div>

        	<!-- Nhập tên nhân viên  -->
           	<div>
                <label class="name-add">Tên nhân viên </label>
                <input type="text" class="name-input" name="name_update" size="30" />
            </div>

            <!-- Validate tên nhân viên  -->
            <div>
                <span class="error"><?php echo $nameUpdateErr; ?></span> 
            </div>

            <!-- Nhập quê quán nhân viên  -->
            <div>
                <label class="address-add"> Quê quán </label>
                <input type="text" class="address-input" name="address_update" size="30" />
            </div>
            
            <!-- Validate quê nhân viên  -->
            <div>
                <span class="error"><?php echo $addressUpdateErr; ?></span> 
            </div>

            <!-- Nhập phòng ban nhân viên  -->
            <div>
                <label class="class-add"> Phòng ban </label>
               <select class="select-nameClass" name="class_update" value = >
                    <option></option>
                    <?php 
                        $result = listClass();
                        for ($i = 0; $i <  count($result); $i++){
                     ?>
                    <option value="<?php echo $result[$i]->MaPB; ?>"><?php echo $result[$i]->TenPB; ?></option>

                    <?php 
                        }
                    ?>
                </select>
            </div>
        
            <!-- Validate phòng nhân viên  -->
            <div>
                <span class="error"><?php echo $classUpdateErr; ?></span> 
            </div>

            <!-- Nút tìm kiếm  -->
        	 <div>
                   <input type="submit" class="btn-update" value="Sửa" name="btn-update">
            </div>
            
            <!-- Validate sửa thành công  -->
            <div>
                <span class="error"><?php echo $accept; ?></span> 
            </div>
    </form>

	
</body>
</html>