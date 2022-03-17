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
                 <a class="nav-link active" href="admin_schedthurs.php">Thursday</a>
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
                    $query = "SELECT * FROM tbl_thursched ";
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
                             <td style="display: none"><?php echo $row['year13']; ?></td>
                             <td style="display: none"><?php echo $row['section13']; ?></td>
                             <td style="display: none"><?php echo $row['subject13']; ?></td>
                             <td style="display: none"><?php echo $row['starttime13']; ?></td>
                             <td style="display: none"><?php echo $row['endtime13']; ?></td>
                             <td style="display: none"><?php echo $row['year14']; ?></td>
                             <td style="display: none"><?php echo $row['section14']; ?></td>
                             <td style="display: none"><?php echo $row['subject14']; ?></td>
                             <td style="display: none"><?php echo $row['starttime14']; ?></td>
                             <td style="display: none"><?php echo $row['endtime14']; ?></td>
                             <td style="display: none"><?php echo $row['year15']; ?></td>
                             <td style="display: none"><?php echo $row['section15']; ?></td>
                             <td style="display: none"><?php echo $row['subject15']; ?></td>
                             <td style="display: none"><?php echo $row['starttime15']; ?></td>
                             <td style="display: none"><?php echo $row['endtime15']; ?></td>
                             <td style="display: none"><?php echo $row['year16']; ?></td>
                             <td style="display: none"><?php echo $row['section16']; ?></td>
                             <td style="display: none"><?php echo $row['subject16']; ?></td>
                             <td style="display: none"><?php echo $row['starttime16']; ?></td>
                             <td style="display: none"><?php echo $row['endtime16']; ?></td>

                             <td>
                             <button class="btn btn-info editbtn" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#schedmodal">Edit Schedule</button>
                             
                            </td>
                             </tr>
                            <?php
                            include 'thursday_sched.php';
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
  <div class="modal fade bd-example-modal-lg" ="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="schedmodal">
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
                <!-- THURSDAY -->
                  <h2>Thursday</h2>
                  <h5>AM</h5>
                  <?php echo "<b>First AM Subject</b>" ?>
                  <!-- first subject --><hr>
                   <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year13" class="yearlevel13 form-control" id="yLevel13">
                      <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section13" id="sect13" class="form-control">
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
                    <select name="subject13" class="subject13 form-control" id="sub13">
                        <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                        <input id="stime13" type="text" name="starttime13" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime13" name="endtime13" class="form-control">
                  </div>
                  <!-- end of first subect -->
                  <?php echo "<b>Second AM Subject</b>" ?>
                  <!-- second subject --><hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year14" class="yearlevel14 form-control" id="yLevel14">
                        <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section14" id="sect14" class="form-control">
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
                    <select name="subject14" class="subject14 form-control" id="sub14">
                     <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime14" name="starttime14" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime14" name="endtime14" class="form-control">
                  </div>
                  <!-- end of second subject -->

                  <h5>PM</h5>

                   <!-- third subject -->
                   <?php echo "<b>First PM Subject</b>" ?><hr>
                  <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year15" class="yearlevel15 form-control" id="yLevel15">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>

                  <div class = "form-group">
                    <label>Select Block</label>
                    <select name="section15" id="sect15" class="form-control">
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
                    <select name="subject15" class="subject15 form-control" id="sub15">
                        <option value="">Select Subject</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime15" name="starttime15" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime15" name="endtime15" class="form-control">
                  </div>
                  <!-- end of third subject -->

                   <!-- fourth subject -->
                   <?php echo "<b>Second PM Subject</b>" ?>
                   <hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year16" class="yearlevel16 form-control" id="yLevel16">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section16" id="sect16" class="form-control">
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
                   <select name="subject16" class="subject16 form-control" id="sub16">
                        <option value="">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime16" id name="starttime16" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime16" name="endtime16" class="form-control">
                  </div>
                  <!-- end of fourth subject -->

                  <!-- END OF MONDAY -->
                 


                  <?php
                  $sql1 = "SELECT * FROM tbl_thursched";
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
  $('#stime13').timepicki();
  $('#etime13').timepicki();
  $('#stime14').timepicki();
  $('#etime14').timepicki();
  $('#stime15').timepicki();
  $('#etime15').timepicki();
  $('#stime16').timepicki();
  $('#etime16').timepicki();
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
             $(".yearlevel13").html(data);
             $(".yearlevel14").html(data);
             $(".yearlevel15").html(data);
             $(".yearlevel16").html(data);
           }
         });
       });
     });
</script>
<script>
 $(".yearlevel13").change(function(){
         var s_semester_id13 = $(".semester").val();
         var year_id13 = $(this).val();
         $.ajax({
           url:"thursday_sched.php",
           method: "post",
           data:{s_semester_id13:s_semester_id13,year_id13:year_id13},
           success:function(data){
             $(".subject13").html(data);
           }
         });
       });
</script>
<script>
$(".yearlevel14").change(function(){
         var s_semester_id14 = $(".semester").val();
         var year_id14 = $(this).val();
         $.ajax({
           url:"thursday_sched.php",
           method: "POST",
           data:{s_semester_id14:s_semester_id14,year_id14:year_id14},
           success:function(data){
             $(".subject14").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel15").change(function(){
         var s_semester_id15 = $(".semester").val();
         var year_id15 = $(this).val();
         $.ajax({
           url:"thursday_sched.php",
           method: "POST",
           data:{s_semester_id15:s_semester_id15,year_id15:year_id15},
           success:function(data){
             $(".subject15").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel16").change(function(){
         var s_semester_id16 = $(".semester").val();
         var year_id16 = $(this).val();
         $.ajax({
           url:"thursday_sched.php",
           method: "POST",
           data:{s_semester_id16:s_semester_id16,year_id16:year_id16},
           success:function(data){
             $(".subject16").html(data);
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
         var year13Sel = $("#yLevel13 :selected").text();
         var sect13Sel = $("#sect13 :selected").text();
         var sub13Sel = $("#sub13 :selected").text();
         var start13 = $("#stime13").val();
         var end13 = $("#etime13").val();

         var year14Sel = $("#yLevel14 :selected").text();
         var sect14Sel = $("#sect14 :selected").text();
         var sub14Sel = $("#sub14 :selected").text();
         var start14 = $("#stime14").val();
         var end14 = $("#etime14").val();

         var year15Sel = $("#yLevel15 :selected").text();
         var sect15Sel = $("#sect15 :selected").text();
         var sub15Sel = $("#sub15 :selected").text();
         var start15 = $("#stime15").val();
         var end15 = $("#etime15").val();

         var year16Sel = $("#yLevel16 :selected").text();
         var sect16Sel = $("#sect16 :selected").text();
         var sub16Sel = $("#sub16 :selected").text();
         var start16 = $("#stime16").val();
         var end16 = $("#etime16").val();

         var user_id = $('#getusersid').val();
         $.ajax({
            url:"sched_thursfunc.php",
            method:"post",
            data:{
              user_id:user_id,
              syear:syear,
              selectedSem:selectedSem,
              year13Sel:year13Sel,
              sect13Sel:sect13Sel,
              sub13Sel:sub13Sel,
              start13:start13,
              end13:end13,
              year14Sel:year14Sel,
              sect14Sel:sect14Sel,
              sub14Sel:sub14Sel,
              start14:start14,
              end14:end14,
              year15Sel:year15Sel,
              sect15Sel:sect15Sel,
              sub15Sel:sub15Sel,
              start15:start15,
              end15:end15,
              year16Sel:year16Sel,
              sect16Sel:sect16Sel,
              sub16Sel:sub16Sel,
              start16:start16,
              end16:end16
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
        $('#yLevel13').find(":selected").html(data1[5]);
        $('#sect13').find(":selected").text(data1[6]);
        $('#sub13').find(":selected").text(data1[7]);
        $('#stime13').val(data1[8]);
        $('#etime13').val(data1[9]);

        $('#yLevel14').find(":selected").text(data1[10]);
        $('#sect14').find(":selected").text(data1[11]);
        $('#sub14').find(":selected").text(data1[12]);
        $('#stime14').val(data1[13]);
        $('#etime14').val(data1[14]);

        $('#yLevel15').find(":selected").text(data1[15]);
        $('#sect15').find(":selected").text(data1[16]);
        $('#sub15').find(":selected").text(data1[17]);
        $('#stime15').val(data1[18]);
        $('#etime15').val(data1[19]);

        $('#yLevel16').find(":selected").text(data1[20]);
        $('#sect16').find(":selected").text(data1[21]);
        $('#sub16').find(":selected").text(data1[22]);
        $('#stime16').val(data1[23]);
        $('#etime16').val(data1[24]);
   
      });
    });
   </script>
 </body>
</html>

