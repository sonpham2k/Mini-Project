<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../web/css/adda_staff.css">
	<title>Thêm nhân viên</title>

</head>
<body>
	<?php 
		require '../controller/add_staff_controller.php';
	?>
	<button class="custombackHome">
        <a style="text-decoration: none" href="../../home.php">
            <img src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" />
            <p>Trang chủ</p>
        </a>
	</button>
    <form action='' method='POST'>
        
        	<!-- Nhập tên nhân viên được thêm  -->
           	<div>
                <label>Họ và tên </label>
                <input type="text" class="name-input" name="name_input" size="30" />
            </div>

            <!-- Validate nhân viên  -->
            <div>
            	<span class="error"><?php echo $nameErr; ?></span> 
            </div>

            <!-- Nhập quê quán nhân viên  -->
            <div>
                <label> Quê quán </label>
                <input type="text" class="address-input" name="address_add" size="30" />
            </div>

            <!-- Validate quê quán  -->
            <div>
            	<span class="error"><?php echo $addressErr; ?></span> 
            </div>
            
            <!-- Nhập phòng ban  -->
            <div>
                <label class="class-add"> Phòng ban 
                </label>
                <select class="select-nameClass" name="name_Class">
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
        
        	<!-- Validate phòng ban  -->
            <div>
            	<span class="error"><?php echo $classErr; ?></span> 
            </div>

            <!-- Nút thêm  -->
        	 <div>
                   <input type="submit" class="btn-add" value="Thêm" name="btn-add">
            </div>

            <!-- Validate -->
            <div>
                <span class="error"><?php echo $addInfo; ?></span> 
            </div>

    </form>

	
</body>
</html>