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
                 <a class="nav-link" href="users_thurs.php">Thursday</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="users_fri.php">Friday</a>
               </li>
             </ul>
             <br>
            <?php
            include 'open_db.php';
            $query = "SELECT * FROM tbl_frisched WHERE users_id = '$id'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1){
              if($row = mysqli_fetch_array($result)){
          ?>
          <?php
           echo "<h4>Friday</h4>"; ;?>
           <input type="hidden" name="userSession" id="sessionID" value="<?php echo $_SESSION['id'];?>">
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
                <td><?php echo $row['starttime17'];?></td>
                <td><?php echo $row['endtime17'];?></td>
                <td><?php echo $row['subject17'];?> </td>
                <td><?php echo $row['year17'];?></td>
                <td><?php echo $row['section17'];?></td>
                <td><button id="timein17" name="in17" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout17" name="out17" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php include 'includes/time17.php'; ?>
              </tr>

              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime18'];?></td>
                <td><?php echo $row['endtime18'];?></td>
                <td><?php echo $row['subject18'];?> </td>
                <td><?php echo $row['year18'];?></td>
                <td><?php echo $row['section18'];?></td>
                <td><button id="timein18" name="in18" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout18" name="out18" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php include 'includes/time18.php'; ?>
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
                <td><?php echo $row['starttime19'];?></td>
                <td><?php echo $row['endtime19'];?></td>
                <td><?php echo $row['subject19'];?> </td>
                <td><?php echo $row['year19'];?></td>
                <td><?php echo $row['section19'];?></td>
                <td><button id="timein19" name="in19" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout19" name="out19" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php include 'includes/time19.php'; ?>
              </tr>
         
              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime20'];?></td>
                <td><?php echo $row['endtime20'];?></td>
                <td><?php echo $row['subject20'];?> </td>
                <td><?php echo $row['year20'];?></td>
                <td><?php echo $row['section20'];?></td>
               <td><button id="timein20" name="in20" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout20" name="out20" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php include 'includes/time20.php'; ?>
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
       $(document).on('click','#timein17',function(e){
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
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var seventeen_sub=currentRow.find("td:eq(4)").html();
        var startTime17=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func17.php",
            method:"post",
            data:{sessId:sessId, schoolyr:schoolyr, sem:sem, seventeen_sub:seventeen_sub, date:date, timecurr:timecurr,startTime17:startTime17,section:section},
             success:function(data){
              $('#timein17').prop('disabled', true);
             <?php
          if(round((time() - $start17) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start17) / 60,2) <= 15){
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
       $(document).on('click','#timeout17',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime17=currentRow.find("td:eq(2)").html();
        var endTime17=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID17").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func17.php",
            method:"post",
            data:{sessId:sessId,timecurr:timecurr,startTime17:startTime17,endTime17:endTime17, uid:uid},
                success:function(data){
                  $('#timeout17').prop('disabled', true);
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
       $(document).on('click','#timein18',function(e){
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
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var eighteen_sub =currentRow.find("td:eq(4)").html();
        var startTime18=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func18.php",
            method:"post",
            data:{sessId:sessId,schoolyr:schoolyr,sem:sem,eighteen_sub:eighteen_sub,date:date,timecurr:timecurr,startTime18:startTime18,section:section},
             success:function(data){
              $('#timein18').prop('disabled', true);
             <?php
          if(round((time() - $start18) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start18) / 60,2) <= 15){
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
       $(document).on('click','#timeout18',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime18=currentRow.find("td:eq(2)").html();
        var endTime18=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID18").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func18.php",
            method:"post",
            data:{sessId:sessId, timecurr:timecurr,startTime18:startTime18,endTime18:endTime18, uid:uid},
                success:function(data){
                  $('#timeout18').prop('disabled', true);
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
       $(document).on('click','#timein19',function(e){
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
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var nineteen_sub=currentRow.find("td:eq(4)").html();
        var section=currentRow.find("td:eq(6)").html();
        var startTime19=currentRow.find("td:eq(2)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func19.php",
            method:"post",
            data:{sessId:sessId,schoolyr:schoolyr,sem:sem,nineteen_sub:nineteen_sub,date:date,timecurr:timecurr,startTime19:startTime19,section:section},
             success:function(data){
              $('#timein19').prop('disabled', true);
             <?php
          if(round((time() - $start19) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start19) / 60,2) <= 15){
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
       $(document).on('click','#timeout19',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime19=currentRow.find("td:eq(2)").html();
        var endTime19=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID19").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func19.php",
            method:"post",
            data:{sessId:sessId,timecurr:timecurr,startTime19:startTime19,endTime19:endTime19, uid:uid},
                success:function(data){
                  $('#timeout19').prop('disabled', true);
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
       $(document).on('click','#timein20',function(e){
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
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var twenty_sub=currentRow.find("td:eq(4)").html();
        var startTime20=currentRow.find("td:eq(2)").html();
        var section=currentRow.find("td:eq(6)").html();
        /*details*/
       $.ajax({
            url:"timeIn/recordtime_func20.php",
            method:"post",
            data:{sessId:sessId,schoolyr:schoolyr,sem:sem,twenty_sub:twenty_sub,date:date,timecurr:timecurr,startTime20:startTime20,section:section},
             success:function(data){
              $('#timein20').prop('disabled', true);
             <?php
          if(round((time() - $start20) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start20) / 60,2) <= 15){
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
       $(document).on('click','#timeout20',function(e){
         e.preventDefault(); 
         /*time and date*/
        var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var currentRow=$(this).closest("tr"); 
        var startTime20=currentRow.find("td:eq(2)").html();
        var endTime20=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID20").val();
        /*details*/
       $.ajax({
            url:"timeOut/recordout_func20.php",
            method:"post",
            data:{sessId:sessId, timecurr:timecurr,startTime20:startTime20,endTime20:endTime20,uid:uid},
                success:function(data){
                  $('#timeout20').prop('disabled', true);
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