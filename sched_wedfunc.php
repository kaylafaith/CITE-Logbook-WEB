
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
        	$year9Sel = $_POST['year9Sel'];
        	$sect9Sel = $_POST['sect9Sel'];
         	$sub9Sel = $_POST['sub9Sel'];
         	$start9 = $_POST['start9'];
         	$end9 = $_POST['end9'];

         	$year10Sel = $_POST['year10Sel'];
        	$sect10Sel = $_POST['sect10Sel'];
         	$sub10Sel = $_POST['sub10Sel'];
         	$start10 = $_POST['start10'];
         	$end10 = $_POST['end10'];

         	$year11Sel = $_POST['year11Sel'];
        	$sect11Sel = $_POST['sect11Sel'];
         	$sub11Sel = $_POST['sub11Sel'];
         	$start11 = $_POST['start11'];
         	$end11 = $_POST['end11'];

         	$year12Sel = $_POST['year12Sel'];
        	$sect12Sel = $_POST['sect12Sel'];
         	$sub12Sel = $_POST['sub12Sel'];
         	$start12 = $_POST['start12'];
         	$end12 = $_POST['end12'];

        	echo $user_id." ".$syear." ".$selectedSem." ".$year9Sel." ".$sect9Sel." ".$sub9Sel." ".$start9." ".$end9
         	." ".$year10Sel." ".$sect10Sel." ".$sub10Sel." ".$start10." ".$end10
         	." ".$year11Sel." ".$sect11Sel." ".$sub11Sel." ".$start11." ".$end11
         	." ".$year12Sel." ".$sect12Sel." ".$sub12Sel." ".$start12." ".$end12
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

		$editwedquery = "UPDATE tbl_wedsched SET 
			school_year = '$syear', semester  = '$selectedSem', 
			year9 = '$year9Sel', section9 = '$sect9Sel', subject9 = '$sub9Sel',starttime9 = '$start9', endtime9 = '$end9',
			year10 = '$year10Sel', section10 = '$sect10Sel', subject10 = '$sub10Sel',starttime10 = '$start10', endtime10 = '$end10',
			year11 = '$year11Sel', section11 = '$sect11Sel', subject11 = '$sub11Sel',starttime11 = '$start11', endtime11 = '$end11',
			year12 = '$year12Sel', section12 = '$sect12Sel', subject12 = '$sub12Sel',starttime12 = '$start12', endtime12 = '$end12'
			 WHERE id = '$user_id'";
		$query_res = mysqli_query($con, $editwedquery);
		}
	}
?>
