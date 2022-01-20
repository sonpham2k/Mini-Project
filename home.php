
<?php
    session_start();
    require 'app/controller/home_controller.php';
    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="web/css/home.css">
	<title>Trang chủ</title>
</head>

<body>
    <form action='' method='POST'>
             <input type="submit" name="logoutAction" value="Logout" class="alignright" id="btnLogout" />
            <div class=".div_left">
                <label class="userid_home">Tên đăng nhập: <?php echo $_SESSION['name']; ?> </label>
            </div>

            <div class="link">
                <a href="app/view/add_staff_view.php"> Thêm nhân viên </a>
            </div>

            <div class="link">
                <a href="app/view/list_staff_view.php"> Tìm kiếm nhân viên </a>
            </div>
            
            <div class="link">
                <a href="app/view/update_staff_view.php"> Sửa thông tin nhân viên </a>
            </div>
    </form>	
</body>
</html>