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
                 <a class="nav-link active" href="users_tues.php">Tuesday</a>
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
            include 'open_db.php';
            $query = "SELECT * FROM tbl_tuesched WHERE users_id = '$id'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1){
              if($row = mysqli_fetch_array($result)){
          ?>
          <?php
           echo "<h4>Tuesday</h4>"; ;?>
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
                <td><?php echo $row['starttime5'];?></td>
                <td><?php echo $row['endtime5'];?></td>
                <td><?php echo $row['subject5'];?> </td>
                <td><?php echo $row['year5'];?></td>
                <td><?php echo $row['section5'];?></td>
                <td><button id="timein5" name="in5" class="btn btn-success" disabled="">Time-in</button></td>
                <td><button id="timeout5" name="out5" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php include 'includes/time5.php'; ?>
              </tr>

              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime6'];?></td>
                <td><?php echo $row['endtime6'];?></td>
                <td><?php echo $row['subject6'];?> </td>
                <td><?php echo $row['year6'];?></td>
                <td><?php echo $row['section6'];?></td>
                <td><button id="timein6" name="in6" class="btn btn-success" disabled="">Time-in</button></td>
                <td><button id="timeout6" name="out6" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php 
                  $subject6 = $row['subject6'];
                  $query6 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject6'";
                  $result6 = mysqli_query($con, $query6);
                  if(mysqli_num_rows($result6) > 0){ echo "empty tiem out first";
                       ?>
                           <script type="text/javascript">
                              $('#timein6').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{ echo "not empty proceed";
                         include 'includes/time6.php';
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
                <td><?php echo $row['starttime7'];?></td>
                <td><?php echo $row['endtime7'];?></td>
                <td><?php echo $row['subject7'];?> </td>
                <td><?php echo $row['year7'];?></td>
                <td><?php echo $row['section7'];?></td>
                <td><button id="timein7" name="in7" class="btn btn-success" disabled="">Time-in</button></td>
                <td><button id="timeout7" name="out7" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php 
                  $subject7 = $row['subject7'];
                  $query7 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject7'";
                  $result7 = mysqli_query($con, $query7);
                  if(mysqli_num_rows($result7) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein7').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{
                         include 'includes/time7.php';
                      } 
                ?>
              </tr>
         
              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime8'];?></td>
                <td><?php echo $row['endtime8'];?></td>
                <td><?php echo $row['subject8'];?> </td>
                <td><?php echo $row['year8'];?></td>
                <td><?php echo $row['section8'];?></td>
               <td><button id="timein8" name="in8" class="btn btn-success" disabled="">Time-in</button></td>
                <td><button id="timeout8" name="out8" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php 
                  $subject8 = $row['subject8'];
                  $query8 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject8'";
                  $result8 = mysqli_query($con, $query8);
                  if(mysqli_num_rows($result8) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein8').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{
                         include 'includes/time8.php';
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
       $(document).on('click','#timein5',function(e){
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
        var fifth_sub=currentRow.find("td:eq(4)").html();
        var startTime5=currentRow.find("td:eq(2)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func5.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,schoolyr:schoolyr, sem:sem, fifth_sub:fifth_sub, date:date, timecurr:timecurr,startTime5:startTime5,section:section},
             success:function(data){
              $('#timein5').prop('disabled', true);
             <?php
          if(round((time() - $start5) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start5) / 60,2) <= 15){
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
       $(document).on('click','#timeout5',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime5=currentRow.find("td:eq(2)").html();
        var endTime5=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID5").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func5.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,timecurr:timecurr,startTime5:startTime5,endTime5:endTime5,uid:uid},
                success:function(data){
                  $('#timeout5').prop('disabled', true);
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
       $(document).on('click','#timein6',function(e){
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
        var sixth_sub =currentRow.find("td:eq(4)").html();
        var startTime6=currentRow.find("td:eq(2)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func6.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,schoolyr:schoolyr,sem:sem,sixth_sub:sixth_sub,date:date,timecurr:timecurr,startTime6:startTime6,section:section},
             success:function(data){
              $('#timein6').prop('disabled', true);
             <?php
          if(round((time() - $start6) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start6) / 60,2) <= 15){
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
       $(document).on('click','#timeout6',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime6=currentRow.find("td:eq(2)").html();
        var endTime6=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID6").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func6.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,timecurr:timecurr,startTime6:startTime6,endTime6:endTime6,uid:uid},
                success:function(data){
                  $('#timeout6').prop('disabled', true);
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
       $(document).on('click','#timein7',function(e){
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
        var seven_sub=currentRow.find("td:eq(4)").html();
        var section=currentRow.find("td:eq(6)").html();
        var startTime7=currentRow.find("td:eq(2)").html();
        var endTime7=currentRow.find("td:eq(3)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func7.php",
            method:"post",
            data:{sessId:sessId, sessEmail:sessEmail, schoolyr:schoolyr,sem:sem,seven_sub:seven_sub,date:date,timecurr:timecurr,startTime7:startTime7,section:section},
             success:function(data){
              $('#timein7').prop('disabled', true);
              
             <?php
          if(round((time() - $start7) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start7) / 60,2) <= 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded!",
            icon: "success",
          });
              ';
          }
            ?>          },
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
       $(document).on('click','#timeout7',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime7=currentRow.find("td:eq(2)").html();
        var endTime7=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID7").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func7.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail , timecurr:timecurr,startTime7:startTime7,endTime7:endTime7,uid:uid},
                success:function(data){
                  $('#timeout7').prop('disabled', true);
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
       $(document).on('click','#timein8',function(e){
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
        var eight_sub=currentRow.find("td:eq(4)").html();
        var startTime8=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func8.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail , schoolyr:schoolyr,sem:sem,eight_sub:eight_sub,date:date,timecurr:timecurr,startTime8:startTime8,section:section},
             success:function(data){
              $('#timein8').prop('disabled', true);
             <?php
          if(round((time() - $start8) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start8) / 60,2) <= 15){
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
       $(document).on('click','#timeout8',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime8=currentRow.find("td:eq(2)").html();
        var endTime8=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID8").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func8.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,timecurr:timecurr,startTime8:startTime8,endTime8:endTime8, uid:uid},
                success:function(data){
                  $('#timeout8').prop('disabled', true);
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