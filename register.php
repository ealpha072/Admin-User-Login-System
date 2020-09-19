<?php  include("myfunctions.php")?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin-User System</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <div class="container">
        <div class="form-holder">
            <form role ="form" method="POST" action="register.php">

                <div class="form-group">
                    <label for="uername">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username;?> ">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password1">
                </div>
                <div class="form-group">
                    <label for="confirm password">Confirm Password</label>
                    <input type="password" name="" class="form-control" name="password2">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type ="submit" class="btn btn-primary btn-block" name="reg_btn"><i class="fa fa-paper-plane"></i> Register</button>
            </form>
            <p>Already a member?<a href=""> Login</a></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
</body>
</html>
