<?php
include 'open_db.php';
if(isset($_POST['semester_id'])){
	$semester_id = $_POST['semester_id'];
	$sql_sem = mysqli_query($con, "SELECT * FROM tbl_yearlevel WHERE semester_id = '$semester_id'");
	?>
	<select name="year13" class="form-control">
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


if (isset($_POST['s_semester_id13']) && isset($_POST['year_id13'])) {
	$s_semester_id13 = $_POST['s_semester_id13'];
	$year_id13 = $_POST['year_id13'];

	$sql13 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id13' and semester_id='$s_semester_id13'");
	?>
	<select name="subject13" class="form-control" id="sub13">
		<option value="" selected="selected"></option>

		<?php
			while ($row13 = mysqli_fetch_array($sql13)) {
				?>
				<option value="<?php echo $row13['id'];?>">
					<?php echo $row13['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id14']) && isset($_POST['year_id14'])) {
	$s_semester_id14 = $_POST['s_semester_id14'];
	$year_id14 = $_POST['year_id14'];

	$sql14 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id14' and semester_id='$s_semester_id14'");
	?>
	<select name="subject14" class="form-control" id="sub14">
		<option value="" selected="selected"></option>

		<?php
			while ($row14 = mysqli_fetch_array($sql14)) {
				?>
				<option value="<?php echo $row14['id'];?>">
					<?php echo $row14['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id15']) && isset($_POST['year_id15'])) {
	$s_semester_id15 = $_POST['s_semester_id15'];
	$year_id15 = $_POST['year_id15'];

	$sql15 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id15' and semester_id='$s_semester_id15'");
	?>
	<select name="subject15" class="form-control" id="sub15">
		<option value="" selected="selected"></option>

		<?php
			while ($row15 = mysqli_fetch_array($sql15)) {
				?>
				<option value="<?php echo $row15['id'];?>">
					<?php echo $row15['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id16']) && isset($_POST['year_id16'])) {
	$s_semester_id16 = $_POST['s_semester_id16'];
	$year_id16 = $_POST['year_id16'];

	$sql16 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id16' and semester_id='$s_semester_id16'");
	?>
	<select name="subject16" class="form-control" id="sub16">
		<option value="" selected="selected"></option>

		<?php
			while ($row16 = mysqli_fetch_array($sql16)) {
				?>
				<option value="<?php echo $row16['id'];?>">
					<?php echo $row16['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}
?>
