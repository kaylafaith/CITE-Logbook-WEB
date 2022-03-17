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
                 <a class="nav-link active" href="admin_facultysched.php">Monday</a>
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
                    $query = "SELECT * FROM tbl_monsched ";
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
                             <td style="display: none"><?php echo $row['year1']; ?></td>
                             <td style="display: none"><?php echo $row['section1']; ?></td>
                             <td style="display: none"><?php echo $row['subject1']; ?></td>
                             <td style="display: none"><?php echo $row['starttime1']; ?></td>
                             <td style="display: none"><?php echo $row['endtime1']; ?></td>
                             <td style="display: none"><?php echo $row['year2']; ?></td>
                             <td style="display: none"><?php echo $row['section2']; ?></td>
                             <td style="display: none"><?php echo $row['subject2']; ?></td>
                             <td style="display: none"><?php echo $row['starttime2']; ?></td>
                             <td style="display: none"><?php echo $row['endtime2']; ?></td>
                             <td style="display: none"><?php echo $row['year3']; ?></td>
                             <td style="display: none"><?php echo $row['section3']; ?></td>
                             <td style="display: none"><?php echo $row['subject3']; ?></td>
                             <td style="display: none"><?php echo $row['starttime3']; ?></td>
                             <td style="display: none"><?php echo $row['endtime3']; ?></td>
                             <td style="display: none"><?php echo $row['year4']; ?></td>
                             <td style="display: none"><?php echo $row['section4']; ?></td>
                             <td style="display: none"><?php echo $row['subject4']; ?></td>
                             <td style="display: none"><?php echo $row['starttime4']; ?></td>
                             <td style="display: none"><?php echo $row['endtime4']; ?></td>

                             <td>
                             <button class="btn btn-info editbtn" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#schedmodal">Edit Schedule</button>
                             
                            </td>
                             </tr>
                            <?php
                            include 'monday_sched.php';
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
                <!-- MONDAY -->
                  <h2>Monday</h2>
                  <h5>AM</h5>
                  <?php echo "<b>First AM Subject</b>" ?>
                  <!-- first subject --><hr>
                   <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year1" class="yearlevel1 form-control" id="yLevel1">
                      <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section1" id="sect1" class="form-control">
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
                    <select name="subject1" class="subject1 form-control" id="sub1">
                        <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                        <input id="stime1" type="text" name="starttime1" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime1" name="endtime1" class="form-control">
                  </div>
                  <!-- end of first subect -->
                  <?php echo "<b>Second AM Subject</b>" ?>
                  <!-- second subject --><hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year2" class="yearlevel2 form-control" id="yLevel2">
                        <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section2" id="sect2" class="form-control">
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
                    <select name="subject2" class="subject2 form-control" id="sub2">
                     <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime2" name="starttime2" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime2" name="endtime2" class="form-control">
                  </div>
                  <!-- end of second subject -->

                  <h5>PM</h5>

                   <!-- third subject -->
                   <?php echo "<b>First PM Subject</b>" ?><hr>
                  <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year3" class="yearlevel3 form-control" id="yLevel3">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>

                  <div class = "form-group">
                    <label>Select Block</label>
                    <select name="section3" id="sect3" class="form-control">
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
                    <select name="subject3" class="subject3 form-control" id="sub3">
                        <option value="">Select Subject</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime3" name="starttime3" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime3" name="endtime3" class="form-control">
                  </div>
                  <!-- end of third subject -->

                   <!-- fourth subject -->
                   <?php echo "<b>Second PM Subject</b>" ?>
                   <hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year4" class="yearlevel4 form-control" id="yLevel4">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section4" id="sect4" class="form-control">
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
                   <select name="subject4" class="subject4 form-control" id="sub4">
                        <option value="">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime4" id name="starttime4" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime4" name="endtime4" class="form-control">
                  </div>
                  <!-- end of fourth subject -->

                  <!-- END OF MONDAY -->
                 


                  <?php
                  $sql1 = "SELECT * FROM tbl_monsched";
                  if ($query2 = mysqli_query($con, $sql1)) {
                      if ($rowers = mysqli_fetch_assoc($query2)) {
                        echo "<button class='btn btn-info wowows form-control' id='savebtn'>Save Edit</button>";
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
  $('#stime1').timepicki();
  $('#etime1').timepicki();
  $('#stime2').timepicki();
  $('#etime2').timepicki();
  $('#stime3').timepicki();
  $('#etime3').timepicki();
  $('#stime4').timepicki();
  $('#etime4').timepicki();
</script>
<script>
     $(document).ready(function()
     {
       $(".semester").change(function(){
         var semester_id = $(this).val();
         /*alert(semester_selection);*/
         $.ajax({
           url:"monday_sched.php",
           method: "POST",
           data:{semester_id:semester_id},
           success:function(data){
             $(".yearlevel1").html(data);
             $(".yearlevel2").html(data);
             $(".yearlevel3").html(data);
             $(".yearlevel4").html(data);
           }
         });
       });
     });
</script>
<script>
 $(".yearlevel1").change(function(){
         var s_semester_id1 = $(".semester").val();
         var year_id1 = $(this).val();
         $.ajax({
           url:"monday_sched.php",
           method: "POST",
           data:{s_semester_id1:s_semester_id1,year_id1:year_id1},
           success:function(data){
             $(".subject1").html(data);
           }
         });
       });
</script>
<script>
$(".yearlevel2").change(function(){
         var s_semester_id2 = $(".semester").val();
         var year_id2 = $(this).val();
         $.ajax({
           url:"monday_sched.php",
           method: "POST",
           data:{s_semester_id2:s_semester_id2,year_id2:year_id2},
           success:function(data){
             $(".subject2").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel3").change(function(){
         var s_semester_id3 = $(".semester").val();
         var year_id3 = $(this).val();
         $.ajax({
           url:"monday_sched.php",
           method: "POST",
           data:{s_semester_id3:s_semester_id3,year_id3:year_id3},
           success:function(data){
             $(".subject3").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel4").change(function(){
         var s_semester_id4 = $(".semester").val();
         var year_id4 = $(this).val();
         $.ajax({
           url:"monday_sched.php",
           method: "POST",
           data:{s_semester_id4:s_semester_id4,year_id4:year_id4},
           success:function(data){
             $(".subject4").html(data);
           }
         });
       });
</script>
<script>
 $(function(){
       $(document).on('click','.wowows',function(e){
         e.preventDefault();
         var syear = $("#year_school").val();
         var selectedSem = $("#semesterSelection :selected").text();
         var year1Sel = $("#yLevel1 :selected").text();
         var sect1Sel = $("#sect1 :selected").text();
         var sub1Sel = $("#sub1 :selected").text();
         var start1 = $("#stime1").val();
         var end1 = $("#etime1").val();

         var year2Sel = $("#yLevel2 :selected").text();
         var sect2Sel = $("#sect2 :selected").text();
         var sub2Sel = $("#sub2 :selected").text();
         var start2 = $("#stime2").val();
         var end2 = $("#etime2").val();

         var year3Sel = $("#yLevel3 :selected").text();
         var sect3Sel = $("#sect3 :selected").text();
         var sub3Sel = $("#sub3 :selected").text();
         var start3 = $("#stime3").val();
         var end3 = $("#etime3").val();

         var year4Sel = $("#yLevel4 :selected").text();
         var sect4Sel = $("#sect4 :selected").text();
         var sub4Sel = $("#sub4 :selected").text();
         var start4 = $("#stime4").val();
         var end4 = $("#etime4").val();

         var user_id = $('#getusersid').val();
         $.ajax({
            url:"sched_updatefunc.php",
            method:"post",
            data:{
              user_id:user_id,
              syear:syear,
              selectedSem:selectedSem,
              year1Sel:year1Sel,
              sect1Sel:sect1Sel,
              sub1Sel:sub1Sel,
              start1:start1,
              end1:end1,
              year2Sel:year2Sel,
              sect2Sel:sect2Sel,
              sub2Sel:sub2Sel,
              start2:start2,
              end2:end2,
              year3Sel:year3Sel,
              sect3Sel:sect3Sel,
              sub3Sel:sub3Sel,
              start3:start3,
              end3:end3,
              year4Sel:year4Sel,
              sect4Sel:sect4Sel,
              sub4Sel:sub4Sel,
              start4:start4,
              end4:end4
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
        $('.yearlevel1').find(":selected").html(data1[5]);
        $('#sect1').find(":selected").text(data1[6]);
        $('#sub1').find(":selected").text(data1[7]);
        $('#stime1').val(data1[8]);
        $('#etime1').val(data1[9]);

        $('#yLevel2').find(":selected").text(data1[10]);
        $('#sect2').find(":selected").text(data1[11]);
        $('#sub2').find(":selected").text(data1[12]);
        $('#stime2').val(data1[13]);
        $('#etime2').val(data1[14]);

        $('#yLevel3').find(":selected").text(data1[15]);
        $('#sect3').find(":selected").text(data1[16]);
        $('#sub3').find(":selected").text(data1[17]);
        $('#stime3').val(data1[18]);
        $('#etime3').val(data1[19]);

        $('#yLevel4').find(":selected").text(data1[20]);
        $('#sect4').find(":selected").text(data1[21]);
        $('#sub4').find(":selected").text(data1[22]);
        $('#stime4').val(data1[23]);
        $('#etime4').val(data1[24]);
   
      });
    });
   </script>
 </body>
</html>

