<?php
session_start();
include 'open_db.php';

if(isset($_SESSION['username'])){
   $username = $_SESSION['username'];
  if($username){
    if(isset($_POST['change'])){
      include 'open_db.php';
      $current_pass= mysqli_escape_string($con, $_POST['current_pass']);
      $new_pass = mysqli_escape_string($con, $_POST['psw']);
      $hash_password = password_hash($new_pass, PASSWORD_DEFAULT);
      //connect db


      $queryget = mysqli_query($con,"SELECT password FROM tbl_users WHERE username = '$username'" ) or die (mysqli_error());
      $row = mysqli_fetch_assoc($queryget);
      $oldpassword = $row['password'];
      $current_hash = password_verify($current_pass, $oldpassword);

      //check pass

      if($current_pass == $current_hash){
        $querychange = mysqli_query($con,"UPDATE tbl_users SET password ='$hash_password' WHERE username = '$username'");
          if($querychange){
          echo '<script>
              setTimeout(function() {
                  swal({
                      title: "",
                      text: "Password has been successfully changed!",
                      icon: "success"
                  }).then(function() {
                      window.location = "admin_settings.php";
                  });
              }, 1000);
          </script>';
          }
          
      }
      else{
        echo '<script>
        setTimeout(function() {
            swal({
                title: "",
                text: "Old Password! Please Try Again..",
                icon: "error"
            }).then(function() {
                window.location = "admin_settings.php";
            });
        }, 1000);
    </script>';
      }

    }
  }
  }
 else{
       header("location:index.php");
        }

?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <title>Digital Log-book for CITE Department</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/cite_logo.png">
 <!-- scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/settingadmin.css">

  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand font-bold" href="admin_dash.php">CITE Log-book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="admin_dash.php"><i class="fas fa-chart-line"></i>&nbsp;Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_facultysched.php"><i class="fas fa-calendar"></i>&nbsp;Faculty Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_facultymanage.php"><i class="fas fa-users-cog"></i>&nbsp;Faculty Management</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="admin_leavemanage.php"><i class="fas fa-briefcase"></i>&nbsp;Leave Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_report.php"><i class="fas fa-print"></i>&nbsp;Report</a>
      </li>
   <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
          <?php echo  'Hi, &nbsp;', $_SESSION['first_name'];?>
        </a>
         <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" href="admin_settings.php">Change Password</a>
                            <a class="dropdown-item" href="logout.php?logout">Log out</a>
                        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
    <?php echo "<h1>ADMIN SETTINGS</h1>"; ?>
  <div class="container">
                  
                  <form method="POST" class="signup-form"> 
                    <div class="form-header">
                      <h1>Change Password</h1>
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                      <label>Current Password</label>
                      <input type="password" name="current_pass" class="form-control">    
                    </div>
                    <div class="form-group">
                      <label>New Password</label>
                        <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control">   
                    </div>
                    <div id="message">
                      <h6>Password must contain the following:</h6>
                      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                      <p id="number" class="invalid">A <b>number</b></p>
                      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    <br>
                      <div class="form-group" align="center">
                        <input class="btn btn-primary" type="submit" name="change" value ="Save Changes"> 
                      </div>
                      </div>
                  </form>
                
          </div>
          <div>

    <!-- Optional JavaScript; choose one of the two! -->

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>