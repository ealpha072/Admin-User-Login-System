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

    function register(){
        //use global key word to make these variables available in other functions as well;
        global $conn,$errors,$username,$email;


        //recieve all values from form and escape them with e() function;
        
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2 = $_POST['password_2'];

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
            $encrypt_password = md5($password);

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
    //returns user array from id
    function getUserId($id){
        global $conn;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $results = mysqli_query($conn,$query);

        $currentuser =mysqli_fetch_assoc($results);
        return $currentuser;
    }

    ///escapping function;

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
