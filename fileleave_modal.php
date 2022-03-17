<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$id = $_SESSION['id'];
include('database_conn.php');
$syear = '';
$query = "SELECT DISTINCT schoolyear FROM tbl_records";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $syear .= '<option value="'.$row['schoolyear'].'">'.$row['schoolyear'].'</option>';
}
?>


   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
             <div class="modal-header"  style="background: #245E36;">
                        <h3 class="modal-title" style="font-family: sans-serif;color: white;">File a Leave</h3>
                        <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="color: white;"></i></button>
                          </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="seshID" value="<?php echo $id; ?>">
             <div class="form-group">
              <label><h6>Select School Year</h6></label>
              <select name="select_year" id="scyear" class="form-control" required="">
               <option value="">School Year</option>
               <?php echo $syear; ?>
              </select>
             </div>
               <div class="form-group">
                <label><h6>Select Semester</h6></label>
                <select name="select_sem" id="semester" class="form-control" required>
                 <option value="">Semester</option>
                 <option value="First Semester">First Semester</option>
                 <option value="Second Semester">Second Semester</option>
                </select>
               </div>
            <div class="form-group">
              <label><h6>Start of Leave: </h6></label>
               <input type="date" id="selected_date" name="start_date" class="form-control" placeholder="MM/DD/YYYY"> 
            </div>
            <div class="form-group">
              <label><h6>End of Leave: </h6></label>
               <input type="date" id="selected_date" name="end_date" class="form-control" placeholder="MM/DD/YYYY"> 
            </div>
            <div class="form-group">
               <label><h6>Instructor Name:</h6></label>
               <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $_SESSION['first_name']?>  <?php echo $_SESSION['last_name']?>" readonly>
            </div>
            <div class="form-group">
               <label><h6>Email Address:</h6></label>
               <input type="text" id="email_address" name="email_address" class="form-control" value="<?php echo $_SESSION['email']?>" readonly>
            </div>
            <p>Attach your request letter below</p>
            <div class="form-group">
              <label>Upload File:</label>
              <input type="file" name="file">
            </div>
            <div class="form-group" align="right">
              <input class="btn btn-success form-control" type="submit" id="submit" name="submit">
            </div>
          </form>
        </div> 
      </div>
    </div>
  </div>
  <!-- END OF MODAL -->

  <?php
include 'open_db.php';
$id = $_SESSION['id'];
// Check connection
if (isset($_POST["submit"])) {
$school_year = $_POST['select_year'];
$semester = $_POST['select_sem'];
$full_name = $_POST['full_name'];
$full_name = $_POST['full_name'];
$email_address = $_POST['email_address'];
$start_date = date('d-m-Y',strtotime($_POST['start_date']));
$end_date = date('d-m-Y',strtotime($_POST['end_date']));
$storedFile = "upload/".basename($_FILES["file"]["name"]); //move to database
date_default_timezone_set('Asia/Manila');
$datetime = date("h:i:s A");
$dateup = date("d-m-Y");
$currMonth = date("F");
        move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile); // move to a folder with actual pic 

$check_duplicate = "SELECT users_id, dateToday, time_in, time_out FROM tbl_records WHERE users_id = '$id' AND time_in = 'ONLEAVE' AND time_out = 'ONLEAVE' AND dateToday BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($con, $check_duplicate);

    $count = mysqli_num_rows($result);

    if($count > 0){
         echo '<script>
        setTimeout(function() {
            swal({
                title: "",
                text: "You cannot file again for another leave with a date you have already entered..Please Try Again!",
                icon: "warning"
            }).then(function() {
                window.location = "users_leave.php";
            });
        }, 1000);
    </script>';
    }
    else{

$insert_record = mysqli_query($con,"INSERT INTO tbl_leave (users_id,schoolyear, semester,date_uploaded, time_uploaded, full_name, email_address, start_date, end_date, request_letter) VALUES ('$id','$school_year','$semester','$dateup','$datetime','$full_name','$email_address','$start_date','$end_date','$storedFile')") or die (mysqli_error($con));



function getDatesFromRange($start, $end, $format = 'd-m-Y') {
      
    // Declare an empty array
    $array = array();
      
    // Variable that store the date interval
    // of period 1 day
    $interval = new DateInterval('P1D');
  
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
  
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
  
    // Use loop to store date into array
    foreach($period as $date) {                 
        $array[] = $date->format($format); 
    }
  
    // Return the array elements
    return $array;
}

// Function call with passing the start date and end date
$Date = getDatesFromRange($start_date,$end_date);

if($insert_record){
  $inter = ((int)$end_date - (int)$start_date)+1;
for ($i=0; $i < $inter ; $i++) { 
  $insert_attendance = mysqli_query($con,"INSERT INTO tbl_records (users_id, email, schoolyear, semester, subject,section, time_in, current_in, time_out, current_out, dateMonth ,dateToday) VALUES ('$id','$email_address' ,'$school_year','$semester','WHOLE DAY','WHOLE DAY','ONLEAVE','ONLEAVE','ONLEAVE','ONLEAVE','$currMonth' ,'$Date[$i]')") or die (mysqli_error($con));
  }

      echo '<script>
              setTimeout(function() {
                  swal({
                      title: "",
                      text: "Request Successfully Submitted!",
                      icon: "success"
                  }).then(function() {
                      window.location = "users_leave.php";
                  });
              }, 1000);
          </script>';

}
else{
   echo '<script>
              setTimeout(function() {
                  swal({
                      title: "",
                      text: "Failed Submitting your Request...Please Try Again!",
                      icon: "error"
                  }).then(function() {
                      window.location = "users_leave.php";
                  });
              }, 1000);
          </script>';
}
}
}

?>