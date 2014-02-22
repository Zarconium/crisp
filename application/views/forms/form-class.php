<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Class list successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	
	<?php if (isset($student_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student not found. Please check the fields and try again.</div>';} ?>
	<?php if (isset($teacher_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Teacher not found. Please check the fields and try again.</div>';} ?>

	<h1>Student Class List</h1>

	<?php echo form_open_multipart('dbms/form_class/' . $class->Class_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
			
		<legend>Class Information</legend>

		<div class="form-inline">
			<div class="form-group">
				<label for="Teacher">Teacher's Last Name</label>
				<input class="form-control" type="text" name="teacher_last_name" value="<?php echo $class->Last_Name; ?>" readonly="true" />
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's First Name</label>
				<input class="form-control" type="text" name="teacher_first_name" value="<?php echo $class->First_Name; ?>" readonly="true" />
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's Middle Initial</label>
				<input class="form-control" type="text" name="teacher_middle_initial" value="<?php echo $class->Middle_Initial; ?>" readonly="true" />
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's Email</label>
				<input class="form-control" type="email" name="teacher_email" value="<?php echo $class->Teacher_Email; ?>" readonly="true" />
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's Birthdate</label>
				<input class="form-control" type="date" name="teacher_birthdate" value="<?php echo $class->Birthdate; ?>" readonly="true" />
			</div>

			<br/>
			
			<div class="form-group">
				<label for="Name">School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID; ?>" <?php if ($class->School_ID == $school->School_ID) echo 'selected="selected"'; ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="Subject">Subject</label>
				<select class="form-control" name="subject" disabled="true">
				<?php foreach ($subjects as $subject): ?>
					<option value="<?php echo $subject->Subject_ID; ?>" <?php if ($class->Subject_ID == $subject->Subject_ID) echo 'selected="selected"'; ?>><?php echo $subject->Subject_Code; ?></option>
				<?php endforeach; ?>
				</select>
			</div><br/>

			<div class="form-group">
				<label for="Section">Section</label>
				<input class="form-control" type="text" name="section" value="<?php echo $class->Section; ?>" readonly="true" />
			</div>

			<div class="form-group">
				<label for="Semester">Semester</label>
				<input class="form-control" type="number" name="semester" value="<?php echo $class->Semester; ?>" readonly="true" />
			</div>

			<div class="form-group">
				<label for="Year">School Year</label>
				<input class="form-control" type="text" name="year" value="<?php echo $class->School_Year; ?>" readonly="true" />
			</div>
		</div>
		
		<legend>Student List</legend>
	 
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">Add or Edit Student</div>
				<div class="panel-body">
					<div class="form" role="form">
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="last_name">
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

						<div class="form-group">
							<label>Student Number</label>
							<input type="text" class="form-control" name="student_number">
							<?php echo form_error('student_number'); ?>
						</div>
						
						<div class="submit-button">
							<button type="submit" class="btn btn-primary" name="add_student" value="add_student">Add to List</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<h3>List of Students</h3>

			<div class="customize-btn-group">
				<button type="submit" class="btn btn-danger" name="delete_student" value="delete_student">Delete</button>
			</div>

			<table class="table table-striped table-area" id="student_list_table">
				<thead>
					<tr>
						<th>Check</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Student Number</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($students) foreach ($students as $student): ?>
					<tr>
						<td><input type="checkbox" name="student_id[]" value="<?php echo $student->Student_Class_ID; ?>"></td>
						<td><?php echo $student->Last_Name; ?></td>
						<td><?php echo $student->First_Name; ?></td>
						<td><?php echo $student->Middle_Initial; ?></td>
						<td><?php echo $student->Student_ID_Number; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</form>
</div>