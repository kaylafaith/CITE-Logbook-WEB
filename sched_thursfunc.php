
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
        	$year13Sel = $_POST['year13Sel'];
        	$sect13Sel = $_POST['sect13Sel'];
         	$sub13Sel = $_POST['sub13Sel'];
         	$start13 = $_POST['start13'];
         	$end13 = $_POST['end13'];

         	$year14Sel = $_POST['year14Sel'];
        	$sect14Sel = $_POST['sect14Sel'];
         	$sub14Sel = $_POST['sub14Sel'];
         	$start14 = $_POST['start14'];
         	$end14 = $_POST['end14'];

         	$year15Sel = $_POST['year15Sel'];
        	$sect15Sel = $_POST['sect15Sel'];
         	$sub15Sel = $_POST['sub15Sel'];
         	$start15 = $_POST['start15'];
         	$end15 = $_POST['end15'];

         	$year16Sel = $_POST['year16Sel'];
        	$sect16Sel = $_POST['sect16Sel'];
         	$sub16Sel = $_POST['sub16Sel'];
         	$start16 = $_POST['start16'];
         	$end16 = $_POST['end16'];

        	echo $user_id." ".$syear." ".$selectedSem
        	." ".$year13Sel." ".$sect13Sel." ".$sub13Sel." ".$start13." ".$end13
         	." ".$year14Sel." ".$sect14Sel." ".$sub14Sel." ".$start14." ".$end14
         	." ".$year15Sel." ".$sect15Sel." ".$sub15Sel." ".$start15." ".$end15
         	." ".$year16Sel." ".$sect16Sel." ".$sub16Sel." ".$start16." ".$end16
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

		$editthursquery = "UPDATE tbl_thursched SET 
			school_year = '$syear', semester  = '$selectedSem', 
			year13 = '$year13Sel', section13 = '$sect13Sel', subject13 = '$sub13Sel',starttime13 = '$start13', endtime13 = '$end13',
			year14 = '$year14Sel', section14 = '$sect14Sel', subject14 = '$sub14Sel',starttime14 = '$start14', endtime14 = '$end14',
			year15 = '$year15Sel', section15 = '$sect15Sel', subject15 = '$sub15Sel',starttime15 = '$start15', endtime15 = '$end15',
			year16 = '$year16Sel', section16 = '$sect16Sel', subject16 = '$sub16Sel',starttime16 = '$start16', endtime16 = '$end16'
			 WHERE id = '$user_id'";
		$query_res = mysqli_query($con, $editthursquery);
		}
	}
?>
