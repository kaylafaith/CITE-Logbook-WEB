<?php
include 'open_db.php';
if(isset($_POST['semester_id'])){
	$semester_id = $_POST['semester_id'];
	$sql_sem = mysqli_query($con, "SELECT * FROM tbl_yearlevel WHERE semester_id = '$semester_id'");
	?>
	<select name="year1" class="form-control">
		<option value=""></option>
		<?php
			while ($row = mysqli_fetch_array($sql_sem)) {
				?>
				<option value="<?php echo $row['id'];?>">
					<?php echo $row['yearlevel'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}


if (isset($_POST['s_semester_id1']) && isset($_POST['year_id1'])) {
	$s_semester_id1 = $_POST['s_semester_id1'];
	$year_id1 = $_POST['year_id1'];

	$sql1 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id1' and semester_id='$s_semester_id1'");
	?>
	<select name="subject1" class="form-control" id="sub1">
		<option value="" selected="selected"></option>

		<?php
			while ($row1 = mysqli_fetch_array($sql1)) {
				?>
				<option value="<?php echo $row1['id'];?>">
					<?php echo $row1['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id2']) && isset($_POST['year_id2'])) {
	$s_semester_id2 = $_POST['s_semester_id2'];
	$year_id2 = $_POST['year_id2'];

	$sql2 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id2' and semester_id='$s_semester_id2'");
	?>
	<select name="subject2" class="form-control" id="sub2">
		<option value="" selected="selected"></option>

		<?php
			while ($row2 = mysqli_fetch_array($sql2)) {
				?>
				<option value="<?php echo $row2['id'];?>">
					<?php echo $row2['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id3']) && isset($_POST['year_id3'])) {
	$s_semester_id3 = $_POST['s_semester_id3'];
	$year_id3 = $_POST['year_id3'];

	$sql3 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id3' and semester_id='$s_semester_id3'");
	?>
	<select name="subject3" class="form-control" id="sub3">
		<option value="" selected="selected"></option>

		<?php
			while ($row3 = mysqli_fetch_array($sql3)) {
				?>
				<option value="<?php echo $row3['id'];?>">
					<?php echo $row3['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id4']) && isset($_POST['year_id4'])) {
	$s_semester_id4 = $_POST['s_semester_id4'];
	$year_id4 = $_POST['year_id4'];

	$sql4 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id4' and semester_id='$s_semester_id4'");
	?>
	<select name="subject4" class="form-control" id="sub4">
		<option value="" selected="selected"></option>

		<?php
			while ($row4 = mysqli_fetch_array($sql4)) {
				?>
				<option value="<?php echo $row4['id'];?>">
					<?php echo $row4['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}
?>
