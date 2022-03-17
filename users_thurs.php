<?php
session_start();
include 'open_db.php';

if(isset($_SESSION['username'])){
    $identity = $_SESSION['email'];
    $id = $_SESSION['id'];
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

 <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <!-- Our Custom CSS -->
       <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.css">
       <link rel="stylesheet" type="text/css" href="css/cssofuser.css">
       <script src="calendar_widget.js"></script>

   <title>Digital Log-book for CITE Department</title>
    <!-- Our Custom CSS -->
  
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand font-bold" href="users_home.php">CITE Log-book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="users_home.php"><i class="fas fa-chart-line"></i>&nbsp;Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users_report.php"><i class="fas fa-print"></i>&nbsp;Report</a>
      </li>
      <li class="nav-item">
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
    <h1>SCHEDULE</h1>
    <br>
    <div class="row">
          <div class="col-sm-4">
                     <div class="calendar calendar-first" id="calendar_first">
                      <div class="calendar_header">
                          <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                           <h2></h2>
                          <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                      </div>
                      <div class="calendar_weekdays"></div>
                      <div class="calendar_content"></div>
                  </div>
          </div>
          <br><br><br>
          <div class="col-sm-8">
            <br>
                 <div class="container">
             <ul class="nav nav-tabs">
               <li class="nav-item">
                 <a class="nav-link" href="users_home.php">Monday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_tues.php">Tuesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_wed.php">Wednesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="users_thurs.php">Thursday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_fri.php">Friday</a>
               </li>
             </ul>
             <br>
            <?php
            include 'open_db.php';
            $query = "SELECT * FROM tbl_thursched WHERE users_id = '$id'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1){
              if($row = mysqli_fetch_array($result)){
          ?>
          <?php
           echo "<h4>Thursday</h4>"; ?>
           <input type="hidden" name="userSession" id="sessionID" value="<?php echo $_SESSION['id'];?>">
           <input type="hidden" name="emailSession" id="sessionEmail" value="<?php echo $_SESSION['email'];?>">
          <table class="table table-responsive-lg table-striped table-hover" cellpadding="0" cellspacing="0" style="text-align: center;">
            <thead class="table-success">
              <tr>
                <th style="font-weight: bold; display: none;">SCHOOL YEAR</th>
                <th style="font-weight: bold; display: none;" width = "10%">SEMESTER</th>
                <th style="font-weight: bold;" width = "10%">START</th>
                <th style="font-weight: bold;" width = "10%">END</th>
                <th style="font-weight: bold;">SUBJECT</th>
                <th style="font-weight: bold;" width="20%">YEAR LEVEL</th>
                <th style="font-weight: bold;">SECTION</th>
                <th style="font-weight: bold;"></th>
                <th style="font-weight: bold;"></th>
              </tr>
          </thead>

          <?php
            date_default_timezone_set('Asia/Manila');
          ?>
            <tbody>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align: center;">AM</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>

              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime13'];?></td>
                <td><?php echo $row['endtime13'];?></td>
                <td><?php echo $row['subject13'];?> </td>
                <td><?php echo $row['year13'];?></td>
                <td><?php echo $row['section13'];?></td>
                <td><button id="timein13" name="in13" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout13" name="out13" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php include 'includes/time13.php'; ?>
              </tr>

              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime14'];?></td>
                <td><?php echo $row['endtime14'];?></td>
                <td><?php echo $row['subject14'];?> </td>
                <td><?php echo $row['year14'];?></td>
                <td><?php echo $row['section14'];?></td>
                <td><button id="timein14" name="in14" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout14" name="out14" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php 
                  $subject14 = $row['subject14'];
                  $query14 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject14'";
                  $result14 = mysqli_query($con, $query14);
                  if(mysqli_num_rows($result14) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein14').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{ 
                         include 'includes/time14.php';
                      } 
                ?>
              </tr>

              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align: center;">PM</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
         
              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime15'];?></td>
                <td><?php echo $row['endtime15'];?></td>
                <td><?php echo $row['subject15'];?> </td>
                <td><?php echo $row['year15'];?></td>
                <td><?php echo $row['section15'];?></td>
                <td><button id="timein15" name="in15" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout15" name="out15" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php 
                  $subject15 = $row['subject15'];
                  $query15 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject15'";
                  $result15 = mysqli_query($con, $query15);
                  if(mysqli_num_rows($result15) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein15').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{ 
                         include 'includes/time15.php';
                      } 
                ?>              </tr>
         
              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime16'];?></td>
                <td><?php echo $row['endtime16'];?></td>
                <td><?php echo $row['subject16'];?> </td>
                <td><?php echo $row['year16'];?></td>
                <td><?php echo $row['section16'];?></td>
                <td><button id="timein16" name="in16" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout16" name="out16" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php 
                  $subject16 = $row['subject16'];
                  $query16 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject16'";
                  $result16 = mysqli_query($con, $query16);
                  if(mysqli_num_rows($result16) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein16').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{ 
                         include 'includes/time16.php';
                      } 
                ?>
              </tr>
          </tbody>
            </table>

           <!--  -->
          </tbody>
            </table>
             <?php
          }
        }
        ?>
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
  </body>
</html>
<script>
  $(function(){
       $(document).on('click','#timein13',function(e){
         e.preventDefault(); 

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var thirteen_sub=currentRow.find("td:eq(4)").html();
        var startTime13=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
         $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
              
               $.ajax({
            url:"timeIn/recordtime_func13.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail, schoolyr:schoolyr, sem:sem, thirteen_sub:thirteen_sub, date:$currDate, timecurr:timecurr,startTime13:startTime13,section:section},
             success:function(data){
              $('#timein13').prop('disabled', true);
             <?php
          if(round(($date - $start13) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round(($date - $start13) / 60,2) <= 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded!",
            icon: "success",
          });
              ';
          }
            ?>
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
            
                      }
            });
      
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout13',function(e){
         e.preventDefault(); 
       
        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime13=currentRow.find("td:eq(2)").html();
        var endTime13=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID13").val();
        /*details*/
         $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
              
                  $.ajax({
            url:"timeOut/recordout_func13.php",
            method:"post",
            data:{sessId:sessId, timecurr:timecurr,startTime13:startTime13,endTime13:endTime13,uid:uid},
                success:function(data){
                  $('#timeout13').prop('disabled', true);
              <?php echo 
              '
           swal({
            title: "Completed!",
            text: "You have successfully timed out!",
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
                      }
            });
      
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timein14',function(e){
         e.preventDefault(); 
         

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var fourteen_sub =currentRow.find("td:eq(4)").html();
        var startTime14=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
       $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
              
                   $.ajax({
            url:"timeIn/recordtime_func14.php",
            method:"post",
            data:{sessId:sessId,schoolyr:schoolyr,sem:sem,fourteen_sub:fourteen_sub,date:$currDate,timecurr:timecurr,startTime14:startTime14,section:section},
             success:function(data){
              $('#timein14').prop('disabled', true);
             <?php
          if(round(($date - $start14) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round(($date - $start14) / 60,2) <= 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded!",
            icon: "success",
          });
              ';
          }
            ?>
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
                      }
            });
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout14',function(e){
         e.preventDefault(); 
        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime14=currentRow.find("td:eq(2)").html();
        var endTime14=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID14").val();
        /*details*/
         $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
                  
                     $.ajax({
            url:"timeOut/recordout_func14.php",
            method:"post",
            data:{sessId:sessId, timecurr:timecurr,startTime14:startTime14,endTime14:endTime14, uid:uid},
                success:function(data){
                  $('#timeout14').prop('disabled', true);
              <?php echo 
              '
           swal({
            title: "Completed!",
            text: "You have successfully timed out!",
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
            
                      }
            });
       
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timein15',function(e){
         e.preventDefault(); 


        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var fifteen_sub=currentRow.find("td:eq(4)").html();
        var startTime15=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
       $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
                  
                   $.ajax({
            url:"timeIn/recordtime_func15.php",
            method:"post",
            data:{sessId:sessId,schoolyr:schoolyr,sem:sem,fifteen_sub:fifteen_sub,date:$currDate,timecurr:timecurr,startTime15:startTime15,section:section},
             success:function(data){
              $('#timein15').prop('disabled', true);
             <?php
          if(round(($date - $start15) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round(($date - $start15) / 60,2) <= 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded!",
            icon: "success",
          });
              ';
          }
            ?>
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
            
                      }
            });
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout15',function(e){
         e.preventDefault(); 

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr");
        var startTime15=currentRow.find("td:eq(2)").html();
        var endTime15=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID15").val();
        /*details*/
         $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
                  
                   $.ajax({
            url:"timeOut/recordout_func15.php",
            method:"post",
            data:{sessId:sessId, timecurr:timecurr,startTime15:startTime15,endTime15:endTime15, uid:uid},
                success:function(data){
                  $('#timeout15').prop('disabled', true);
              <?php echo 
              '
           swal({
            title: "Completed!",
            text: "You have successfully timed out!",
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
            
                      }
            });
       
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timein16',function(e){
         e.preventDefault(); 

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var sixteen_sub=currentRow.find("td:eq(4)").html();
        var startTime16=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
         $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
                  
                  $.ajax({
            url:"timeIn/recordtime_func16.php",
            method:"post",
            data:{sessId:sessId,schoolyr:schoolyr,sem:sem,sixteen_sub:sixteen_sub,date:$currDate,timecurr:timecurr,startTime16:startTime16,section:section},
             success:function(data){
              $('#timein16').prop('disabled', true);
             <?php
          if(round(($date - $start16) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round(($date - $start16) / 60,2) <= 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded!",
            icon: "success",
          });
              ';
          }
            ?>
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
            
                      }
            });
      
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout16',function(e){
         e.preventDefault(); 

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime16=currentRow.find("td:eq(2)").html();
        var endTime16=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID16").val();
        /*details*/
         $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
              
                $.ajax({
            url:"timeOut/recordout_func16.php",
            method:"post",
            data:{sessId:sessId, timecurr:timecurr,startTime16:startTime16,endTime16:endTime16, uid:uid},
                success:function(data){
                  $('#timeout16').prop('disabled', true);
              <?php echo 
              '
           swal({
            title: "Completed!",
            text: "You have successfully timed out!",
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
            
                      }
            });
      
     });
    });
</script>