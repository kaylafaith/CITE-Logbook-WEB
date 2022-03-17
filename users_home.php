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
                 <a class="nav-link active" href="users_home.php">Monday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_tues.php">Tuesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_wed.php">Wednesday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_thurs.php">Thursday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="users_fri.php">Friday</a>
               </li>
             </ul>
             <br>
            <?php
            $query = "SELECT * FROM tbl_monsched WHERE users_id = '$id'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1){
              if($row = mysqli_fetch_array($result)){
                  
          ?>
          <?php
           echo "<h4>Monday</h4>"; ;?>
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
            $currDate = date("d-m-Y");
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
                <td><?php echo $row['starttime1'];?></td>
                <td><?php echo $row['endtime1'];?></td>
                <td><?php echo $row['subject1'];?> </td>
                <td><?php echo $row['year1'];?></td>
                <td><?php echo $row['section1'];?></td>
                <td><button id="timein1" name="in1" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout1" name="out1" class="btn btn-danger" disabled="">Time-out</button></td>
                 <?php include 'includes/time1.php'; ?>
              </tr>

              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime2'];?></td>
                <td><?php echo $row['endtime2'];?></td>
                <td><?php echo $row['subject2'];?> </td>
                <td><?php echo $row['year2'];?></td>
                <td><?php echo $row['section2'];?></td>
                <td><button id="timein2" name="in2" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout2" name="out2" class="btn btn-danger" disabled="">Time-out</button></td>
                 <?php 
                  $subject2 = $row['subject2'];
                  $query2 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject2'";
                  $result2 = mysqli_query($con, $query2);
                  if(mysqli_num_rows($result2) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein2').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{
                         include 'includes/time2.php';
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
                <td><?php echo $row['starttime3'];?></td>
                <td><?php echo $row['endtime3'];?></td>
                <td><?php echo $row['subject3'];?> </td>
                <td><?php echo $row['year3'];?></td>
                <td><?php echo $row['section3'];?></td>
                <td><button id="timein3" name="in3" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout3" name="out3" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php 
                  $subject3 = $row['subject3'];
                  $query3 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject3'";
                  $result3 = mysqli_query($con, $query3);
                  if(mysqli_num_rows($result3) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein3').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{
                         include 'includes/time3.php';
                      } 
                ?>
              </tr>
         
              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime4'];?></td>
                <td><?php echo $row['endtime4'];?></td>
                <td><?php echo $row['subject4'];?> </td>
                <td><?php echo $row['year4'];?></td>
                <td><?php echo $row['section4'];?></td>
               <td><button id="timein4" name="in4" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout4" name="out4" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php 
                  $subject4 = $row['subject4'];
                  $query4 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject4'";
                  $result4 = mysqli_query($con, $query4);
                  if(mysqli_num_rows($result4) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein4').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{
                         include 'includes/time4.php';
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
    <br><br>
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
       $(document).on('click','#timein1',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var date =  dd + '-' + mm + '-' + yyyy;
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var section=currentRow.find("td:eq(6)").html();
        var schoolyr=currentRow.find("td:eq(0)").html();
        var first_sub=currentRow.find("td:eq(4)").html();
        var startTime1=currentRow.find("td:eq(2)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func.php",
            method:"post",
            data:{sessId:sessId, sessEmail:sessEmail, schoolyr:schoolyr, sem:sem, first_sub:first_sub, date:date, timecurr:timecurr,startTime1:startTime1, section:section},
             success:function(data){
              $( "#timein1" ).prop( "disabled", true );
             <?php
          if(round((time() - $start1) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start1) / 60,2) <= 15){
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
            }
       });
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout1',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime1=currentRow.find("td:eq(2)").html();
        var endTime1=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID1").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func1.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail, timecurr:timecurr,startTime1:startTime1,endTime1:endTime1,uid:uid},
                success:function(data){
                  $( "#timeout1" ).prop( "disabled", true );
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
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timein2',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var date =  dd + '-' + mm + '-' + yyyy;
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var section=currentRow.find("td:eq(6)").html();
        var second_sub=currentRow.find("td:eq(4)").html();
        var startTime2=currentRow.find("td:eq(2)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func2.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,schoolyr:schoolyr,sem:sem,second_sub:second_sub,date:date,timecurr:timecurr,startTime2:startTime2, section:section},
             success:function(data){
              $( "#timein2" ).prop( "disabled", true );
             <?php
          if(round((time() - $start2) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start2) / 60,2) <= 15){
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
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout2',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime2=currentRow.find("td:eq(2)").html();
        var endTime2=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID2").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func2.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail,timecurr:timecurr,startTime2:startTime2,endTime2:endTime2, uid:uid},
                success:function(data){
                  $( "#timeout2" ).prop( "disabled", true );
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
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timein3',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var date =  dd + '-' + mm + '-' + yyyy;
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var third_sub=currentRow.find("td:eq(4)").html();
        var startTime3=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();

        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func3.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail,schoolyr:schoolyr,sem:sem,third_sub:third_sub,date:date,timecurr:timecurr,startTime3:startTime3,section:section},
             success:function(data){
              $( "#timein3" ).prop( "disabled", true );
             <?php
          if(round((time() - $start3) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start3) / 60,2) <= 15){
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
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout3',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var endTime3=currentRow.find("td:eq(3)").html();
        var startTime3=currentRow.find("td:eq(2)").html();
        var uid = $("#uniqID3").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func3.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail, timecurr:timecurr,startTime3:startTime3,endTime3:endTime3,uid:uid},
                success:function(data){
                  $( "#timeout3" ).prop( "disabled", true );
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
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timein4',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var date =  dd + '-' + mm + '-' + yyyy;
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var fourth_sub=currentRow.find("td:eq(4)").html();
        var startTime4=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();

        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func4.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail,schoolyr:schoolyr,sem:sem,fourth_sub:fourth_sub,date:date,timecurr:timecurr,startTime4:startTime4,section:section},
             success:function(data){
              $('#timein4').prop('disabled', true);
             <?php
          if(round((time() - $start4) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start4) / 60,2) <= 15){
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
     });
    });
</script>
<script>
  $(function(){
       $(document).on('click','#timeout4',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var endTime4=currentRow.find("td:eq(3)").html();
        var startTime4=currentRow.find("td:eq(2)").html();
        var uid = $("#uniqID4").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func4.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,timecurr:timecurr,startTime4:startTime4,endTime4:endTime4,uid:uid},
                success:function(data){
                  $('#timeout4').prop('disabled', true);
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
     });
    });
</script>