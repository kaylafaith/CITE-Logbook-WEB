<?php
include 'open_db.php';
// Check connection
 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['delrequest'])){
$delidreq = $_POST['del_id'];
$sql = "DELETE FROM tbl_leave WHERE leave_id = '$delidreq'";
$querysult = mysqli_query($con, $sql);

if ($querysult){
   echo "<script>alert('Record has been Deleted!');document.location='leave_manage_admin.php'</script>";

}
else {
    echo "Error deleting record: " . mysqli_error($con);
}
}
mysqli_close($con);
?>