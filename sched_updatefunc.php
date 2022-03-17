
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
        	$year1Sel = $_POST['year1Sel'];
        	$sect1Sel = $_POST['sect1Sel'];
         	$sub1Sel = $_POST['sub1Sel'];
         	$start1 = $_POST['start1'];
         	$end1 = $_POST['end1'];

         	$year2Sel = $_POST['year2Sel'];
        	$sect2Sel = $_POST['sect2Sel'];
         	$sub2Sel = $_POST['sub2Sel'];
         	$start2 = $_POST['start2'];
         	$end2 = $_POST['end2'];

         	$year3Sel = $_POST['year3Sel'];
        	$sect3Sel = $_POST['sect3Sel'];
         	$sub3Sel = $_POST['sub3Sel'];
         	$start3 = $_POST['start3'];
         	$end3 = $_POST['end3'];

         	$year4Sel = $_POST['year4Sel'];
        	$sect4Sel = $_POST['sect4Sel'];
         	$sub4Sel = $_POST['sub4Sel'];
         	$start4 = $_POST['start4'];
         	$end4 = $_POST['end4'];

        	echo $user_id." ".$syear." ".$selectedSem." ".$year1Sel." ".$sect1Sel." ".$sub1Sel." ".$start1." ".$end1
         	." ".$year2Sel." ".$sect2Sel." ".$sub2Sel." ".$start2." ".$end2
         	." ".$year3Sel." ".$sect3Sel." ".$sub3Sel." ".$start3." ".$end3
         	." ".$year4Sel." ".$sect4Sel." ".$sub4Sel." ".$start4." ".$end4
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

		$editmonquery = "UPDATE tbl_monsched SET 
			school_year = '$syear', semester  = '$selectedSem', 
			year1 = '$year1Sel', section1 = '$sect1Sel', subject1 = '$sub1Sel',starttime1 = '$start1', endtime1 = '$end1',
			year2 = '$year2Sel', section2 = '$sect2Sel', subject2 = '$sub2Sel',starttime2 = '$start2', endtime2 = '$end2',
			year3 = '$year3Sel', section3 = '$sect3Sel', subject3 = '$sub3Sel',starttime3 = '$start3', endtime3 = '$end3',
			year4 = '$year4Sel', section4 = '$sect4Sel', subject4 = '$sub4Sel',starttime4 = '$start4', endtime4 = '$end4'
			 WHERE id = '$user_id'";
		$query_res = mysqli_query($con, $editmonquery);
		}
	}
?>
