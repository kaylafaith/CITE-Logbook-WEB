<?php
include 'open_db.php';
if(isset($_POST['semester_id'])){
	$semester_id = $_POST['semester_id'];
	$sql_sem = mysqli_query($con, "SELECT * FROM tbl_yearlevel WHERE semester_id = '$semester_id'");
	?>
	<select name="year5" class="form-control">
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


if (isset($_POST['s_semester_id5']) && isset($_POST['year_id5'])) {
	$s_semester_id5 = $_POST['s_semester_id5'];
	$year_id5 = $_POST['year_id5'];

	$sql5 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id5' and semester_id='$s_semester_id5'");
	?>
	<select name="subject5" class="form-control" id="sub5">
		<option value="" selected="selected"></option>

		<?php
			while ($row5 = mysqli_fetch_array($sql5)) {
				?>
				<option value="<?php echo $row5['id'];?>">
					<?php echo $row5['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id6']) && isset($_POST['year_id6'])) {
	$s_semester_id6 = $_POST['s_semester_id6'];
	$year_id6 = $_POST['year_id6'];

	$sql6 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id6' and semester_id='$s_semester_id6'");
	?>
	<select name="subject6" class="form-control" id="sub6">
		<option value="" selected="selected"></option>

		<?php
			while ($row6 = mysqli_fetch_array($sql6)) {
				?>
				<option value="<?php echo $row6['id'];?>">
					<?php echo $row6['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id7']) && isset($_POST['year_id7'])) {
	$s_semester_id7 = $_POST['s_semester_id7'];
	$year_id7 = $_POST['year_id7'];

	$sql7 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id7' and semester_id='$s_semester_id7'");
	?>
	<select name="subject7" class="form-control" id="sub7">
		<option value="" selected="selected"></option>

		<?php
			while ($row7 = mysqli_fetch_array($sql7)) {
				?>
				<option value="<?php echo $row7['id'];?>">
					<?php echo $row7['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id8']) && isset($_POST['year_id8'])) {
	$s_semester_id8 = $_POST['s_semester_id8'];
	$year_id8 = $_POST['year_id8'];

	$sql8 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id8' and semester_id='$s_semester_id8'");
	?>
	<select name="subject8" class="form-control" id="sub8">
		<option value="" selected="selected"></option>

		<?php
			while ($row8 = mysqli_fetch_array($sql8)) {
				?>
				<option value="<?php echo $row8['id'];?>">
					<?php echo $row8['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}
?>
