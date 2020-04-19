<?php
    session_start();
    if(!empty($_SESSION['user_id'])){
        header("location:./index.php");
    }
    require_once "./connection.php";
?>
<html lang="en">
    <head>
        <title>Central Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <?php require 'nav.php' ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/770823d3d1.js"></script>
        <link rel="shortcut icon" href="assets/favicon.ico">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="home-body">
        <!-- section 1 -->
        <div class="container-fluid">
            <div class="row section-1">
                <div class="col-md-8 col-sm-12">
                    <div class="search-book">
                        <div class="header">
                            <h1>Looking for a book ? </h1>
                        </div>
                        <form class="search-bar-book" action="home.php" method="post">
                            <div class="form-group">
                              <input type="text" class="form-control" id="search" name="book_name" placeholder="Enter book name.." required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2" name="_search">Search</button>
                        </form>
                    </div>
                    <?php
                        require_once "./connection.php";
                        if(isset($_POST['_search'])){
                            $book = "%".trim($_REQUEST['book_name'])."%";
                            $find = "SELECT * FROM books WHERE book_name LIKE '$book'";
                            $res = $con->query($find);
                            if($res->num_rows > 0){
                                echo "<table align='center' border='2px'>";
                                echo "<tr><th>Book Name</th><th>Author Name</th><th>Section</th></tr>";
                                while($row = $res->fetch_assoc()){
                                    echo "<tr><td>".$row['book_name']."</td><td>".$row['book_author']."</td><td>".$row['book_section']."</td></tr>";
                                }
                                echo "</table>";
                            }
                            else{
                                echo "No book found";
                            }
                        }
                        $con->close();
                    ?>
                </div>
                <!-- Login Box -->
                <div class="col-md-4 col-sm-12 login-mod">
                    <div class="login-box">
                        <h1>Login Here</h1>
                        <div class="logo-CL">
                            <img class="img-fluid logo-login" src="assets/logo.jpg" alt="CentralLibrary">
                        </div>
                        <?php 
                            if(isset($_GET['_user'])){
                        ?>
                            <span style="color : red;">Invalid Credentials</span>
                        <?php
                            }
                        ?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control home-input" name="_email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control home-input" name="_password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="_login_now">Login</button>
                        </form>
                        <div class="new-user">
                            <a href="#resetPassword" data-toggle="modal" data-target="#resetPassword">Forget Password</a> |
                            <a href="registration.php">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-2">
                <div class="col-md-6 col-sm-12">
                    <ul class="footer-left">
                        <li class="foot-lt"><a href="#blog">Blog</a></li>
                        <li class="foot-lt"><a href="#support">Support</a></li>
                        <li class="foot-lt"><a href="#termsandservice">Terms of Services</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <ul class="social">
                        <li><a href="#facebook"><i class="fab fa-facebook-square"></i></i></a></li>
                        <li><a href="#instagram"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#googleplus"><i class="fab fa-google-plus-square"></i></a></li>
                        <li><a href="#twitter"><i class="fab fa-twitter-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Reset Passsword -->
        <!-- Modal -->
        <div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="resetPasswordLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Central Library | Reset Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="home.php" method="POST" id="pass-modal">
                    <div class="modal-body">
                            <div class="form-group">
                                Enter Your Email
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <input type="email" class="form-control" name="_email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                Select Sequrity Question
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <select class="form-control" id="security-question">
                                            <option>What is birth place?</option>
                                            <option>What is your pet name?</option>
                                            <option>Your favourite sports person?</option>
                                            <option>Your first school?</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                Enter Your Answer
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <input type="password" class="form-control" name="_seq_ans" placeholder="Security Answer" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                Enter New Password
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <input type="password" class="form-control" name="_newpassword" placeholder="Enter New Password" required>
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="_resetpassword" class="btn btn-danger">Change Password</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <?php 
            $conn = new mysqli("127.0.0.1:3307", "root", "", "central_lib");
            if($conn->connect_error){
                echo "<script>alert('Server Error, Kindly check Your Connection');</script>";
            }
            
            if(isset($_POST['_resetpassword'])){
                $rstsql = "SELECT * FROM users WHERE user_email = '".$_REQUEST['_email']."' AND user_seq_ans = '".$_REQUEST['_seq_ans']."'";
                $res = $conn->query($rstsql);
                if($res->num_rows == 1){
                    $rstsql = "UPDATE users SET user_password = '".$_REQUEST['_newpassword']."' WHERE user_email = '".$_REQUEST['_email']."'";
                    if($conn->query($rstsql) === true){
                        echo "<script>alert('Password Changed Successfully!')</script>";
                    }
                    else{
                        echo "<script>alert('Error updating Password!')</script>";
                    }
                }
                else{
                    echo "<script>alert('Invalid Credentials entered!')</script>";
                }
            }
            $conn->close();
        ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>