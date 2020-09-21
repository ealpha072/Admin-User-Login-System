<?php  include("myfunctions.php"); ?>
<?php  include("header.php"); ?>

        <div class="form-holder">
            <form method="POST" action="register.php">
                <?php echo errorDisplay(); ?>
                <div class="form-group">
                    <label for="uername">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?> ">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password_1">
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="password_2">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type ="submit" class="btn btn-primary btn-block" name="reg_btn"><i class="fa fa-paper-plane"></i> Register</button>
            </form>
            <p>Already a member?<a href="login.php"> Login</a></p>
        </div>
<?php include("footer.php"); ?>
