<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include 'open_db.php';
// Check connection
 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['deletedata'])){
$id = $_POST['delete_id'];
$sql = "DELETE FROM tbl_users WHERE id = '$id'";
$schedmon = "DELETE FROM tbl_monsched WHERE users_id = $id";
$schedtue = "DELETE FROM tbl_tuesched WHERE users_id = $id";
$schedwed = "DELETE FROM tbl_wedsched WHERE users_id = $id";
$schedthur = "DELETE FROM tbl_thursched WHERE users_id = $id";
$schedfri = "DELETE FROM tbl_frisched WHERE users_id = $id";
$querysult = mysqli_query($con, $sql);

if ($querysult){
	if($schedmon){
  		if($schedtue){
  			if($schedwed){
  				if($schedthur){
  					if($schedfri){
  						 echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "",
		            text: "You have successfully deleted this user!",
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
}
else {
    echo "Error deleting record: " . mysqli_error($con);
}
}
mysqli_close($con);
?>