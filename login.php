<?php
    session_start();
    require_once "./connection.php";
    if(!empty($_SESSION['user_id'])){
        header("location:./user.php");
    }
    if(isset($_POST['_login_now'])){
        $username = trim($_REQUEST['_email']);
        $password = trim($_REQUEST['_password']);

        $login_sql = "SELECT user_id FROM users WHERE user_email = '$username' AND user_password = '$password'";
        $res = $con->query($login_sql);
        if($res->num_rows == 1){
            $row = $res->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            header("location:./user.php");
        }
        else{
            header("location:./home.php?_user=Invalid Credentials");
        }
    }
?>