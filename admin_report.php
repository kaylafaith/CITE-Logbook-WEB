 <?php  

 session_start();

if(isset($_SESSION['username'])){
include 'open_db.php';
$uid = $_SESSION['id'];
}
else{
  header("location:index.php");
}?> 
 


<!doctype html>
 <head>
  <!-- Required meta tags -->
   <title>Digital Log-book for CITE Department</title>
   <meta charset="utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" href="images/cite_logo.png">
<!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/cssofuser.css">

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
   <style type="text/css">
      tfoot {
    display: table-header-group;
}
   </style>
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
      <li class="nav-item">
        <a class="nav-link" href="admin_facultymanage.php"><i class="fas fa-users-cog"></i>&nbsp;Faculty Management</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="admin_leavemanage.php"><i class="fas fa-briefcase"></i>&nbsp;Leave Management</a>
      </li>
      <li class="nav-item active">
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
   <h1>ATTENDANCE REPORT</h1>
<br>
  <div class="container-fluid">
    <ul class="nav nav-tabs">
               <li class="nav-item">
                 <a class="nav-link active" href="admin_report.php">Records</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_freqlate.php">Frequent Late</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_freqabs.php">Frequent Absent</a>
               </li>
             </ul>
                <div class="table-responsive table-hover">  
                   <table id="example" class="display">
          <thead>
          <tr>
             <th>#</th>
             <th>Email Address</th>
             <th>School Year</th>
             <th>Semester</th>
             <th>Date</th>
             <th>Subject</th>
             <th>Time In</th>
             <th>Time</th>
             <th>Time Out</th>
             <th>Time</th>
          </tr>
        </thead>

         <tfoot>
            <tr>
             <th>#</th>
             <th>Email Address</th>
             <th>School Year</th>
             <th>Semester</th>
             <th>Date</th>
             <th>Subject</th>
             <th>Time In</th>
             <th>Time</th>
             <th>Time Out</th>
             <th>Time</th>
            </tr>
        </tfoot>
        <tbody>
           <?php  
            $query ="SELECT * FROM 
                  tbl_users
              INNER JOIN 
                  tbl_records
              ON
                  tbl_records.users_id=tbl_users.id";  
            $result = mysqli_query($con, $query);  
                    while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["schoolyear"].'</td>  
                                    <td>'.$row["semester"].'</td>
                                    <td>'.$row["dateToday"].'</td>
                                    <td>'.$row["subject"].'</td> 
                                    <td>'.$row["time_in"].'</td>
                                    <td>'.$row["current_in"].'</td>
                                    <td>'.$row["time_out"].'</td>
                                    <td>'.$row["current_out"].'</td>  
                                     
                               </tr>  
                               ';
                          }  
                          ?>  
        </tbody>
         
        </table>
                </div>  
              </div>
              <br><br>
           </div>  
    <!-- Optional JavaScript; choose one of the two! -->

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
 
 </body>
</html>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
      order: [[ 4, 'desc' ],[ 0, 'desc' ]],
      dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'REPORT'
        } ],
       exportOptions: {
          rows: ':visible'
        },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>


  