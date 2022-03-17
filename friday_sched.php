<?php
include 'open_db.php';
if(isset($_POST['semester_id'])){
	$semester_id = $_POST['semester_id'];
	$sql_sem = mysqli_query($con, "SELECT * FROM tbl_yearlevel WHERE semester_id = '$semester_id'");
	?>
	<select name="year17" class="form-control">
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


if (isset($_POST['s_semester_id17']) && isset($_POST['year_id17'])) {
	$s_semester_id17 = $_POST['s_semester_id17'];
	$year_id17 = $_POST['year_id17'];

	$sql17 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id17' and semester_id='$s_semester_id17'");
	?>
	<select name="subject17" class="form-control" id="sub17">
		<option value="" selected="selected"></option>

		<?php
			while ($row17 = mysqli_fetch_array($sql17)) {
				?>
				<option value="<?php echo $row17['id'];?>">
					<?php echo $row17['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id18']) && isset($_POST['year_id18'])) {
	$s_semester_id18 = $_POST['s_semester_id18'];
	$year_id18 = $_POST['year_id18'];

	$sql18 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id18' and semester_id='$s_semester_id18'");
	?>
	<select name="subject18" class="form-control" id="sub18">
		<option value="" selected="selected"></option>

		<?php
			while ($row18 = mysqli_fetch_array($sql18)) {
				?>
				<option value="<?php echo $row18['id'];?>">
					<?php echo $row18['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id19']) && isset($_POST['year_id19'])) {
	$s_semester_id19 = $_POST['s_semester_id19'];
	$year_id19 = $_POST['year_id19'];

	$sql19 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id19' and semester_id='$s_semester_id19'");
	?>
	<select name="subject19" class="form-control" id="sub19">
		<option value="" selected="selected"></option>

		<?php
			while ($row19 = mysqli_fetch_array($sql19)) {
				?>
				<option value="<?php echo $row19['id'];?>">
					<?php echo $row19['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}

if (isset($_POST['s_semester_id20']) && isset($_POST['year_id20'])) {
	$s_semester_id20 = $_POST['s_semester_id20'];
	$year_id20 = $_POST['year_id20'];

	$sql20 = mysqli_query($con, "select * from tbl_subject where year_id='$year_id20' and semester_id='$s_semester_id20'");
	?>
	<select name="subject20" class="form-control" id="sub20">
		<option value="" selected="selected"></option>

		<?php
			while ($row20 = mysqli_fetch_array($sql20)) {
				?>
				<option value="<?php echo $row20['id'];?>">
					<?php echo $row20['subject'];?>
				</option>
				<?php
			}
		?>
	</select>
	<?php
}
?>
