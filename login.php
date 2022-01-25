<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="web/css/login.css">
	<title>Đăng nhập</title>
</head>
<body>
	<body>
        <?php 
            require_once 'app/controller/login_admins_controller.php';    
        ?>
    <form action='' method='POST'>

            <!-- Nhập tên đăng nhập -->
            <div>
                <label class="userid">Tên đăng nhập </label>
                <input type="text" class="userid-input" name="user_id" size="30" 
                value = "<?php if(isset($_COOKIE['user_login'])){
                            echo $_COOKIE['user_login'];
                        } ?>"
                /> 
            </div>

            <!-- Validate tên đăng nhập -->
            <div>
                <span class="error"><?php echo $_SESSION['nameErr']; ?></span>
            </div>

            <!-- Nhập mật khẩu -->
            <div>
                <label class="password">Mật khẩu </label>
                <input type="password" class="password-input" name="password" size="30" 
                value = "<?php  if(isset($_COOKIE['pass_login'])){
                            echo $_COOKIE['pass_login'];
                        } ?>"
                />
            </div>
            
            <!-- Validate mật khẩu -->
            <div>
                <span class="error"><?php echo $_SESSION['passwordErr']; ?></span>
            </div>

            <!-- Remember me -->
            <div>
                <input type = "checkbox" class = "check" name = "remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                <label class = "remember"> Remember me </label>

            </div>

            <!-- Nút đăng nhập  -->
            <div>
                   <input type="submit" class="btn-login" value="Đăng nhập" name="btn-login">
            </div>
        
    </form>
</body>

	
</body>
</html>