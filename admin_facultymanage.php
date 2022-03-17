 <?php  

 session_start();

include 'open_db.php';
if(isset($_SESSION['username'])){

 $query ="SELECT * FROM tbl_users WHERE usertype = 'teacher'";  
 $result = mysqli_query($con, $query);  
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/cssofadmin.css">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    
    <title>Digital Log-book for CITE Department</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="admin_dash.php">CITE Log-book</a>
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
      <li class="nav-item active">
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
                <h1>CITE FACULTY MANAGEMENT</h1>  
                <br />  

                 <div style="padding: 10px;">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#users_modal"> <i class="fas fa-user-plus"></i> Create User</button>
  </div>

  <!-- CREATE USER MODAL BOX -->
      <div class="modal fade" role="dialog" id="users_modal">
        <div class="modal-dialog">
          <div class="modal-content"> 
            <!-- HEADER -->
            <div class="modal-header" style="background: #245E36;">
                      <h2 class="modal-title" style="font-family: sans-serif;color: white;">Create User</h2>
                       <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="color: white;"></i></button>
              </div>
            <!-- END OF HEADER -->

            <!-- BODY -->
            <p style="padding: 5px;color: black;" align="center">Fill out this form to add Faculty Teachers</p>
            <div class="modal-body">
              <form action="create_user.php" method="post">
              <div class="form-group">
                        <label>User Type</label>
                       <select class="form-control" name="usertype">
                        <option value="admin" name="usertype" id="usertype">Admin</option>
                        <option value="teacher" name="usertype" id="usertype">Teacher</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Faculty ID</label>
                      <input style="border-color: gray;" type="text" class="form-control" name="username" id="username" required="required">
                  </div>
                   <div class="form-group">
                      <label>Email Address</label>
                      <input style="border-color: gray;" type="Email" class="form-control" name="email" id="email" required="required">
                  </div>
                  <div class="form-group">
                      <label>First Name</label>
                      <input style="border-color: gray;" type="text" class="form-control" name="first_name" id="first_name" required="required">
                  </div>
                  <div class="form-group">
                      <label>Last Name</label>
                      <input style="border-color: gray;" type="text" class="form-control" name="last_name" id="last_name" required="required">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="button btn-success btn-block btn-lg" id="addUser" name="adduser" >Add User</button>
                  </div> 
              </form> 
            </div>
            <!-- END OF BODY -->
          </div>
            </div>
          </div>
          <!-- END MODAL OF CREATE USER -->
          <div class="container">
                <div class="table-responsive table-hover">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>#</td>  
                                    <td>Faculty ID</td>  
                                    <td>Email Address</td>  
                                    <td>Full Name</td>  
                                    <td>Action</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["username"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["first_name"].' '.$row["last_name"].'</td>  
                                    <td>
                                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal'.$row['id'].'"><i class="fas fa-user-edit"></i>&nbsp;Edit User</button>
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal'.$row['id'].'"><i class="fas fa-user-minus"></i>&nbsp;Delete User</button>
                                    </td>
                               </tr>  
                               '; include 'modals.php'; 
                          }  
                          ?>  
                     </table>  
                </div>  
              </div>
           </div>  
<br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


  </body>
</html>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>
