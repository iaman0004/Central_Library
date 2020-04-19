<!-- Starting point of tha application -->
<?php
    session_start();
    if(!empty($_SESSION['user_id'])){
        header("location:./user.php");
    }
    else{
        header("location:./home.php");
    }
?>