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
                 <a class="nav-link active" href="admin_schedwed.php">Wednesday</a>
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
                    $query = "SELECT * FROM tbl_wedsched ";
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
                             <td style="display: none"><?php echo $row['year9']; ?></td>
                             <td style="display: none"><?php echo $row['section9']; ?></td>
                             <td style="display: none"><?php echo $row['subject9']; ?></td>
                             <td style="display: none"><?php echo $row['starttime9']; ?></td>
                             <td style="display: none"><?php echo $row['endtime9']; ?></td>
                             <td style="display: none"><?php echo $row['year10']; ?></td>
                             <td style="display: none"><?php echo $row['section10']; ?></td>
                             <td style="display: none"><?php echo $row['subject10']; ?></td>
                             <td style="display: none"><?php echo $row['starttime10']; ?></td>
                             <td style="display: none"><?php echo $row['endtime10']; ?></td>
                             <td style="display: none"><?php echo $row['year11']; ?></td>
                             <td style="display: none"><?php echo $row['section11']; ?></td>
                             <td style="display: none"><?php echo $row['subject11']; ?></td>
                             <td style="display: none"><?php echo $row['starttime11']; ?></td>
                             <td style="display: none"><?php echo $row['endtime11']; ?></td>
                             <td style="display: none"><?php echo $row['year12']; ?></td>
                             <td style="display: none"><?php echo $row['section12']; ?></td>
                             <td style="display: none"><?php echo $row['subject12']; ?></td>
                             <td style="display: none"><?php echo $row['starttime12']; ?></td>
                             <td style="display: none"><?php echo $row['endtime12']; ?></td>

                             <td>
                             <button class="btn btn-info editbtn" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#schedmodal">Edit Schedule</button>
                             
                            </td>
                             </tr>
                            <?php
                            include 'wednesday_sched.php';
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
                <!-- WEDNESDAY -->
                  <h2>Wednesday</h2>
                  <h5>AM</h5>
                  <?php echo "<b>First AM Subject</b>" ?>
                  <!-- first subject --><hr>
                   <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year9" class="yearlevel9 form-control" id="yLevel9">
                      <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section9" id="sect9" class="form-control">
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
                    <select name="subject9" class="subject9 form-control" id="sub9">
                        <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                        <input id="stime9" type="text" name="starttime9" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime9" name="endtime9" class="form-control">
                  </div>
                  <!-- end of first subect -->
                  <?php echo "<b>Second AM Subject</b>" ?>
                  <!-- second subject --><hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year10" class="yearlevel10 form-control" id="yLevel10">
                        <option selected="selected">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section10" id="sect10" class="form-control">
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
                    <select name="subject10" class="subject10 form-control" id="sub10">
                     <option selected="selected">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime10" name="starttime10" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime10" name="endtime10" class="form-control">
                  </div>
                  <!-- end of second subject -->

                  <h5>PM</h5>

                   <!-- third subject -->
                   <?php echo "<b>First PM Subject</b>" ?><hr>
                  <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year11" class="yearlevel11 form-control" id="yLevel11">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>

                  <div class = "form-group">
                    <label>Select Block</label>
                    <select name="section11" id="sect11" class="form-control">
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
                    <select name="subject11" class="subject11 form-control" id="sub11">
                        <option value="">Select Subject</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime11" name="starttime11" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime11" name="endtime11" class="form-control">
                  </div>
                  <!-- end of third subject -->

                   <!-- fourth subject -->
                   <?php echo "<b>Second PM Subject</b>" ?>
                   <hr>
                    <div class="form-group">
                     <label>Select Year Level</label>
                    <select name="year12" class="yearlevel12 form-control" id="yLevel12">
                        <option value="">Select Year Level</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Block</label>
                    <select name="section12" id="sect12" class="form-control">
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
                   <select name="subject12" class="subject12 form-control" id="sub12">
                        <option value="">Select Subject</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="text" id="stime12" id name="starttime12" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>End Time</label>
                      <input type="text" id="etime12" name="endtime12" class="form-control">
                  </div>
                  <!-- end of fourth subject -->

                  <!-- END OF MONDAY -->
                 


                  <?php
                  $sql1 = "SELECT * FROM tbl_wedsched";
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
  $('#stime9').timepicki();
  $('#etime9').timepicki();
  $('#stime10').timepicki();
  $('#etime10').timepicki();
  $('#stime11').timepicki();
  $('#etime11').timepicki();
  $('#stime12').timepicki();
  $('#etime12').timepicki();
</script>
<script>
     $(document).ready(function()
     {
       $(".semester").change(function(){
         var semester_id = $(this).val();
         /*alert(semester_selection);*/
         $.ajax({
           url:"wednesday_sched.php",
           method: "POST",
           data:{semester_id:semester_id},
           success:function(data){
             $(".yearlevel9").html(data);
             $(".yearlevel10").html(data);
             $(".yearlevel11").html(data);
             $(".yearlevel12").html(data);
           }
         });
       });
     });
</script>
<script>
 $(".yearlevel9").change(function(){
         var s_semester_id9 = $(".semester").val();
         var year_id9 = $(this).val();
         $.ajax({
           url:"wednesday_sched.php",
           method: "post",
           data:{s_semester_id9:s_semester_id9,year_id9:year_id9},
           success:function(data){
             $(".subject9").html(data);
           }
         });
       });
</script>
<script>
$(".yearlevel10").change(function(){
         var s_semester_id10 = $(".semester").val();
         var year_id10 = $(this).val();
         $.ajax({
           url:"wednesday_sched.php",
           method: "POST",
           data:{s_semester_id10:s_semester_id10,year_id10:year_id10},
           success:function(data){
             $(".subject10").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel11").change(function(){
         var s_semester_id11 = $(".semester").val();
         var year_id11 = $(this).val();
         $.ajax({
           url:"wednesday_sched.php",
           method: "POST",
           data:{s_semester_id11:s_semester_id11,year_id11:year_id11},
           success:function(data){
             $(".subject11").html(data);
           }
         });
       });
</script>
<script>
 $(".yearlevel12").change(function(){
         var s_semester_id12 = $(".semester").val();
         var year_id12 = $(this).val();
         $.ajax({
           url:"wednesday_sched.php",
           method: "POST",
           data:{s_semester_id12:s_semester_id12,year_id12:year_id12},
           success:function(data){
             $(".subject12").html(data);
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
         var year9Sel = $("#yLevel9 :selected").text();
         var sect9Sel = $("#sect9 :selected").text();
         var sub9Sel = $("#sub9 :selected").text();
         var start9 = $("#stime9").val();
         var end9 = $("#etime9").val();

         var year10Sel = $("#yLevel10 :selected").text();
         var sect10Sel = $("#sect10 :selected").text();
         var sub10Sel = $("#sub10 :selected").text();
         var start10 = $("#stime10").val();
         var end10 = $("#etime10").val();

         var year11Sel = $("#yLevel11 :selected").text();
         var sect11Sel = $("#sect11 :selected").text();
         var sub11Sel = $("#sub11 :selected").text();
         var start11 = $("#stime11").val();
         var end11 = $("#etime11").val();

         var year12Sel = $("#yLevel12 :selected").text();
         var sect12Sel = $("#sect12 :selected").text();
         var sub12Sel = $("#sub12 :selected").text();
         var start12 = $("#stime12").val();
         var end12 = $("#etime12").val();

         var user_id = $('#getusersid').val();
         $.ajax({
            url:"sched_wedfunc.php",
            method:"post",
            data:{
              user_id:user_id,
              syear:syear,
              selectedSem:selectedSem,
              year9Sel:year9Sel,
              sect9Sel:sect9Sel,
              sub9Sel:sub9Sel,
              start9:start9,
              end9:end9,
              year10Sel:year10Sel,
              sect10Sel:sect10Sel,
              sub10Sel:sub10Sel,
              start10:start10,
              end10:end10,
              year11Sel:year11Sel,
              sect11Sel:sect11Sel,
              sub11Sel:sub11Sel,
              start11:start11,
              end11:end11,
              year12Sel:year12Sel,
              sect12Sel:sect12Sel,
              sub12Sel:sub12Sel,
              start12:start12,
              end12:end12
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
        $('#yLevel9').find(":selected").html(data1[5]);
        $('#sect9').find(":selected").text(data1[6]);
        $('#sub9').find(":selected").text(data1[7]);
        $('#stime9').val(data1[8]);
        $('#etime9').val(data1[9]);

        $('#yLevel10').find(":selected").text(data1[10]);
        $('#sect10').find(":selected").text(data1[11]);
        $('#sub10').find(":selected").text(data1[12]);
        $('#stime10').val(data1[13]);
        $('#etime10').val(data1[14]);

        $('#yLevel11').find(":selected").text(data1[15]);
        $('#sect11').find(":selected").text(data1[16]);
        $('#sub11').find(":selected").text(data1[17]);
        $('#stime11').val(data1[18]);
        $('#etime11').val(data1[19]);

        $('#yLevel12').find(":selected").text(data1[20]);
        $('#sect12').find(":selected").text(data1[21]);
        $('#sub12').find(":selected").text(data1[22]);
        $('#stime12').val(data1[23]);
        $('#etime12').val(data1[24]);
   
      });
    });
   </script>
 </body>
</html>

