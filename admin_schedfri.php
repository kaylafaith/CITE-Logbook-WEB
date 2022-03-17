<?php  

session_start();
include 'open_db.php';

if(isset($_SESSION['username'])){
}
else{
 header("location:index.php");
}
?>  
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
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
     <li class="nav-item active">
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
               <h1>CITE FACULTY SCHEDULE</h1>  
               <br />  
             <div class="container">
             <ul class="nav nav-tabs">
               <li class="nav-item">
                 <a class="nav-link" href="admin_facultysched.php">Monday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_schedtue.php">Tuesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_schedwed.php">Wednesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_schedthurs.php">Thursday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="admin_schedfri.php">Friday</a>
               </li>
             </ul>
             <br>
               <div class="table-responsive">  
                    <table id="employee_data" class="table table-striped table-bordered table-hover">  
                         <thead>  
                              <tr>  
                                   <td>#</td>  
                                   <td>Email Address</td>  
                                   <td>Name</td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <!-- first -->
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <!-- second -->
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                    <!-- third -->
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                    <!-- fourth -->
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td style="display: none"></td>
                                   <td>Action</td>  
                              </tr>  
                         </thead>
                         <tbody>
                     <?php
                    // wag mo na baguhin to, or if sure ka na may mali dito ibahin mo.
                    $query = "SELECT * FROM tbl_frisched ";
                    $result = mysqli_query($con, $query);
                    if($result){
                        $index = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['email']; ?></td>
                             <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                             <td style="display: none"><?php echo $row['school_year']; ?></td>
                             <td style="display: none"><?php echo $row['semester']; ?></td>
                             <td style="display: none"><?php echo $row['year17']; ?></td>
                             <td style="display: none"><?php echo $row['section17']; ?></td>
                             <td style="display: none"><?php echo $row['subject17']; ?></td>
                             <td style="display: none"><?php echo $row['starttime17']; ?></td>
                             <td style="display: none"><?php echo $row['endtime17']; ?></td>
                             <td style="display: none"><?php echo $row['year18']; ?></td>
                             <td style="display: none"><?php echo $row['section18']; ?></td>
                             <td style="display: none"><?php echo $row['subject18']; ?></td>
                             <td style="display: none"><?php echo $row['starttime18']; ?></td>
                             <td style="display: none"><?php echo $row['endtime18']; ?></td>
                             <td style="display: none"><?php echo $row['year18']; ?></td>
                             <td style="display: none"><?php echo $row['section19']; ?></td>
                             <td style="display: none"><?php echo $row['subject19']; ?></td>
                             <td style="display: none"><?php echo $row['starttime19']; ?></td>
                             <td style="display: none"><?php echo $row['endtime19']; ?></td>
                             <td style="display: none"><?php echo $row['year20']; ?></td>
                             <td style="display: none"><?php echo $row['section20']; ?></td>
                             <td style="display: none"><?php echo $row['subject20']; ?></td>
                             <td style="display: none"><?php echo $row['starttime20']; ?></td>
                             <td style="display: none"><?php echo $row['endtime20']; ?></td>

                             <td>
                             <button class="btn btn-info editbtn" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#schedmodal">Edit Schedule</button>
                             
                            </td>
                             </tr>
                            <?php
                            include 'friday_sched.php';
                            $index++;
                         }
                    }
                    ?>

                          </tbody>  
                         
                    </table>  
               </div>
               </div>  
          </div>  

          <!-- EDIT SCHEDULE MODAL BOX -->
  <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="schedmodal">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <!-- HEADER -->
            <div class="modal-header" style="background: #245E36;">
                      <h3 class="modal-title" style="font-family: sans-serif;color: white;">Edit Schedule</h3>
                      <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="color: white;"></i></button>
              </div>
            <!-- END OF HEADER -->

  <!-- BODY -->
            <p style="padding: 5px;color: black;" align="center">Fill out this form to edit schedule for teacher</p>
            <div class="modal-body">
              <form method="post">
                    <input type="hidden" name="uID" id="editID">
                <div class="form-group">
                  <label>School Year</label>
                  <input class="form-control" id="year_school" type="text" name="school_year" placeholder="School Year">
                </div>
                <div class="form-group">
                  <label>Select Semester</label>
                    <select name="semester" class="semester form-control" id="semesterSelection">
                      <option selected="selected">Select Semester</option>
                      <?php
                      include 'open_db.php';
                      $sql = mysqli_query($con, "select * from tbl_semester");
                      while ($row = mysqli_fetch_array($sql)) {
                          ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['semester']; ?>
                          </option>
                          <?php
                      }
                      ?>
                    </select>
                </div>
                <!-- FRODAY -->
                  <h2>Friday</h2>
                  <h5>AM</h5>
                  <?php echo "<b>First AM Subject</b>" ?>
                  <!-- first subject --><hr>
                   <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year17" class="yearlevel17 form-control" id="yLevel17">
                      <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section17" id="sect17" class="form-control">
                        <option value=""></option>
                        <option value="Block-1">Block-1</option>
                        <option value="Block-2">Block-2</option>
                        <option value="Block-3">Block-3</option>
                        <option value="Block-4">Block-4</option>
                        <option value="Block-5">Block-5</option>
                        <option value="Block-6">Block-6</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Subject</label>
                    <select name="subject17" class="subject17 form-control" id="sub17">
                        <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                        <input id="stime17" type="text" name="starttime17" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime17" name="endtime17" class="form-control">
                  </div>
                  <!-- end of first subect -->
                  <?php echo "<b>Second AM Subject</b>" ?>
                  <!-- second subject --><hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year18" class="yearlevel18 form-control" id="yLevel18">
                        <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section18" id="sect18" class="form-control">
                        <option value=""></option>
                        <option value="Block-1">Block-1</option>
                        <option value="Block-2">Block-2</option>
                        <option value="Block-3">Block-3</option>
                        <option value="Block-4">Block-4</option>
                        <option value="Block-5">Block-5</option>
                        <option value="Block-6">Block-6</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Subject</label>
                    <select name="subject18" class="subject18 form-control" id="sub18">
                     <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime18" name="starttime18" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime18" name="endtime18" class="form-control">
                  </div>
                  <!-- end of second subject -->

                  <h5>PM</h5>

                   <!-- third subject -->
                   <?php echo "<b>First PM Subject</b>" ?><hr>
                  <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year19" class="yearlevel19 form-control" id="yLevel19">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>

                  <div class = "form-group">
                    <label>Select Block</label>
                    <select name="section19" id="sect19" class="form-control">
                        <option value=""></option>
                        <option value="Block-1">Block-1</option>
                        <option value="Block-2">Block-2</option>
                        <option value="Block-3">Block-3</option>
                        <option value="Block-4">Block-4</option>
                        <option value="Block-5">Block-5</option>
                        <option value="Block-6">Block-6</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Subject</label>
                    <select name="subject19" class="subject19 form-control" id="sub19">
                        <option value="">Select Subject</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime19" name="starttime19" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime19" name="endtime19" class="form-control">
                  </div>
                  <!-- end of third subject -->

                   <!-- fourth subject -->
                   <?php echo "<b>Second PM Subject</b>" ?>
                   <hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year20" class="yearlevel20 form-control" id="yLevel20">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section20" id="sect20" class="form-control">
                        <option value=""></option>
                        <option value="Block-1">Block-1</option>
                        <option value="Block-2">Block-2</option>
                        <option value="Block-3">Block-3</option>
                        <option value="Block-4">Block-4</option>
                        <option value="Block-5">Block-5</option>
                        <option value="Block-6">Block-6</option>
                    </select>
                    </div>
                  <div class="form-group">
                    <label>Subject</label>
                   <select name="subject20" class="subject20 form-control" id="sub20">
                        <option value="">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime20" id name="starttime20" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime20" name="endtime20" class="form-control">
                  </div>
                  <!-- end of fourth subject -->

                  <!-- END OF MONDAY -->
                 


                  <?php
                  $sql1 = "SELECT * FROM tbl_frisched";
                  if ($query2 = mysqli_query($con, $sql1)) {
                      if ($rowers = mysqli_fetch_assoc($query2)) {
                        echo "<button class='btn btn-info saveBut2 form-control' id='savebtn'>Save Edit</button>";
                      ?>
                      <!-- di nya maget yung id na button sa table -->
                         <input type="hidden" class="userid" id="getusersid" value="<?php echo $rowers['id'];?>">


                      <?php
                      } else {
                          echo "error";
                      }
                  }
                  ?>
              </form>
            </div>
            <!-- END OF BODY -->
          </div>
            </div>
          </div>
          <!-- END MODAL OF UPDATE SCHED USER -->
 

<br><br>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="js/timepicki.js"></script>

<script>  
$(document).ready(function(){  
     $('#employee_data').DataTable();  
});  
</script>
<script>
  $('#stime17').timepicki();
  $('#etime17').timepicki();
  $('#stime18').timepicki();
  $('#etime18').timepicki();
  $('#stime19').timepicki();
  $('#etime19').timepicki();
  $('#stime20').timepicki();
  $('#etime20').timepicki();
</script>
<script>
     $(document).ready(function()
     {
       $(".semester").change(function(){
         var semester_id = $(this).val();
         /*alert(semester_selection);*/
         $.ajax({
           url:"thursday_sched.php",
           method: "POST",
           data:{semester_id:semester_id},
           success:function(data){
             $(".yearlevel17").html(data);
             $(".yearlevel18").html(data);
             $(".yearlevel19").html(data);
             $(".yearlevel20").html(data);
           }
         });
       });
     });
</script>
<script>
 $(".yearlevel17").change(function(){
         var s_semester_id17 = $(".semester").val();
         var year_id17 = $(this).val();
         $.ajax({
           url:"friday_sched.php",
           method: "post",
           data:{s_semester_id17:s_semester_id17,year_id17:year_id17},
           success:function(data){
             $(".subject17").html(data);
           }
         });
       });
</script>
<script>
$(".yearlevel18").change(function(){
         var s_semester_id18 = $(".semester").val();
         var year_id18 = $(this).val();
         $.ajax({
           url:"friday_sched.php",
           method: "POST",
           data:{s_semester_id18:s_semester_id18,year_id18:year_id18},
           success:function(data){
             $(".subject18").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel19").change(function(){
         var s_semester_id19 = $(".semester").val();
         var year_id19 = $(this).val();
         $.ajax({
           url:"friday_sched.php",
           method: "POST",
           data:{s_semester_id19:s_semester_id19,year_id19:year_id19},
           success:function(data){
             $(".subject19").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel20").change(function(){
         var s_semester_id20 = $(".semester").val();
         var year_id20 = $(this).val();
         $.ajax({
           url:"friday_sched.php",
           method: "POST",
           data:{s_semester_id20:s_semester_id20,year_id20:year_id20},
           success:function(data){
             $(".subject20").html(data);
           }
         });
       });
</script>
<script>
 $(function(){
       $(document).on('click','.saveBut2',function(e){
         e.preventDefault();
         var syear = $("#year_school").val();
         var selectedSem = $("#semesterSelection :selected").text();
         var year17Sel = $("#yLevel17 :selected").text();
         var sect17Sel = $("#sect17 :selected").text();
         var sub17Sel = $("#sub17 :selected").text();
         var start17 = $("#stime17").val();
         var end17 = $("#etime17").val();

         var year18Sel = $("#yLevel18 :selected").text();
         var sect18Sel = $("#sect18 :selected").text();
         var sub18Sel = $("#sub18 :selected").text();
         var start18 = $("#stime18").val();
         var end18 = $("#etime18").val();

         var year19Sel = $("#yLevel19 :selected").text();
         var sect19Sel = $("#sect19 :selected").text();
         var sub19Sel = $("#sub19 :selected").text();
         var start19 = $("#stime19").val();
         var end19 = $("#etime19").val();

         var year20Sel = $("#yLevel20 :selected").text();
         var sect20Sel = $("#sect20 :selected").text();
         var sub20Sel = $("#sub20 :selected").text();
         var start20 = $("#stime20").val();
         var end20 = $("#etime20").val();

         var user_id = $('#getusersid').val();
         $.ajax({
            url:"sched_frifunc.php",
            method:"post",
            data:{
              user_id:user_id,
              syear:syear,
              selectedSem:selectedSem,
              year17Sel:year17Sel,
              sect17Sel:sect17Sel,
              sub17Sel:sub17Sel,
              start17:start17,
              end17:end17,
              year18Sel:year18Sel,
              sect18Sel:sect18Sel,
              sub18Sel:sub18Sel,
              start18:start18,
              end18:end18,
              year19Sel:year19Sel,
              sect19Sel:sect19Sel,
              sub19Sel:sub19Sel,
              start19:start19,
              end19:end19,
              year20Sel:year20Sel,
              sect20Sel:sect20Sel,
              sub20Sel:sub20Sel,
              start20:start20,
              end20:end20
            },
            success:function(data){
              <?php echo 
              '
           swal({
            title: "Completed!",
            text: "You have successfully updated the schedule!",
            icon: "success",
          });
              ';?>
            
            },
            error: function(err){
              <?php echo 
                ' 
                swal({
                title: "Failed!",
                text: "You have encountered an error! Please try again..",
                icon: "error",
              });
                ';?>
            }
         });
       });
     });
</script>
 <script>
    $(document).ready(function (){
      $('.editbtn').on('click',function(){
        $('#schedmodal').modal('show');
          $tr = $(this).closest('tr');
        var data1 = $tr.children('td').map(function(){
          return $(this).text();
        }).get();

        console.log(data1);

        $('#editID').val(data1[0]);
        $('#getusersid').val(data1[0]);
        $('#year_school').val(data1[3]);
        $('#semesterSelection').find(":selected").text(data1[4]);
        $('#yLevel17').find(":selected").html(data1[5]);
        $('#sect17').find(":selected").text(data1[6]);
        $('#sub17').find(":selected").text(data1[7]);
        $('#stime17').val(data1[8]);
        $('#etime17').val(data1[9]);

        $('#yLevel18').find(":selected").text(data1[10]);
        $('#sect18').find(":selected").text(data1[11]);
        $('#sub18').find(":selected").text(data1[12]);
        $('#stime18').val(data1[13]);
        $('#etime18').val(data1[14]);

        $('#yLevel19').find(":selected").text(data1[15]);
        $('#sect19').find(":selected").text(data1[16]);
        $('#sub19').find(":selected").text(data1[17]);
        $('#stime19').val(data1[18]);
        $('#etime19').val(data1[19]);

        $('#yLevel20').find(":selected").text(data1[20]);
        $('#sect20').find(":selected").text(data1[21]);
        $('#sub20').find(":selected").text(data1[22]);
        $('#stime20').val(data1[23]);
        $('#etime20').val(data1[24]);
   
      });
    });
   </script>
 </body>
</html>

