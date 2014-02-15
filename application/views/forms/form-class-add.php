<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Class list successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	
	<?php if (isset($student_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student not found. Please check the fields and try again.</div>';} ?>
	<?php if (isset($teacher_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Teacher not found. Please check the fields and try again.</div>';} ?>

	<h1>Student Class List</h1>

	<?php echo form_open_multipart('dbms/form_class_add'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
			
		<legend>Class Information</legend>

		<input type="hidden" name="code" value="<?php echo set_value('code'); ?>">
		<?php echo form_error('code'); ?>
		
		<div class="form-inline">
			<div class="form-group">
				<label for="Teacher">Teacher's Last Name</label>
				<input class="form-control" type="text" name="teacher_last_name" value="<?php echo set_value('teacher_last_name'); ?>" maxlength="250" />
				<?php echo form_error('teacher_last_name'); ?>
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's First Name</label>
				<input class="form-control" type="text" name="teacher_first_name" value="<?php echo set_value('teacher_first_name'); ?>" maxlength="250" />
				<?php echo form_error('teacher_first_name'); ?>
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's Middle Initial</label>
				<input class="form-control" type="text" name="teacher_middle_initial" value="<?php echo set_value('teacher_middle_initial'); ?>" maxlength="250" />
				<?php echo form_error('teacher_middle_initial'); ?>
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's Email</label>
				<input class="form-control" type="email" name="teacher_email" value="<?php echo set_value('teacher_email'); ?>" maxlength="250" />
				<?php echo form_error('teacher_email'); ?>
			</div>

			<div class="form-group">
				<label for="Teacher">Teacher's Birthdate</label>
				<input class="form-control" type="date" name="teacher_birthdate" value="<?php echo set_value('teacher_birthdate'); ?>" maxlength="250" />
				<?php echo form_error('teacher_birthdate'); ?>
			</div>

			<br/>
			
			<div class="form-group">
				<label for="Name">School:</label>
				<select class="form-control" name="school">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID; ?>" <?php echo set_select('school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('school'); ?>
			</div>

			<div class="form-group">
				<label for="Subject">Subject:</label>
				<select class="form-control" name="subject">
				<?php foreach ($subjects as $subject): ?>
					<option value="<?php echo $subject->Subject_ID; ?>" <?php echo set_select('subject', $subject->Subject_ID); ?>><?php echo $subject->Subject_Code; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('subject'); ?>
			</div><br/>

			<div class="form-group">
				<label for="Semester">Semester:</label>
				<input class="form-control" type="number" name="semester" value="<?php echo set_value('semester'); ?>" maxlength="10" />
				<?php echo form_error('semester'); ?>
			</div>

			<div class="form-group">
				<label for="Year">Year:</label>
				<input class="form-control" type="number" name="year" value="<?php echo set_value('year'); ?>" maxlength="4" />
				<?php echo form_error('year'); ?>
			</div>

			<div class="form-group">
				<label for="Section">Section:</label>
				<input class="form-control" type="text" name="section" value="<?php echo set_value('section'); ?>" maxlength="4" />
				<?php echo form_error('section'); ?>
			</div>
		</div>

		<script type="text/javascript">
		function delete_student()
		{
			if (confirm('Delete selected students?'))
			{
				$('#student_list_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
			}
		}
		
		function add_student()
		{
			$Last_Name = $('[name="last_name_input"]').val().trim();
			$First_Name = $('[name="first_name_input"]').val().trim();
			$Middle_Initial = $('[name="middle_initial_input"]').val().trim();
			$Student_Number = $('[name="student_number_input"]').val().trim();

			if ($Last_Name && $First_Name && $Middle_Initial && $Student_Number)
			{
				$('#student_list_table').append('<tr><td><input type="checkbox"></td>' +
					'<td><input type="hidden" name="last_name[]" value="' + $Last_Name + '">' + $Last_Name + '</td>' +
					'<td><input type="hidden" name="first_name[]" value="' + $First_Name + '">' + $First_Name + '</td>' +
					'<td><input type="hidden" name="middle_initial[]" value="' + $Middle_Initial + '">' + $Middle_Initial + '</td>' +
					'<td><input type="hidden" name="student_number[]" value="' + $Student_Number + '">' + $Student_Number + '</td></tr>');
			}
			else
			{
				alert('Invalid input. Please check fields and try again.');
			}
		}
		</script>
		
		<legend>Student List</legend>
	 
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">Add or Edit Student</div>
				<div class="panel-body">
					<div class="form" role="form">
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="last_name_input">
						</div>
						
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name_input">
						</div>
						
						<div class="form-group">
							<label>Middle Initial</label>
							<input type="text" class="form-control" name="middle_initial_input">
						</div>

						<div class="form-group">
							<label>Student Number</label>
							<input type="text" class="form-control" name="student_number_input">
						</div>
						
						<div class="submit-button">
							<button type="button" class="btn btn-primary" name="submit" onclick="add_student();">Add to List</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<h3>List of Students</h3>

			<div class="customize-btn-group">
				<button type="button" class="btn btn-primary" onclick="$('[name=file_student_class_list]').click();">Batch Upload</button>
				<button type="button" class="btn btn-danger" onclick="delete_student();">Delete</button>
				<input type="file" name="file_student_class_list" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('[name=save_draft]').click();">
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
					<?php if (isset($class_list)) foreach ($class_list as $student): ?>
					<tr>
						<td><input type="checkbox"></td>
						<td><input type="hidden" name="last_name[]" value="<?php echo $student['Last_Name'] ?>"><?php echo $student['Last_Name'] ?></td>
						<td><input type="hidden" name="first_name[]" value="<?php echo $student['First_Name'] ?>"><?php echo $student['First_Name'] ?></td>
						<td><input type="hidden" name="middle_initial[]" value="<?php echo $student['Middle_Initial'] ?>"><?php echo $student['Middle_Initial'] ?></td>
						<td><input type="hidden" name="student_number[]" value="<?php echo $student['Student_ID_Number'] ?>"><?php echo $student['Student_ID_Number'] ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</form>
</div>

<script type="text/javascript">
$('[name="save_draft"]').click
(
	function()
	{
		$('[name="code"]').val($('[name="school"]').val() + $('[name="teacher_first_name"]').val().charAt(0)+ $('[name="teacher_middle_initial"]').val().charAt(0)+ $('[name="teacher_last_name"]').val().charAt(0)+ $('[name="teacher_birthdate"]').val().replace(/-/gi,''));
	}
);

$('[name="submit"]').click
(
	function()
	{
		$('[name="code"]').val($('[name="school"]').val() + $('[name="teacher_first_name"]').val().charAt(0)+ $('[name="teacher_middle_initial"]').val().charAt(0)+ $('[name="teacher_last_name"]').val().charAt(0)+ $('[name="teacher_birthdate"]').val().replace(/-/gi,''));
	}
);
</script>