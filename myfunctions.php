<?php
    session_start();
    //database connection;
    $conn = mysqli_connect('localhost','root','','multi-login');

    //declare variables;
    $username ='';
    $email ='';
    $errors = array();

    //calling the register button when its clicked;
    if(isset($_POST['reg_btn'])){
        register();
    }

    //LOGIN USER
    if(isset($_POST['login_btn'])){
        login();
    }

    //RREGISTER FCTN
    function register(){
        //use global key word to make these variables available in other functions as well;
        global $conn,$errors,$username,$email;

        //recieve all values from form and escape them with e() function;
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

        //form validate:proper form filling
        if(empty($username)){
            array_push($errors, "Please provide a username!!");
        }

        if(empty($email)){
            array_push($errors, "Please provide an email address!!");
        }

        if(empty($password_1)){
            array_push($errors, "Please provide a password!!");
        }

        if($password_1 != $password_2){
            array_push($errors, "Password mismatch!!");
        }

        //register the user if all is okay
        if(count($errors)==0){
            //encrypt psswd first;
            $encrypt_password = md5($password_1);

            if(isset($_POST['user_type'])){
                $user_type = mysqli_real_escape_string($conn,$_POST['user_type']);
                $myquery = "INSERT INTO users (username,email,user_type,password) VALUES('$username','$email','$user_type','$encrypt_password')";
                mysqli_query($conn,$myquery);
                $_SESSION['success'] = 'New user created successfully';
                header('location: home.php');
            }else{
                $myquery = "INSERT INTO users(username,email,user_type,password) VALUES ('$username','$email','user','$encrypt_password')";
                mysqli_query($conn,$myquery);
                ///add more here

                //gets id of last inserted user
                $logged_in_user = mysqli_insert_id($conn);
                $_SESSION['user'] =getUserId($logged_in_user);
                $_SESSION['success'] ='You are now logged in';
                header('location: index.php');
            }
        }
    }

    //GET USER ARRAY FROM ARRAY
    function getUserId($id){
        global $conn;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $results = mysqli_query($conn,$query);

        $currentuser =mysqli_fetch_assoc($results);
        return $currentuser;
    }

    //LOGOUT USER
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user']);
        header('location: login.php');
    }

    function login(){
        global $conn, $username, $errors;

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password =mysqli_real_escape_string($conn, $_POST['password']);

        //formvalidation
        if(empty($username)){
            array_push($errors, "Please provide your user name");
        }

        if(empty($password)){
            array_push($errors, "Please provide your password");
        }

        if(count($errors) == 0){
            $password = md5($password);
            echo $password;

            $login_querry= "SELECT * FROM users WHERE username = '$username' AND password ='$password' LIMIT 1";
            $login_result = mysqli_query($conn, $login_querry);
            var_dump($login_result);

            if(mysqli_num_rows($login_result)==1){
                //we have found the user, so we check if he is a user or admin;
                $logged_in_user= mysqli_fetch_assoc($login_result);
                //echo $logged_in_user;
                if($logged_in_user['user_type']=='admin'){
                    //echo "administrator";
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['success'] = 'You are now logged in';
                    header('location: admin/home.php');
                }else{
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['success'] = 'You are now logged in';
                    header('location: index.php');
                }
            }else{
                array_push($errors, "Wrong username and/or password");
            }
        }
    }

    //LOGGED IN LOGIC
    function isLoggedIn(){
        if(isset($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }

    //IS ADMIN LOGIC
    function isAdmin(){
        if(isset($_SESSION['user']) && $_SESSION['user']['user_type']=='admin'){
            return true;
        }else{
            return false;
        }
    }

    //ERRORS DISPLAY
    function errorDisplay(){
        global $errors;

        if(count($errors)>0){
            echo '<div class ="errordiv">';
                foreach ($errors as $error) {
                    echo $error .'<br>';
                }
            echo '</div>';
        }
    }
?>
