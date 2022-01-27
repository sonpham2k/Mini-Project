<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="web/css/loginhome.css">
    <title>Trang chủ</title>
</head>
<body>
        <?php 
             require_once 'app/controller/home_controller.php';    
        ?>

    <div class="form__box">
        <!-- <div class="form__right">
            <div class="form__padding-right"> -->
                <form action='' method='POST'>

                    <!-- Logout -->
                    <input type="submit" name="logoutAction" value="Logout" class="alignright" id="btnLogout" />
                    
                    <!-- Tên đăng nhập -->
                    <p class="form__title">Tên đăng nhập: 
                        <?php 
                            echo $_SESSION['username']; 
                        ?> 
                    </p>

                    <div class="distance">
                        <!-- Link đến trang thêm nhân viên -->
                        <a href="app/view/add_staff_view.php"> <img src="https://www.shareicon.net/data/2016/06/30/788859_add_512x512.png" height="120px" width="120px" > </a>
                    
                        <!-- Link đến trang tìm kiếm nhân viên -->
                        <a href="app/view/list_staff_view.php"> <img src="https://nystaffsearch.com/wp-content/uploads/2015/04/icon4_new-min.png" height="120px" width="120px" > </a>
                    </div>
                </form>
            <!-- </div>
        </div> -->
    </div>
</body>
</html>