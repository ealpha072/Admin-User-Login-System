<?php include('../myfunctions.php'); ?>
<?php include("../header.php"); ?>
    <div class="mainHolder">
        <div class="heading">
            <h2 class="text-center">Admin - Create new user</h2>
        </div>
        <form method="POST" action="make_user.php">
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
                <label>User type</label>
                <select name="user_type" id="user_type" class="form-control">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="confirm">Password</label>
                <input type="password" class="form-control" name="password_1">
            </div>
            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" class="form-control" name="password_2">
            </div>
            <button type ="submit" class="btn btn-primary btn-block" name="reg_btn"><i class="fa fa-paper-plane"></i> Add User</button>
        </form>
    </div>

<?php include("../footer.php");  ?>
