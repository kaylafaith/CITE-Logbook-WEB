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
                 <a class="nav-link active" href="admin_schedtue.php">Tuesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_schedwed.php">Wednesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_schedthurs.php">Thursday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="admin_schedfri.php">Friday</a>
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
                    $query = "SELECT * FROM tbl_tuesched ";
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
                             <td style="display: none"><?php echo $row['year5']; ?></td>
                             <td style="display: none"><?php echo $row['section5']; ?></td>
                             <td style="display: none"><?php echo $row['subject5']; ?></td>
                             <td style="display: none"><?php echo $row['starttime5']; ?></td>
                             <td style="display: none"><?php echo $row['endtime5']; ?></td>
                             <td style="display: none"><?php echo $row['year6']; ?></td>
                             <td style="display: none"><?php echo $row['section6']; ?></td>
                             <td style="display: none"><?php echo $row['subject6']; ?></td>
                             <td style="display: none"><?php echo $row['starttime6']; ?></td>
                             <td style="display: none"><?php echo $row['endtime6']; ?></td>
                             <td style="display: none"><?php echo $row['year7']; ?></td>
                             <td style="display: none"><?php echo $row['section7']; ?></td>
                             <td style="display: none"><?php echo $row['subject7']; ?></td>
                             <td style="display: none"><?php echo $row['starttime7']; ?></td>
                             <td style="display: none"><?php echo $row['endtime7']; ?></td>
                             <td style="display: none"><?php echo $row['year8']; ?></td>
                             <td style="display: none"><?php echo $row['section8']; ?></td>
                             <td style="display: none"><?php echo $row['subject8']; ?></td>
                             <td style="display: none"><?php echo $row['starttime8']; ?></td>
                             <td style="display: none"><?php echo $row['endtime8']; ?></td>

                             <td>
                             <button class="btn btn-info editbtn" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#schedmodal">Edit Schedule</button>
                             
                            </td>
                             </tr>
                            <?php
                            include 'tuesday_sched.php';
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
                <!-- TUESDAY -->
                  <h2>Tuesday</h2>
                  <h5>AM</h5>
                  <?php echo "<b>First AM Subject</b>" ?>
                  <!-- first subject --><hr>
                   <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year5" class="yearlevel5 form-control" id="yLevel5">
                      <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section5" id="sect5" class="form-control">
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
                    <select name="subject5" class="subject5 form-control" id="sub5">
                        <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                        <input id="stime5" type="text" name="starttime5" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime5" name="endtime5" class="form-control">
                  </div>
                  <!-- end of first subect -->
                  <?php echo "<b>Second AM Subject</b>" ?>
                  <!-- second subject --><hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year6" class="yearlevel6 form-control" id="yLevel6">
                        <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section6" id="sect6" class="form-control">
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
                    <select name="subject6" class="subject6 form-control" id="sub6">
                     <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime6" name="starttime6" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime6" name="endtime6" class="form-control">
                  </div>
                  <!-- end of second subject -->

                  <h5>PM</h5>

                   <!-- third subject -->
                   <?php echo "<b>First PM Subject</b>" ?><hr>
                  <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year7" class="yearlevel7 form-control" id="yLevel7">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>

                  <div class = "form-group">
                    <label>Select Block</label>
                    <select name="section7" id="sect7" class="form-control">
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
                    <select name="subject7" class="subject7 form-control" id="sub7">
                        <option value="">Select Subject</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime7" name="starttime7" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime7" name="endtime7" class="form-control">
                  </div>
                  <!-- end of third subject -->

                   <!-- fourth subject -->
                   <?php echo "<b>Second PM Subject</b>" ?>
                   <hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year8" class="yearlevel8 form-control" id="yLevel8">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section8" id="sect8" class="form-control">
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
                   <select name="subject8" class="subject8 form-control" id="sub8">
                        <option value="">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime8" id name="starttime8" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime8" name="endtime8" class="form-control">
                  </div>
                  <!-- end of fourth subject -->

                  <!-- END OF MONDAY -->
                 


                  <?php
                  $sql1 = "SELECT * FROM tbl_tuesched";
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
  $('#stime5').timepicki();
  $('#etime5').timepicki();
  $('#stime6').timepicki();
  $('#etime6').timepicki();
  $('#stime7').timepicki();
  $('#etime7').timepicki();
  $('#stime8').timepicki();
  $('#etime8').timepicki();
</script>
<script>
     $(document).ready(function()
     {
       $(".semester").change(function(){
         var semester_id = $(this).val();
         /*alert(semester_selection);*/
         $.ajax({
           url:"tuesday_sched.php",
           method: "POST",
           data:{semester_id:semester_id},
           success:function(data){
             $(".yearlevel5").html(data);
             $(".yearlevel6").html(data);
             $(".yearlevel7").html(data);
             $(".yearlevel8").html(data);
           }
         });
       });
     });
</script>
<script>
 $(".yearlevel5").change(function(){
         var s_semester_id5 = $(".semester").val();
         var year_id5 = $(this).val();
         $.ajax({
           url:"tuesday_sched.php",
           method: "POST",
           data:{s_semester_id5:s_semester_id5,year_id5:year_id5},
           success:function(data){
             $(".subject5").html(data);
           }
         });
       });
</script>
<script>
$(".yearlevel6").change(function(){
         var s_semester_id6 = $(".semester").val();
         var year_id6 = $(this).val();
         $.ajax({
           url:"tuesday_sched.php",
           method: "POST",
           data:{s_semester_id6:s_semester_id6,year_id6:year_id6},
           success:function(data){
             $(".subject6").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel7").change(function(){
         var s_semester_id7 = $(".semester").val();
         var year_id7 = $(this).val();
         $.ajax({
           url:"tuesday_sched.php",
           method: "POST",
           data:{s_semester_id7:s_semester_id7,year_id7:year_id7},
           success:function(data){
             $(".subject7").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel8").change(function(){
         var s_semester_id8 = $(".semester").val();
         var year_id8 = $(this).val();
         $.ajax({
           url:"tuesday_sched.php",
           method: "POST",
           data:{s_semester_id8:s_semester_id8,year_id8:year_id8},
           success:function(data){
             $(".subject8").html(data);
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
         var year5Sel = $("#yLevel5 :selected").text();
         var sect5Sel = $("#sect5 :selected").text();
         var sub5Sel = $("#sub5 :selected").text();
         var start5 = $("#stime5").val();
         var end5 = $("#etime5").val();

         var year6Sel = $("#yLevel6 :selected").text();
         var sect6Sel = $("#sect6 :selected").text();
         var sub6Sel = $("#sub6 :selected").text();
         var start6 = $("#stime6").val();
         var end6 = $("#etime6").val();

         var year7Sel = $("#yLevel7 :selected").text();
         var sect7Sel = $("#sect7 :selected").text();
         var sub7Sel = $("#sub7 :selected").text();
         var start7 = $("#stime7").val();
         var end7 = $("#etime7").val();

         var year8Sel = $("#yLevel8 :selected").text();
         var sect8Sel = $("#sect8 :selected").text();
         var sub8Sel = $("#sub8 :selected").text();
         var start8 = $("#stime8").val();
         var end8 = $("#etime8").val();

         var user_id = $('#getusersid').val();
         $.ajax({
            url:"sched_tuefunc.php",
            method:"post",
            data:{
              user_id:user_id,
              syear:syear,
              selectedSem:selectedSem,
              year5Sel:year5Sel,
              sect5Sel:sect5Sel,
              sub5Sel:sub5Sel,
              start5:start5,
              end5:end5,
              year6Sel:year6Sel,
              sect6Sel:sect6Sel,
              sub6Sel:sub6Sel,
              start6:start6,
              end6:end6,
              year7Sel:year7Sel,
              sect7Sel:sect7Sel,
              sub7Sel:sub7Sel,
              start7:start7,
              end7:end7,
              year8Sel:year8Sel,
              sect8Sel:sect8Sel,
              sub8Sel:sub8Sel,
              start8:start8,
              end8:end8
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
        $('.yearlevel5').find(":selected").html(data1[5]);
        $('#sect5').find(":selected").text(data1[6]);
        $('#sub5').find(":selected").text(data1[7]);
        $('#stime5').val(data1[8]);
        $('#etime5').val(data1[9]);

        $('#yLevel6').find(":selected").text(data1[10]);
        $('#sect6').find(":selected").text(data1[11]);
        $('#sub6').find(":selected").text(data1[12]);
        $('#stime6').val(data1[13]);
        $('#etime6').val(data1[14]);

        $('#yLevel7').find(":selected").text(data1[15]);
        $('#sect7').find(":selected").text(data1[16]);
        $('#sub7').find(":selected").text(data1[17]);
        $('#stime7').val(data1[18]);
        $('#etime7').val(data1[19]);

        $('#yLevel8').find(":selected").text(data1[20]);
        $('#sect8').find(":selected").text(data1[21]);
        $('#sub8').find(":selected").text(data1[22]);
        $('#stime8').val(data1[23]);
        $('#etime8').val(data1[24]);
   
      });
    });
   </script>
 </body>
</html>

