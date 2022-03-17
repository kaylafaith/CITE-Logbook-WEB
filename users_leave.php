<?php
session_start();
include 'open_db.php';

if(isset($_SESSION['username'])){
$identity = $_SESSION['email'];
$statement ="SELECT * FROM tbl_leave WHERE email_address = '$identity'";  
$queresult = mysqli_query($con, $statement);  
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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
        <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/cssofuser.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style type="text/css">

.thumbnail{
  max-width: 200px;
}
.lightbox{
  display: none;
  position: fixed;
  z-index: 999;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0,0,0,.8);
}
  .lightbox img{
   max-width: 90%;
   max-width: 80%;
   margin-top: 2%;
}

.lightbox:target{
  outline: none;
  display: block;
}
</style>
  
  </head>
  <body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand font-bold" href="users_home.php">CITE Log-book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="users_home.php"><i class="fas fa-chart-line"></i>&nbsp;Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users_report.php"><i class="fas fa-print"></i>&nbsp;Report</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="users_leave.php"><i class="fas fa-briefcase"></i>&nbsp;Filing of Leave</a>
      </li>
   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
          <?php echo  'Hi, &nbsp;', $_SESSION['first_name'];?>
        </a>
         <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" href="users_settings.php">Change Password</a>
                            <a class="dropdown-item" href="logout.php?logout">Log out</a>
                        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
       <h1>LEAVE HISTORY</h1>
     <div class="row">
  <div class="col-lg-1"> 
    
  </div>

   <div class="col-lg-7">
    <br>
        <div class="table-responsive table-hover">  
                     <table id="user_leave" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>#</td>  
                                    <td>Date Uploaded</td>  
                                    <td>Time Uploaded</td>  
                                    <td>Start Date</td>  
                                    <td>End Date</td>  
                                    <td>Request</td>
                               </tr>  
                          </thead>  
                          <?php  

                          while($row = mysqli_fetch_array($queresult))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["leave_id"].'</td>  
                                    <td>'.$row["date_uploaded"].'</td>  
                                    <td>'.$row["time_uploaded"].'</td>  
                                    <td>'.$row["start_date"].'</td> 
                                    <td>'.$row["end_date"].'</td>  
                                     <td>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewRequest'.$row['leave_id'].'"><i class="fas fa-envelope"></i>&nbsp;View Request</button>
                                    </td>
                               </tr>  
                               '; include 'requestmodal.php';
                          }  
                          ?>  
                     </table>  
                </div>  
  </div>

<div class="col-lg-1">
</div>
 <div class="col-sm-2 profile" style="border: 1px solid black; padding: 2px; margin: 10px; margin-bottom: 10px; border-radius: 5px;">
        <h6 style="text-align: center;">PROFILE</h6>
        <div>
          <center><img style="width: 50%; height: auto;" src="images/teacher.png" class="profile"></center> <br>
          <center>
            <h4>CITE Instructor</h4>
            <?php echo $_SESSION['first_name']," ", $_SESSION['last_name']?><br>ID: <?php echo $_SESSION['username']?></center><br>
        </div>
        <div align="center">  
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">File a leave</button>
        </div>
        <br>
               <?php include 'fileleave_modal.php'; ?>
    </div>
</div>
  </div>   
</div>


    <!-- Optional JavaScript; choose one of the two! -->

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  </body>
</html>
 <script>  
 $(document).ready(function(){  
      $('#user_leave').DataTable();  
 });  
 </script>