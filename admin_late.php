 <?php  

 session_start();
include 'open_db.php';

if(isset($_SESSION['username'])){

}
else{
  header("location:index.php");
}?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/cite_logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/cssofadmin.css">
    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <title>Digital Log-book for CITE Department</title>
      <style type="text/css">
      table tbody {
        display: block;
        max-height: 300px;
        overflow-y: scroll;
      }

      table thead, table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
      }
       .center {
          margin: auto;
          width: 100%;
          padding: 10px;
        }
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand font-bold" href="admin_dash.php">CITE Log-book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
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
   <li class="nav-item dropdown">
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
  <h1>CITE DASHBOARD</h1>
          <!-- CARD VIEWS -->
    <div class="padded" align="center" style="margin: 3.5%">
      <div class="row center">
        
          <div class="card" style="width: 16rem;margin: 7px;">
      <div class="card-body" style="background: #F5F5DC;">
         <i class="fa fa-users fa-5x" aria-hidden="true"></i><br></br>
         <h5 style="color: #000000;">CITE FACULTY</h5>
                <div class="panel-footer"><!-- panel-footer begin -->
                       <?php
                         $usercount = mysqli_query($con, "SELECT * FROM tbl_users WHERE usertype = 'teacher'");
                         $count = mysqli_num_rows($usercount);
                         echo "<h2>".$count."</h2>";
                       ?>
                </div><!-- panel-footer finish -->
      </div>
  </div>

  <div class="card" style="width: 16rem;margin: 5px;">
      <div class="card-body" style="background: #32CD32;">
        <i class="fa fa-hourglass-start fa-5x" aria-hidden="true"></i><br></br>
         <h5 style="color: #000000;">ON TIME</h5>
         <a href="#"><!-- a href begin -->
                <div class="panel-footer">
                  <!-- panel-footer begin -->
               </div>
             </a>
           </div>
      </div>

  <div class="card" style="width: 16rem;margin: 5px;">
      <div class="card-body" style="background: #FF8C00;">
         <i class="fa fa-bell-slash fa-5x" aria-hidden="true"></i><br></br>
         <h5 style="color: #000000;">LATE</h5>
         <a href="#"><!-- a href begin -->
              <form method="post">
                <div class="panel-footer"><!-- panel-footer begin -->
                   <input type="text" id="txtFrom2" name="Fromdate2" placeholder="Search Records..">
                  <input type="submit" class="btn btn-info" id="search" name="Search2" value="Search">
                </div><!-- panel-footer finish -->
              </form>
            </a><!-- a href finish -->
      </div>
  </div>

  <div class="card" style="width: 16rem;margin: 5px;">
      <div class="card-body" style="background:#B22222 ;">
         <i class="fa fa-times-circle fa-5x" aria-hidden="true"></i><br></br>
         <h5 style="color: #000000;">ABSENT</h5>
         <a href="#"><!-- a href begin -->
                <div class="panel-footer">
                  <!-- panel-footer begin -->
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
      </div>
  </div>
    <div class="card" style="width: 16rem;margin: 5px;">
      <div class="card-body" style="background: #696969;">
         <i class="fa fa-envelope fa-5x" aria-hidden="true"></i><br></br>
         <h5 style="color: #000000;">ON LEAVE</h5>
         <a href="#"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
      </div> 
  </div>

      </div>
    </div>
<?php 

      date_default_timezone_set("Asia/Manila");
                function filterTable($queryres){
      include 'open_db.php';
                        $filter_results = mysqli_query($con,$queryres);
                        return $filter_results;
                    }
    if (isset($_POST["Search2"])){
      include 'open_db.php';
      $selecttxt2 = $_POST["Fromdate2"];
      $queryres = mysqli_query($con,"SELECT * FROM tbl_users INNER JOIN tbl_records ON tbl_records.users_id=tbl_users.id WHERE dateToday = '$selecttxt2' AND time_in = 'LATE'");

       $queryres = "SELECT * FROM tbl_users INNER JOIN tbl_records ON tbl_records.users_id=tbl_users.id WHERE CONCAT(dateToday) LIKE '%".$selecttxt2."%' AND time_in = 'LATE'";
      $search_result = filterTable($queryres);
    }
    else{

       $currentDate = date("d-m-Y");
       $queryres = "SELECT * FROM tbl_users INNER JOIN tbl_records ON tbl_records.users_id=tbl_users.id WHERE dateToday = '$currentDate' AND time_in = 'LATE'";
       $search_result = filterTable($queryres);

    }
                  ?>
                <div class="container">
                 <ul class="nav nav-tabs">
               <li class="nav-item">
                 <a class="nav-link" href="admin_dash.php">On-Time</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="admin_late.php">Late</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_absent.php">Absent</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_onleave.php">On-Leave</a>
               </li>
             </ul>
                <table class="table table-responsive-md table-striped table-hover table-scrollable">
                    <thead class="table-success">
                      <tr>
                        <th scope="col" style="text-align: center;">NAME</th>
                        <th scope="col" style="text-align: center;">SUBJECT</th>
                        <th scope="col" style="text-align: center;">SECTION</th>
                        <th scope="col" style="text-align: center;">TIME</th>
                        <th scope="col"style="text-align: center;">DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                  if(mysqli_num_rows($search_result) == '0'){?>
                    <td scope="col"></td>
                    <td scope="col"></td>
                    <td scope="col"><?php echo "<h2>NO RECORDS FOUND</h2>"?></td>
                    <td scope="col"></td>
                    <td scope="col"></td>
                    <?php
                  }
                  else{
                      while($row = mysqli_fetch_assoc($search_result)){
                    ?>
                      <tr>
                        <td scope="col"><?php echo $row['first_name']." ".$row['last_name'];?></td>
                        <td scope="col"><?php echo $row['subject'];?></td>
                        <td scope="col"><?php echo $row['section'];?></td>
                        <td scope="col"><?php echo $row['current_in'];?></td>
                        <td scope="col"><?php echo $row['dateToday'];?></td>
                      </tr>
                  <?php
                        }
                      }
               ?>
             </tbody>
           </table>
         </div>
<!-- END OF CARD VIEWS -->
    
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(function()
  {
    $("#txtFrom2").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  });
</script>