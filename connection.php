<?php
    $con = new mysqli("127.0.0.1:3307", "root", "", "central_lib");
    if($con->connect_error){
        die("Error Connecting database, Server not found");
    }
?>