<?php include('../myfunctions.php'); ?>
<?php
    if(!isAdmin()){
        $_SESSION['msg'] = 'You must login first';
        header('location: ../login.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user']);
        header('location: ../login.php');
    }

?>

<?php include("../header.php"); ?>
    <div class="heading">
        <h2 class="text-center">Admin- Home page</h2>
    </div>
    <div class="content">
        <!--message-->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                   <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?> 
                </h3>
            </div>
        <?php endif ?>
        <!--logged in info-->
        <div class="info">
            <?php if(isset($_SESSION['user'])): ?>
                <?php echo $_SESSION['user']['username']; ?>
                <small>
                    <i>(<?php echo $_SESSION['user']['user_type'];  ?>)</i>
                    <a href="home.php?logout='1' ">Logout</a>
                    &nbsp; <a href="make_user.php"> Add new user</a>
                </small>
            <?php endif ?>
        </div>
    </div>

<?php include ("../footer.php"); ?>