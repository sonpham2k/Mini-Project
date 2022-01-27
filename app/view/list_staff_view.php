<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../web/css/loginhome.css">
    <title>Tìm kiếm thành viên</title>
</head>
<body>
        <?php 
           require_once '../model/classrooms.php';
           require_once '../controller/list_staff_controller.php'; 
        ?>
     <button class="custombackHome">
                        <a style="text-decoration: none" href="../../home.php">
                            <img src="https://img.icons8.com/material-outlined/24/FFFFFF/home--v2.png" />
                            <p>Trang chủ</p>
                        </a>
                    </button>

            <div class="formSearch">
                <form action='' method='POST'>
                    <div class="info">
                    <p class="form__title">Tìm kiếm nhân viên</p>
                    <!-- Họ và tên -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Họ và tên</label>
                        <input type="text" class="form-control" id="floatingInput" name="name_search">                   
                    </div>

                    <!-- Quê quán -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Quê quán</label>
                        <input type="text" class="form-control" id="floatingInput" name="address_search" >                   
                    </div>
                   
                    <!-- Phòng bàn -->
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Phòng ban</label>
                        <select class="form-control" aria-label="Default select example" name="class_search">
                                <option></option>
                                <?php 
                                    $result = $classrooms->listClass();
                                    foreach ($result as $row) {     
                                ?>
                                <option value="<?php echo $row['TenPB']; ?>"><?php echo $row['TenPB']; ?></option>
                                <?php 
                                    }
                                ?>
                        </select>
                    </div>

                    <!-- Nút tìm kiếm  -->
                    <div>
                        <input type="submit" class="btn-update" value="Tìm kiếm" name="btn_search">
                    </div>
                
                    </div>
                <div>
                    <?php $resultSearch = $_SESSION['resultSearch']; ?>

                   
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Quê quán</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($resultSearch as $row) {    
                            ?>
                            <tr>
                                <td><?php echo $row['MaNV']; ?></td>
                                <td><?php echo $row['TenNV']; ?></td>
                                <td><?php echo $row['QueQuan']; ?></td>
                                <td><?php echo $row['TenPB']; ?></td>
                                <td>
                                    <input type="submit" name="update<?php echo $row['MaNV']; ?>" value="Sửa" style="width: 80px; margin: 0 auto;">
                                    <input type="submit" name="delete<?php echo $row['MaNV']; ?>" value="Xóa" style="width: 80px; margin: 0 auto;" onclick="return confirm('Bạn có muốn xóa nhân viên <?php echo $row['TenNV']; ?> mã <?php echo $row['MaNV']; ?> không ?');">
                                </td>
                            </tr>
                            <?php
                                }
                            ?>           
                        </tbody>
                    </table>
                    </form>
                </div>
                </div>
    
</body>
</html>