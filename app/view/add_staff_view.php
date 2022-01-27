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
            require_once '../model/classrooms.php'; 
            require_once '../controller/add_staff_controller.php';   
        ?>
     <button class="custombackHome">
                        <a style="text-decoration: none" href="../../home.php">
                            <img src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" />
                            <p>Trang chủ</p>
                        </a>
                    </button>
<div class="form__box">
        <div class="form__right">
            <div class="form__padding-right">
                <form action='' method='POST'>
                    <p class="form__title">Thêm thành viên</p>

                    <!-- Họ và tên -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Họ và tên</label>
                        <input type="texr" class="form-control" id="floatingInput" name="name_input" placeholder="">                   
                    </div>

                     <!-- Validate nhân viên  -->
                    <div>
                        <span class="error"><?php echo $_SESSION['nameErr']; ?></span> 
                    </div>

                    <!-- Quê quán -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Quê quán</label>
                        <input type="texr" class="form-control" id="floatingInput" name="address_add" placeholder="">                   
                    </div>
                    
                    <!-- Validate quê quán  -->
                    <div>
                        <span class="error"><?php echo $_SESSION['addressErr']; ?></span> 
                    </div>

                    <!-- Phòng bàn -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Phòng ban</label>
                        <select class="form-control" aria-label="Default select example" name="name_Class">
                                <option></option>
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

                    <!-- Validate phòng ban  -->
                    <div>
                        <span class="error"><?php echo $_SESSION['classErr']; ?></span> 
                    </div>

                    <!-- Nút thêm -->
                    <div>
                        <input type="submit" class="btn-add" value="Thêm" name="btn-add">
                    </div>

                    <!-- Validate -->
                    <div>
                        <span class="error"><?php echo $_SESSION['addinfo']; ?></span> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>