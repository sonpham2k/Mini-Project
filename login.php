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
            session_start();
            require 'app/controller/login_admins_controller.php';
        ?>
    <form action='' method='POST'>
        
            <div>
                <label class="userid">Tên đăng nhập </label>
                <input type="text" class="userid-input" name="user_id" size="30" />
            </div>

            <div>
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div>
                <label class="password">Mật khẩu </label>
                <input type="password" class="password-input" name="password" size="30" />
            </div>
            
            <div>
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>

            <div>
                   <input type="submit" class="btn-login" value="Đăng nhập" name="btn-login">
            </div>
        
    </form>
</body>

	
</body>
</html>