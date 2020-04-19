<?php
  session_start();
  // $_SESSION['user_id'] = "CLY31212";
  require_once "./connection.php";
  if(!empty($_SESSION['user_id'])){
    $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();
  }
  else{
    header("location:./home.php");
  }
  if(isset($_POST['_logout'])){
    $_SESSION['user_id'] = "";
    session_destroy();
    header("location:./home.php");
  }
?>
<html lang="en">
    <head>
        <title>
            <?php
                echo $row['user_name'];
            ?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <?php include 'nav.php';?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="user_section.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active nav-left" id="v-pills-books-tab" data-toggle="pill" href="#v-pills-books" role="tab" aria-controls="v-pills-books" aria-selected="true">Books</a>
                    <a class="nav-link nav-left" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">History</a>
                    <a class="nav-link nav-left" id="v-pills-membership-tab" data-toggle="pill" href="#v-pills-membership" role="tab" aria-controls="v-pills-membership" aria-selected="false">Membership</a>
                    <a class="nav-link nav-left" id="v-pills-change-password-tab" data-toggle="pill" href="#v-pills-change-password" role="tab" aria-controls="v-pills-change-password" aria-selected="false">Change Password</a>
                    <a class="nav-link nav-left" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-logout" aria-selected="false">Logout</a>
                  </div>
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="tab-content" id="v-pills-tabContent">
                    <!-- Book issue and book search -->
                    <div class="tab-pane fade show active" id="v-pills-books" role="tabpanel" aria-labelledby="v-pills-books-tab">
                      <div class="search-book">
                          <div class="header">
                              <h1>Looking for a book ? </h1>
                          </div>
                          <form class="search-bar-book" action="user.php" method="post">
                              <div class="form-group">
                                <input type="text" class="form-control" name="book_name" placeholder="Enter book name.." required>
                              </div>
                              <button type="submit" class="btn btn-danger mb-2" name="_search">Search</button>
                          </form>
                          <?php 
                            if(isset($_POST['_search'])){
                              $book = "%".trim($_REQUEST['book_name'])."%";
                              $find = "SELECT * FROM books WHERE book_name LIKE '$book'";
                              $res = $con->query($find);
                              if($res->num_rows > 0){
                                  echo "<table border='2px'>";
                                  echo "<tr><th>Check</th><th>Book Id</th><th>Book Name</th><th>Author Name</th><th>Section</th></tr>";
                                  echo "<form method='post' action='user.php'>";
                                  while($roow = $res->fetch_assoc()){
                                      echo "<tr><td><input type='radio' name='_book' value='".$roow['book_id']."' required></td><td>".$roow['book_id']."</td><td> ".$roow['book_name']."</td><td>".$roow['book_author']."</td><td>".$roow['book_section']."</td></tr>";
                                  }
                                  echo "</table>";
                                  echo "<button type='submit' class='btn btn-danger' name='_book_now'>Issue Book</button>";
                                  echo "</form>";
                              }
                              else{
                                  echo "No book found";
                              }
                            }
                            if(isset($_POST['_book_now'])){
                              if(isset($_POST['_book'])){
                                $id = $_POST['_book'];
                              }
                              $issued = "INSERT INTO booked_history(book_id, user_id) VALUES('$id', '".$_SESSION['user_id']."')";
                              if($con->query($issued) === true){
                                echo "Book Issued Successfully";
                              }
                              else{
                                echo "Failed to issue the book";
                              }
                            }
                          ?>
                      </div>
                    </div>
                    <!-- Membership -->
                    <div class="tab-pane fade" id="v-pills-membership" role="tabpanel" aria-labelledby="v-pills-membership-tab">
                      All books are free from the Government of India.
                    </div>
                    <!-- History -->
                    <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                    <?php
                        $his = "SELECT * FROM booked_history where user_id = '".$_SESSION['user_id']."'";
                        $res = $con->query($his);
                        
                        echo "<table align='center' border='2px'>";
                        echo "<tr><th>Bood Id</th><th>Issued Date</th><th>Returned Date</th></tr>";
                        if($res->num_rows > 0){
                          while($brow = $res->fetch_assoc()){
                            echo "<tr><td>".$brow['book_id']."</td><td>".$brow['issued']."</td><td>".$brow['returned']."</td></tr>";
                          }
                        }
                        else{
                          echo "No history found";
                        }
                        echo "</table>";
                      ?>
                    </div>

                    <!-- Password Update -->
                    <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel" 
                    aria-labelledby="v-pills-change-password-tab">
                      <div class="upd-password">
                        <form method="POST" action="user.php">
                          <div class="form-group">
                            <div class="form-group">
                              <label for="new_password1">Enter New Password</label>
                              <div class="form-row">
                                  <div class="col-md-8 col-sm-12">
                                    <input type="password" class="form-control" name="new_password1" placeholder="New Password" required>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="new_password2">Confirm New Password</label>
                              <div class="form-row">
                                  <div class="col-md-8 col-sm-12">
                                    <input type="password" class="form-control" name="new_password2" placeholder="New Password" required>
                                  </div>
                              </div>
                            </div>
                            <div class="_update_pass">
                              <button type="submit" name="_upd_pswd" class="btn btn-danger">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <?php
                        if(isset($_POST['_upd_pswd'])){
                          if($_REQUEST['new_password1'] === $_REQUEST['new_password2']){
                            $upd = "UPDATE users SET user_password = '".$_REQUEST['new_password1']."' WHERE user_id = '".$_SESSION['user_id']."'";
                            if($con->query($upd) === true){
                              echo "Password Updated Successfully";
                            }
                            else{
                              echo "Password Updation Failed";
                            }
                          }
                          else{
                            echo "Password doesn't match";
                          }
                        }
                      ?>
                    </div>
                    <!-- Logout Request -->
                    <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
                      <div class="row logout">
                        <form method="post" action="user.php">
                          <h1> Happy Reading</h1>
                          <h2>Do you want to logout?<h2>
                          <button type="submit" class="btn btn-danger" name="_logout">Logout</button>
                        </form>
                      </div>
                    </div>

                  </div>
                  </div>
                <div class="col-md-3" id="section-3">
                    <div class="user-account">
                      <div class="row user-id">
                        <div class="col-12">
                          <h1>Welcome</h1>
                        </div>
                        </div>    
                        <div class="row user-id">
                          <div class="col-12">
                            <?php echo "<h1>".$row['user_id']."</h1>"; ?>
                          </div>
                        </div>
                        <div class="row user-pic">
                            <div class="col-12">
                              <div class="user-picture">
                                <?php echo "<h1>".$row['user_name'][0]."</br>";?>
                              </div>
                            </div>
                        </div>
                        <div class="row user-name">
                          <div class="col-12">
                            <?php echo "<h2>".$row['user_name']."</h2>";?>  
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>