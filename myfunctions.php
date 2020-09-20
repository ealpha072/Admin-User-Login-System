<?php
    session_start();

    //database connection;
    $conn =mysqli_connect('localhost','root','','multi-login');

    //declare variables;
    $username ='';
    $email ='';
    $errors = array();

    //calling the register button when its clicked;
    if(isset($_POST['reg_btn'])){
        register();
    }

    function register(){
        //use global key word to make these variables available in other functions as well;
        global $conn,$errors,$username,$email;

        //recieve all values from form and escape them with e() function;
        $username = e($_POST['username']);
        $email = e($_POST['email']);
        $password_1 = e($_POST['password1']);
        $password_2 = e($_POST['password2']);
        //form validate:proper form filling
        if(empty($username)){
            array_push($errors, "Please provide a username!!");
        }
        if(empty($mail)){
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
                $user_type = e($_POST['user_type']);
                $myquery = "INSERT INTO users (username,email,user_type,password) VALUES("$username","$email","$user_type","$encrypt_password")";
                mysqli_query($connection,$myquery);
                $_SESSION['success'] = 'New user created successfully';
                header('location: home.php');
            }else{
                $myquery = "INSERT INTO users(username,email,user_type,password) VALUES ("$username","$email","$user","$encrypt_password")";
                mysqli_query($connection,$myquery);
                ///add more here


            }
        }
    }
    //returns user array from id
    function getUserId($id){
        global $connection;
        $query = "SELECT * FROM users WHERE id=" . $id
        $results = mysqli_query($connection,$query);

        $currentuser =mysqli_fetch_assoc($results);
        return $currentuser;
    }

    ///escapping function;
    function e($val){
        global $connection;
        return mysqli_real_escape_string($connection,trim($val))
    }

    function errorDisplay(){
        
    }

  ?>
