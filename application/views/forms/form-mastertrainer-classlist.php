<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Class list successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	
	<?php if (isset($mastertrainer_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Master Trainer not found. Please check the fields and try again.</div>';} ?>
	<?php if (isset($teacher_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Teacher not found. Please check the fields and try again.</div>';} ?>
	
	<h1>Master Trainer Class List</h1>
	
	<?php echo form_open_multipart('dbms/form_mastertrainer_classlist/' . $t3_class->T3_Class_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>Class Information</legend>

		<div class="form-inline" role="form">
			<div class="form-group">
				<label>Trainer Email</label>
				<input type="email" class="form-control" name="trainer_email" value="<?php echo $t3_class->Mastertrainer_Email; ?>" readonly="true">
			</div>
			<br />

			<div class="form-group">
				<label for="Name">School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID; ?>" <?php if ($t3_class->School_ID == $school->School_ID) echo 'selected="selected"'; ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
				
			<div class="form-group">
				<label>Subject</label>
				<select class="form-control" name="subject" disabled="true">
					<?php foreach ($subjects as $subject): ?>
					<option value="<?php echo $subject->Subject_ID; ?>" <?php if ($t3_class->Subject_ID == $subject->Subject_ID) echo 'selected="selected"'; ?>><?php echo $subject->Subject_Code; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<br />
			
			<div class="form-group">
				<label>Section</label>
				<input type="text" class="form-control" name="section" value="<?php echo $t3_class->Section; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label for="Year">School Year</label>
				<input class="form-control" type="text" name="year" value="<?php echo $t3_class->School_Year; ?>" readonly="true">
			</div>
		</div>

		<legend>Teacher List</legend>

		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name">
							<?php echo form_error('last_name'); ?>
						</div>

						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name">
							<?php echo form_error('first_name'); ?>
						</div>

						<div class="form-group">
							<label>Middle Initial</label>
							<input type="text" class="form-control" name="middle_initial">
							<?php echo form_error('middle_initial'); ?>
						</div>

						<div class="form-group"><label for="Name">School:</label>
							<select class="form-control" name="school">
							<?php foreach ($schools as $school): ?>
								<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch; ?></option>
							<?php endforeach; ?>
							<?php echo form_error('school'); ?>
							</select>
						</div>

						<div class="form-group">
							<label>Birthdate</label>
							<input type="date" class="form-control" name="birthdate">
							<?php echo form_error('birthdate'); ?>
						</div>

						<div class="submit-button">
							<button type="submit" class="btn btn-primary" name="add_teacher" value="add_teacher">Add to List</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<h3>List of Teachers</h3>
			<div class="customize-btn-group">
				<button type="submit" class="btn btn-danger" name="delete_teacher" value="delete_teacher">Delete</button>
			</div>
			<table class="table" id="teacher_table">
				<thead>
				<tr>
					<th></th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Initial</th>
					<th>School</th>
					<th>Birthdate</th>
				</tr>
				</thead>
				<tbody>
				<?php if ($teachers) foreach ($teachers as $teacher): ?>
				<tr>
					<td><input type="checkbox" name="teacher_id[]" value="<?php echo $teacher->Teacher_Class_ID;?>"></td>
					<td><?php echo $teacher->Last_Name; ?></td>
					<td><?php echo $teacher->First_Name; ?></td>
					<td><?php echo $teacher->Middle_Initial; ?></td>
					<td><?php echo $teacher->School_Name; ?></td>
					<td><?php echo $teacher->Birthdate; ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</form>
</div>