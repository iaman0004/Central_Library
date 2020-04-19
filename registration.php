<html lang="en">
    <head>
        <title>Register-Central Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <?php require 'nav.php'?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="register_styles.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row section-1">
                <div class="col"></div>
                <div class="col-md-6 col-sm-12 box-signup">
                    <div class="sign-up-box">
                        <h1>Register Now!</h1>
                        <form action="registration.php" method="POST">
                            <div class="form-group">
                                Name
                                <div class="form-row">
                                    <div class="col-md-6 col-sm-10">
                                        <input type="text" class="form-control" name="_fname"placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 col-sm-10">
                                        <input type="text" class="form-control" name="_lname" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- <div class="form-group"> -->
                                    <div class="form-group col-md-6 col-sm-10">
                                        <label for="_dob_">Date of Birth</label>
                                        <input type="date" class="form-control" name="_dob" placeholder="DD/MM/YYY" id="_dob_" required>
                                    </div>
                                <!-- </div> -->
                                <div class="form-group col-md-6 col-sm-10">
                                    <label for="_gender_">Gender</label><br>
                                    <div class="form-check form-check-inline" id="_gender_">
                                        <input class="form-check-input" type="radio" name="_gender" value="M" required> Male
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="_gender" value="F" required> Female
                                      </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-10">
                                    <label for="_email_">Email</label>
                                    <input type="email" class="form-control" name="_email" id="_email_" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-10">
                                    <label for="_phone_">Phone</label>
                                    <input type="number" class="form-control" name="_phone" id="_phone_" placeholder="Enter 10 digit number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-10">
                                    <label for="_password_">Password</label>
                                    <input type="password" class="form-control" name="_fpassword" placeholder="Password" id="_password_" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-10">
                                    <label for="_cpassword_">Confirm Password</label>
                                    <input type="password" class="form-control" name="_cpassword" placeholder="Password" id="_cpassword_" required>
                                </div>
                            </div>
                            <label for="security-question">Security Question</label>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <select class="form-control" id="security-question">
                                        <option>What is birth place?</option>
                                        <option>What is your pet name?</option>
                                        <option>Your favourite sports person?</option>
                                        <option>Your first school?</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <input type="password" class="form-control" name="_sec_ans" placeholder="Answer" required>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="_tnc_" required>
                                <label class="custom-control-label" for="_tnc_">I agree on all <a target="_blank" href="condition/terms_conditions.html">Terms and Conditions</a></label>
                            </div>
                            <div class="form-group sign-up-btn">
                                <button type="submit" class="btn btn-danger"name="_signup">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <?php

            $server = "127.0.0.1:3307";
            $username = "root";
            $pswd = "";
            $DBname = "central_lib";

            $con = new mysqli($server, $username, $pswd, $DBname);
            if($con->connect_error){
                die("Server Error! Try after sometime");
            }

            if(isset($_POST['_signup'])){
                $_fname = trim($_REQUEST['_fname']);
                $_lname = trim($_REQUEST['_lname']);
                $_dob = date('Y-m-d', strtotime($_REQUEST['_dob']));
                if(isset($_POST['_gender'])){
                    $_gender = $_POST['_gender'];
                }
                $_email = trim($_REQUEST['_email']);
                $_phone = trim($_REQUEST['_phone']);
                $_fpassword = trim($_REQUEST['_fpassword']);
                $_cpassword = trim($_REQUEST['_cpassword']);
                $_sec_ans = trim($_REQUEST['_sec_ans']);

                $name = $_fname." ".$_lname;
                if($_fpassword === $_cpassword){
                    $enroll_num = rand(16000, 90000);
                    $enroll_id = "CLY".$enroll_num;
                    // for registration query
                    $sql = "INSERT INTO users(user_id, user_name, user_dob, user_gender, user_email, user_phone, user_password, user_seq_ans)
                    values('$enroll_id', '$name', '$_dob', '$_gender', '$_email', '$_phone', '$_fpassword', '$_sec_ans')";
                    echo "<script>";
                    if($con->query($sql) === true){
                        echo "alert('Congratulations! Registration Successfull! Login with your email and password.')";   
                    }
                    else{
                        echo "alert('Sorry! Registration falied!')";
                    }
                    echo "</script>";
                    header("location:./index.php");
                }
                else{
                    echo "<script>alert('Passwords does not match')</script>";
                }
                $con->close();
            }
        ?>

        <script>

            </script>
    </body>
</html>