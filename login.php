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
            // session_start();
            
        ?>
    <form action='' method='POST'>
        
            <div>
                <label class="userid">Tên đăng nhập </label>
                <input type="text" class="userid-input" name="user_id" size="30" 
                value = "<?php if(isset($_COOKIE['user_login'])){
                            echo $_COOKIE['user_login'];
                        } ?>"
                />
                <?php setcookie("user", $_POST['user_id'], time()+(60*60*24*30)); ?>
            </div>

            <div>
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div>
                <label class="password">Mật khẩu </label>
                <input type="password" class="password-input" name="password" size="30" 
                value = "<?php  if(isset($_COOKIE['pass_login'])){
                            echo $_COOKIE['pass_login'];
                        } ?>"
                />
            </div>
            
            <div>
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>

            <div>
                <input type = "checkbox" class = "check" name = "remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                <label class = "remember"> Remember me </label>

            </div>
            <div>
                   <input type="submit" class="btn-login" value="Đăng nhập" name="btn-login">
            </div>
        
    </form>
</body>

	
</body>
</html>