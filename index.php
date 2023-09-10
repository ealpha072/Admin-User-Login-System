<?php include('myfunctions.php'); 
    if(!isLoggedIn()){
        $_SESSION['msg'] = 'You must be logged in first';
        header('location: register.php');
    }
?>

<?php include("header.php"); ?>

        <div class="home-header">
            <h3 class="text-center">Home page</h3>
        </div>
        <div class="content">
            <!--notifiation message-->
            <?php if (isset($_SESSION['success'])):  ?>
                <div>
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                          ?>
                    </h3>
                </div>
            <?php endif ?>
            <div>
                <?php if(isset($_SESSION['user'])):  ?>
                    <?php echo $_SESSION['user']['username'];  ?>
                    <small>
                        <i>(<?php echo ($_SESSION['user']['user_type']);  ?>)<br>
                        <a href="index.php?logout='1'">Logout</a>
                    </small>
                <?php endif ?>
            </div>
        </div>
<?php include("footer.php"); ?>
