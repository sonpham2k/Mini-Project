<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="web/css/login.css">
    <title>Đăng nhập</title>
</head>
<body>
        <?php 
            require_once 'app/controller/login_admins_controller.php';   
        ?>

    <div class="form__box">
        <div class="form__left">
            <div class="form__padding"><img class="form__image" src="image/logo-sun.png"/></div>
        </div>
        <div class="form__right">
            <div class="form__padding-right">
                <form action='' method='POST'>
                    <p class="form__title">Thành viên</p>

                    <!-- Tài khoản -->
                    <div class="form-group"> 
                        <div class="col-md-12"> 
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> <input name="user_id" placeholder="Username" class="form-control" type="text" > 
                            </div> 
                        </div> 
                    </div> 

                    <!-- Mật khâu -->
                    <div class="form-group"> 
                        <div class="col-md-12"> 
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> <input name="password" placeholder="Password" class="form-control" type="password"> 
                            </div> 
                        </div> 
                    </div> 
                    
                    <!-- Validate-->
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <span class="error"><?php echo $_SESSION['nameErr']; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <span class="error"><?php echo $_SESSION['passwordErr']; ?></span>
                        </div>
                    </div>

                   
                    <!--CheckBox-->
                    <div class="form-group">
                    <input type = "checkbox" class = "check" name = "remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                        <span>Remember me</span>
                    </div>

                    <!-- Đăng nhập -->
                    <input type="submit" name="btn-login" value="Đăng nhập" name="btn-login"/>


                </form>
            </div>
        </div>
    </div>
</body>
</html>