<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include 'open_db.php';
// Check connection
 if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	if (isset($_POST['updatedata'])) {
		$id=$_POST['update_id'];
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
		$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
		$passwordhash = password_hash($last_name,PASSWORD_DEFAULT);

		$query = "UPDATE tbl_users SET username='$username', email= '$email', first_name ='$first_name', last_name= '$last_name', password = '$passwordhash' WHERE id = '$id'";
		$query_run = mysqli_query($con,$query);


		if ($query_run) {
		    echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "",
		            text: "You have successfully updated this user!",
		            icon: "success"
		        }).then(function() {
		            window.location = "admin_facultymanage.php";
		        });
		    }, 1000);
		</script>';
		}
		else{
			 echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "",
		            text: "Failed to update! Please Try Again..",
		            icon: "error"
		        }).then(function() {
		            window.location = "admin_facultymanage.php";
		        });
		    }, 1000);
		</script>';
		}
	}
}
?>