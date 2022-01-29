<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../web/css/staff.css">
    <title>Thêm thành viên</title>
</head>
<body>
        <?php 
            require_once '../controller/update_staff_controller.php';
            require_once '../model/classrooms.php';  
        ?>
     <button class="custombackHome">
                        <a style="text-decoration: none" href="list_staff_view.php">
                            <img src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" />
                            <p>Trở về danh sách</p>
                        </a>
                    </button>
<div class="form__box">
        <div class="form__right">
            <div class="form__padding-right">
                <form action='' method='POST'>
                    <p class="form__title">Sửa thông tin nhân viên</p>

                    <!-- Mã nhân viên -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Mã nhân viên</label>
                        <label type="texr" class="form-control" id="floatingInput"><?php echo $_SESSION['id']; ?></label>                  
                    </div>

                    <!-- Họ và tên -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Họ và tên</label>
                        <input type="texr" class="form-control" id="floatingInput" name="name_update" placeholder="tối đa 50 kí tự" value="<?php echo $_SESSION['name']; ?>">                   
                    </div>

                     <!-- Validate nhân viên  -->
                    <div>
                        <span class="error"><?php echo $_SESSION['nameUpdateErr']; ?></span> 
                    </div>

                    <!-- Quê quán -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Quê quán</label>
                        <input type="texr" class="form-control" id="floatingInput" name="address_update" placeholder="tối đa 50 kí tự" value="<?php echo $_SESSION['address']; ?>">                   
                    </div>
                    
                    <!-- Validate quê quán  -->
                    <div>
                        <span class="error"><?php echo $_SESSION['addressUpdateErr']; ?></span> 
                    </div>

                    <!-- Phòng bàn -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Phòng ban</label>
                        <select class="form-control" aria-label="Default select example" name="class_update">
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
                        <input type="submit" class="btn-update" value="Sửa" name="btn-update" onclick="return confirm('Bạn có chắc muốn sửa?');">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>