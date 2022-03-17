<?php
include 'open_db.php';
if(isset($_POST['semester_id'])){
	$semester_id = $_POST['semester_id'];
	$sql_sem = mysqli_query($con, "SELECT * FROM tbl_yearlevel WHERE semester_id = '$semester_id'");
	?>
	<select name="year9" class="form-control">
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


if (isset($_POST['s_semester_id9']) && isset($_POST['year_id9'])) {
	$s_semester_id9 = $_POST['s_semester_id9'];
	$year_id9 = $_POST['year_id9'];

	$sql9 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id9' and semester_id='$s_semester_id9'");
	?>
	<select name="subject9" class="form-control" id="sub9">
		<option value="" selected="selected"></option>

		<?php
			while ($row9 = mysqli_fetch_array($sql9)) {
				?>
				<option value="<?php echo $row9['id'];?>">
					<?php echo $row9['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id10']) && isset($_POST['year_id10'])) {
	$s_semester_id10 = $_POST['s_semester_id10'];
	$year_id10 = $_POST['year_id10'];

	$sql10 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id10' and semester_id='$s_semester_id10'");
	?>
	<select name="subject10" class="form-control" id="sub10">
		<option value="" selected="selected"></option>

		<?php
			while ($row10 = mysqli_fetch_array($sql10)) {
				?>
				<option value="<?php echo $row10['id'];?>">
					<?php echo $row10['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id11']) && isset($_POST['year_id11'])) {
	$s_semester_id11 = $_POST['s_semester_id11'];
	$year_id11 = $_POST['year_id11'];

	$sql11 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id11' and semester_id='$s_semester_id11'");
	?>
	<select name="subject11" class="form-control" id="sub11">
		<option value="" selected="selected"></option>

		<?php
			while ($row11 = mysqli_fetch_array($sql11)) {
				?>
				<option value="<?php echo $row11['id'];?>">
					<?php echo $row11['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id12']) && isset($_POST['year_id12'])) {
	$s_semester_id12 = $_POST['s_semester_id12'];
	$year_id12 = $_POST['year_id12'];

	$sql12 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id12' and semester_id='$s_semester_id12'");
	?>
	<select name="subject12" class="form-control" id="sub12">
		<option value="" selected="selected"></option>

		<?php
			while ($row12 = mysqli_fetch_array($sql12)) {
				?>
				<option value="<?php echo $row12['id'];?>">
					<?php echo $row12['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}
?>
