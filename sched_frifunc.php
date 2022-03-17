
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
        	$year17Sel = $_POST['year17Sel'];
        	$sect17Sel = $_POST['sect17Sel'];
         	$sub17Sel = $_POST['sub17Sel'];
         	$start17 = $_POST['start17'];
         	$end17 = $_POST['end17'];

         	$year18Sel = $_POST['year18Sel'];
        	$sect18Sel = $_POST['sect18Sel'];
         	$sub18Sel = $_POST['sub18Sel'];
         	$start18 = $_POST['start18'];
         	$end18 = $_POST['end18'];

         	$year19Sel = $_POST['year19Sel'];
        	$sect19Sel = $_POST['sect19Sel'];
         	$sub19Sel = $_POST['sub19Sel'];
         	$start19 = $_POST['start19'];
         	$end19 = $_POST['end19'];

         	$year20Sel = $_POST['year20Sel'];
        	$sect20Sel = $_POST['sect20Sel'];
         	$sub20Sel = $_POST['sub20Sel'];
         	$start20 = $_POST['start20'];
         	$end20 = $_POST['end20'];

        	echo $user_id." ".$syear." ".$selectedSem
        	." ".$year17Sel." ".$sect17Sel." ".$sub17Sel." ".$start17." ".$end17
         	." ".$year18Sel." ".$sect18Sel." ".$sub18Sel." ".$start18." ".$end18
         	." ".$year19Sel." ".$sect19Sel." ".$sub19Sel." ".$start19." ".$end19
         	." ".$year20Sel." ".$sect20Sel." ".$sub20Sel." ".$start20." ".$end20
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

		$editfriquery = "UPDATE tbl_frisched SET 
			school_year = '$syear', semester  = '$selectedSem', 
			year17 = '$year17Sel', section17 = '$sect17Sel', subject17 = '$sub17Sel',starttime17 = '$start17', endtime17 = '$end17',
			year18 = '$year18Sel', section18 = '$sect18Sel', subject18 = '$sub18Sel',starttime18 = '$start18', endtime18 = '$end18',
			year19 = '$year19Sel', section19 = '$sect19Sel', subject19 = '$sub19Sel',starttime19 = '$start19', endtime19 = '$end19',
			year20 = '$year20Sel', section20 = '$sect20Sel', subject20 = '$sub20Sel',starttime20 = '$start20', endtime20 = '$end20'
			 WHERE id = '$user_id'";
		$query_res = mysqli_query($con, $editfriquery);
		}
	}
?>
