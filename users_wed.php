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
                 <a class="nav-link active" href="users_wed.php">Wednesday</a>
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
            $query = "SELECT * FROM tbl_wedsched WHERE users_id = '$id'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1){
              if($row = mysqli_fetch_array($result)){
          ?>
          <?php
           echo "<h4>Wednesday</h4>"; ;?>
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
                <td><?php echo $row['starttime9'];?></td>
                <td><?php echo $row['endtime9'];?></td>
                <td><?php echo $row['subject9'];?> </td>
                <td><?php echo $row['year9'];?></td>
                <td><?php echo $row['section9'];?></td>
                <td><button id="timein9" name="in9" class="btn btn-success" onclick="pressed()">Time-in</button></td>
                <td><button id="timeout9" name="out9" class="btn btn-danger" disabled="">Time-out</button></td>
                <?php include 'includes/time9.php'; ?>
              </tr>

              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime10'];?></td>
                <td><?php echo $row['endtime10'];?></td>
                <td><?php echo $row['subject10'];?> </td>
                <td><?php echo $row['year10'];?></td>
                <td><?php echo $row['section10'];?></td>
                <td><button id="timein10" name="in10" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout10" name="out10" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php 
                  $subject10 = $row['subject10'];
                  $query10 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject10'";
                  $result10 = mysqli_query($con, $query10);
                  if(mysqli_num_rows($result10) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein10').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{ 
                         include 'includes/time10.php';
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
                <td><?php echo $row['starttime11'];?></td>
                <td><?php echo $row['endtime11'];?></td>
                <td><?php echo $row['subject11'];?> </td>
                <td><?php echo $row['year11'];?></td>
                <td><?php echo $row['section11'];?></td>
                <td><button id="timein11" name="in11" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout11" name="out11" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php 
                  $subject11 = $row['subject11'];
                  $query11 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject11'";
                  $result11 = mysqli_query($con, $query11);
                  if(mysqli_num_rows($result11) > 0){ 
                       ?>
                           <script type="text/javascript">
                              $('#timein11').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{
                         include 'includes/time11.php';
                      } 
                ?>
              </tr>
         
              <tr>
                <td style="display: none;"><?php echo $row['school_year'];?></td>
                <td style="display: none;"><?php echo $row['semester'];?></td>
                <td><?php echo $row['starttime12'];?></td>
                <td><?php echo $row['endtime12'];?></td>
                <td><?php echo $row['subject12'];?> </td>
                <td><?php echo $row['year12'];?></td>
                <td><?php echo $row['section12'];?></td>
               <td><button id="timein12" name="in12" class="btn btn-success">Time-in</button></td>
                <td><button id="timeout12" name="out12" class="btn btn-danger" disabled="">Time-out</button></td>
               <?php 
                  $subject12 = $row['subject12'];
                  $query12 = "SELECT * FROM tbl_records WHERE users_id = '$id' AND time_out = '' AND NOT subject = '$subject12'";
                  $result12 = mysqli_query($con, $query12);
                  if(mysqli_num_rows($result12) > 0){
                       ?>
                           <script type="text/javascript">
                              $('#timein12').attr('disabled','disabled');
                            </script>
                     <?php }
                     else{ 
                         include 'includes/time12.php';
                      } 
                ?>
              </tr>
          </tbody>
            </table>

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
       $(document).on('click','#timein9',function(e){
         e.preventDefault(); 
         /*time and date*/
        /*var time = new Date();
        var timecurr = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        alert(timecurr);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var date =  dd + '-' + mm + '-' + yyyy;*/
        /*time and date*/
              var sessId = $("#sessionID").val();
              var sessEmail = $("#sessionEmail").val();
              var currentRow=$(this).closest("tr"); 
              var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
              var schoolyr=currentRow.find("td:eq(0)").html();
              var nine_sub=currentRow.find("td:eq(4)").html();
              var startTime9=currentRow.find("td:eq(2)").html();
              var endTime9=currentRow.find("td:eq(3)").html();
              var section=currentRow.find("td:eq(6)").html();

            $.ajax({
              url: "time.php",
              contentType: "application/json",
              type: "POST",
              success: function(response) {
                  let timecurr = JSON.parse(response).timecurr;
                  let $date = JSON.parse(response).date;
                  let $currDate = JSON.parse(response).currDate;
      
                 $.ajax({
                      url:"timeIn/recordtime_func9.php",
                      method:"post",
                      data:{sessId:sessId,sessEmail:sessEmail ,schoolyr:schoolyr, sem:sem, nine_sub:nine_sub, date:$currDate, timecurr:timecurr,startTime9:startTime9,section:section},
                       success:function(data){

                        $('#timein9').prop('disabled', true);
                       <?php
                    if(round(($date - $start9) / 60,2) > 15){
                      echo 
                        '
                     swal({
                      title: "Success!",
                      text: "Your attendance has been recorded but You are Late!",
                      icon: "info",
                    });
                        ';
                    }
                    elseif(round(($date - $start9) / 60,2) <= 15){
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
       $(document).on('click','#timeout9',function(e){
         e.preventDefault(); 
         /*time and date*/

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime9=currentRow.find("td:eq(2)").html();
        var endTime9=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID9").val();
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
            url:"timeOut/recordout_func9.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail, timecurr:timecurr,startTime9:startTime9,endTime9:endTime9,uid:uid},
                success:function(data){
                  $('#timeout9').prop('disabled', true);
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
       $(document).on('click','#timein10',function(e){
         e.preventDefault(); 
       
        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var ten_sub =currentRow.find("td:eq(4)").html();
        var section=currentRow.find("td:eq(6)").html();
        var startTime10=currentRow.find("td:eq(2)").html();
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
            url:"timeIn/recordtime_func10.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,schoolyr:schoolyr,sem:sem,ten_sub:ten_sub,date:$currdate,timecurr:timecurr,startTime10:startTime10,section:section},
             success:function(data){
              $('#timein10').prop('disabled', true);
             <?php
          if(round(($date - $start10) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round(($date - $start10) / 60,2) <= 15){
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
       $(document).on('click','#timeout10',function(e){
         e.preventDefault(); 
        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime10=currentRow.find("td:eq(2)").html();
        var endTime10=currentRow.find("td:eq(3)").html();
        var uid =  $("#uniqID10").val();
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
            url:"timeOut/recordout_func10.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,timecurr:timecurr,startTime10:startTime10,endTime10:endTime10,uid:uid},
                success:function(data){
                  $('#timeout10').prop('disabled', true);
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
       $(document).on('click','#timein11',function(e){
         e.preventDefault(); 
      
        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var eleven_sub=currentRow.find("td:eq(4)").html();
        var startTime11=currentRow.find("td:eq(2)").html();
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
            url:"timeIn/recordtime_func11.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail ,schoolyr:schoolyr,sem:sem,eleven_sub:eleven_sub,date:$currDate,timecurr:timecurr,startTime11:startTime11,section:section},
             success:function(data){
              $('#timein11').prop('disabled', true);
             <?php
          if(round((time() - $start11) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start11) / 60,2) <= 15){
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
       $(document).on('click','#timeout11',function(e){
         e.preventDefault(); 
         

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime11=currentRow.find("td:eq(2)").html();
        var endTime11=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID11").val();
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
            url:"timeOut/recordout_func11.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail, timecurr:timecurr,startTime11:startTime11,endTime11:endTime11,uid:uid},
                success:function(data){
                  $('#timeout11').prop('disabled', true);
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
       $(document).on('click','#timein12',function(e){
         e.preventDefault(); 

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var sem=currentRow.find("td:eq(1)").html(); // get current row 1st table cell TD value
        var schoolyr=currentRow.find("td:eq(0)").html();
        var twelve_sub=currentRow.find("td:eq(4)").html();
        var section=currentRow.find("td:eq(6)").html();
        var startTime12=currentRow.find("td:eq(2)").html();
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
            url:"timeIn/recordtime_func12.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail , schoolyr:schoolyr,sem:sem,twelve_sub:twelve_sub,date:$currdate,timecurr:timecurr,startTime12:startTime12,section:section},
             success:function(data){
              $('#timein12').prop('disabled', true);
             <?php
          if(round((time() - $start12) / 60,2) > 15){
            echo 
              '
           swal({
            title: "Success!",
            text: "Your attendance has been recorded but You are Late!",
            icon: "info",
          });
              ';
          }
          elseif(round((time() - $start12) / 60,2) <= 15){
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
       $(document).on('click','#timeout12',function(e){
         e.preventDefault(); 

        /*details*/
        var sessId = $("#sessionID").val();
        var sessEmail = $("#sessionEmail").val();
        var currentRow=$(this).closest("tr"); 
        var startTime12=currentRow.find("td:eq(2)").html();
        var endTime12=currentRow.find("td:eq(3)").html();
        var uid = $("#uniqID12").val();
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
            url:"timeOut/recordout_func12.php",
            method:"post",
            data:{sessId:sessId,sessEmail:sessEmail, timecurr:timecurr,startTime12:startTime12,endTime12:endTime12,uid:uid},
                success:function(data){
                  $('#timeout12').prop('disabled', true);
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