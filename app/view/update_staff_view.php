<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../web/css/update_staff.css">
	<title>Sửa nhân viên</title>
	
</head>
<body>
	<?php 
		require_once '../controller/update_staff_controller.php';
        require_once '../model/classrooms.php';
        echo $_SESSION['number'];
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
                <input type="text" class="name-input" name="id_update" size="30" value="<?php echo $_SESSION['id']; ?>"/>
            </div> 

            <!-- Validate mã nhân viên  -->
            <div>
                <span class="error"><?php echo $_SESSION['idUpdateErr']; ?></span> 
            </div>

        	<!-- Nhập tên nhân viên  -->
           	<div>
                <label class="name-add">Tên nhân viên </label>
                <input type="text" class="name-input" name="name_update" size="30" value="<?php echo $_SESSION['name']; ?>" />
            </div>

            <!-- Validate tên nhân viên  -->
            <div>
                <span class="error"><?php echo $_SESSION['nameUpdateErr']; ?></span> 
            </div>

            <!-- Nhập quê quán nhân viên  -->
            <div>
                <label class="address-add"> Quê quán </label>
                <input type="text" class="address-input" name="address_update" size="30" value="<?php echo $_SESSION['address']; ?>"/>
            </div>
            
            <!-- Validate quê nhân viên  -->
            <div>
                <span class="error"><?php echo $_SESSION['addressUpdateErr']; ?></span> 
            </div>

            <!-- Nhập phòng ban nhân viên  -->
            <div>
                <label class="class-add"> Phòng ban </label>
               <select class="select-nameClass" name="class_update">
                    <option value="<?php if(isset($_SESSION['classid'])){ echo $_SESSION['classid'];} ?>"><?php echo $_SESSION['class']; ?></option>
                    <?php 
                        
                        $result = $classrooms->listClass();
                        foreach ($result as $row) {
                            
                     ?>
                    <option value="<?php echo $row['MaPB']; ?>"><?php echo $row['TenPB']; ?></option>

                    <?php 
                        }
                    ?>
                </select>
            </div>
        
            <!-- Validate phòng nhân viên  -->
            <div>
                <span class="error"><?php echo $_SESSION['classUpdateErr']; ?></span> 
            </div>

            <!-- Nút tìm kiếm  -->
        	 <div>
                   <input type="submit" class="btn-update" value="Sửa" name="btn-update">
            </div>
            
            <!-- Validate sửa thành công  -->
            <div>
                <span class="error"><?php echo $_SESSION['accept']; ?></span> 
            </div>
    </form>

	
</body>
</html>