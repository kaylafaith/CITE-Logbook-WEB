
<?php
include 'open_db.php';

if(!$con){
	 die("Connection failed: " . mysqli_connect_error());
}
else{
        if(isset($_POST)){
        	$user_id = $_POST['user_id'];
        	$syear = $_POST['syear'];
        	$selectedSem = $_POST['selectedSem'];
        	$year5Sel = $_POST['year5Sel'];
        	$sect5Sel = $_POST['sect5Sel'];
         	$sub5Sel = $_POST['sub5Sel'];
         	$start5 = $_POST['start5'];
         	$end5 = $_POST['end5'];

         	$year6Sel = $_POST['year6Sel'];
        	$sect6Sel = $_POST['sect6Sel'];
         	$sub6Sel = $_POST['sub6Sel'];
         	$start6 = $_POST['start6'];
         	$end6 = $_POST['end6'];

         	$year7Sel = $_POST['year7Sel'];
        	$sect7Sel = $_POST['sect7Sel'];
         	$sub7Sel = $_POST['sub7Sel'];
         	$start7 = $_POST['start7'];
         	$end7 = $_POST['end7'];

         	$year8Sel = $_POST['year8Sel'];
        	$sect8Sel = $_POST['sect8Sel'];
         	$sub8Sel = $_POST['sub8Sel'];
         	$start8 = $_POST['start8'];
         	$end8 = $_POST['end8'];

        	echo $user_id." ".$syear." ".$selectedSem." ".$year5Sel." ".$sect5Sel." ".$sub5Sel." ".$start5." ".$end5
         	." ".$year6Sel." ".$sect6Sel." ".$sub6Sel." ".$start6." ".$end6
         	." ".$year7Sel." ".$sect7Sel." ".$sub7Sel." ".$start7." ".$end7
         	." ".$year8Sel." ".$sect8Sel." ".$sub8Sel." ".$start8." ".$end8
         	;
 /*
			$stime1 = date("h:i A", strtotime($start1)); 
			$etime1 = date("h:i A", strtotime($end1)); 
			$stime2 = date("h:i A", strtotime($start2)); 
			$etime2 = date("h:i A", strtotime($end2)); 
			$stime3 = date("h:i A", strtotime($start3)); 
			$etime3 = date("h:i A", strtotime($end3)); 
			$stime4 = date("h:i A", strtotime($start4)); 
			$etime4 = date("h:i A", strtotime($end4)); 
        */

		$edittuequery = "UPDATE tbl_tuesched SET 
			school_year = '$syear', semester  = '$selectedSem', 
			year5 = '$year5Sel', section5 = '$sect5Sel', subject5 = '$sub5Sel',starttime5 = '$start5', endtime5 = '$end5',
			year6 = '$year6Sel', section6 = '$sect6Sel', subject6 = '$sub6Sel',starttime6 = '$start6', endtime6 = '$end6',
			year7 = '$year7Sel', section7 = '$sect7Sel', subject7 = '$sub7Sel',starttime7 = '$start7', endtime7 = '$end7',
			year8 = '$year8Sel', section8 = '$sect8Sel', subject8 = '$sub8Sel',starttime8 = '$start8', endtime8 = '$end8'
			 WHERE id = '$user_id'";
		$query_res = mysqli_query($con, $edittuequery);
		}
	}
?>
