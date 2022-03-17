<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
include 'open_db.php';
// Check connection
 if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
	if (isset($_POST['adduser'])) {

		$username = mysqli_real_escape_string($con,$_POST['username']);
		$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
		$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$passwordhash = password_hash($last_name,PASSWORD_DEFAULT);

		
		$check_duplicate = "SELECT username FROM tbl_users WHERE username = '$username' OR email = '$email'";
		$result = mysqli_query($con, $check_duplicate);

		$count = mysqli_num_rows($result);

		if($count > 0){
			   echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "",
		            text: "Username/Email has already been taken..Please Try Again!",
		            icon: "warning"
		        }).then(function() {
		            window.location = "admin_facultymanage.php";
		        });
		    }, 1000);
		</script>';
		}
		else{
			/*query for faculty manage*/
			$query = "INSERT INTO tbl_users (usertype,username,email,first_name, last_name, password)
	VALUES ('teacher','$username','$email','$first_name','$last_name', '$passwordhash')";
			
		$query_run = mysqli_query($con,$query);
	
			if ($query_run) {
				$users_id = $con->insert_id;
				/*query for teacher schedule*/
			$schedule1 = "INSERT INTO tbl_monsched (users_id, email, first_name, last_name, school_year, semester, 
			year1, section1, subject1, starttime1, endtime1, 
			year2, section2, subject2, starttime2, endtime2, 
			year3, section3, subject3, starttime3, endtime3,
			year4, section4, subject4, starttime4, endtime4) 
			    VALUES('$users_id','$email','$first_name','$last_name','','',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '',
				' ', '', '', '', '')";
				$query_sched1 = mysqli_query($con,$schedule1);

		  	$schedule2 = "INSERT INTO tbl_tuesched (users_id, email, first_name, last_name, school_year, semester, 
			year5, section5, subject5, starttime5, endtime5, 
			year6, section6, subject6, starttime6, endtime6, 
			year7, section7, subject7, starttime7, endtime7,
			year8, section8, subject8, starttime8, endtime8) 
			    VALUES('$users_id','$email','$first_name','$last_name','','',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '')";
				$query_sched2 = mysqli_query($con,$schedule2);

			$schedule3 = "INSERT INTO tbl_wedsched (users_id, email, first_name, last_name, school_year, semester, 
			year9, section9, subject9, starttime9, endtime9, 
			year10, section10, subject10, starttime10, endtime10, 
			year11, section11, subject11, starttime11, endtime11,
			year12, section12, subject12, starttime12, endtime12) 
			    VALUES('$users_id','$email','$first_name','$last_name','','',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '')";
				$query_sched3 = mysqli_query($con,$schedule3);

		 	$schedule4 = "INSERT INTO tbl_thursched (users_id, email, first_name, last_name, school_year, semester, 
			year13, section13, subject13, starttime13, endtime13, 
			year14, section14, subject14, starttime14, endtime14, 
			year15, section15, subject15, starttime15, endtime15,
			year16, section16, subject16, starttime16, endtime16) 
			    VALUES('$users_id','$email','$first_name','$last_name','','',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '')";
				$query_sched4 = mysqli_query($con,$schedule4);


		 	$schedule5 = "INSERT INTO tbl_frisched (users_id, email, first_name, last_name, school_year, semester, 
			year17, section17, subject17, starttime17, endtime17, 
			year18, section18, subject18, starttime18, endtime18, 
			year19, section19, subject19, starttime19, endtime19,
			year20, section20, subject20, starttime20, endtime20) 
			   VALUES('$users_id','$email','$first_name','$last_name','','',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '',
				'', '', '', '', '')";
				$query_sched5 = mysqli_query($con,$schedule5);

				if($query_sched1){
					if ($query_sched2) {
						if ($query_sched3) {
							if ($query_sched4) {
								if ($query_sched5) {
														 echo '<script>
							    setTimeout(function() {
							        swal({
							            title: "",
							            text: "You have successfully added this user!",
							            icon: "success"
							        }).then(function() {
							            window.location = "admin_facultymanage.php";
							        });
							    }, 1000);
							</script>';
								}
							}
						}
					}
				}
				else{
					 echo '<script>
				    setTimeout(function() {
				        swal({
				            title: "",
				            text: "You have encountered an error..Please Try Again!",
				            icon: "error"
				        }).then(function() {
				            window.location = "admin_facultymanage.php";
				        });
				    }, 1000);
				</script>';
				}




		}
	}
}
?>