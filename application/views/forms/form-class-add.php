<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>

    <h1>Student Class List</h1>

		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
		
	<legend>Class Information</legend>  
	
	<form class="form-inline">
	
		<div class="form-group"><label for="Teacher">Teacher's Last Name</label>
		<input class="form-control" type="text" name="teacher_last_name" value="<?php echo set_value('teacher_last_name'); ?>" maxlength="250" />
		<?php echo form_error('teacher_last_name', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Teacher">Teacher's First Name</label>
		<input class="form-control" type="text" name="teacher_first_name" value="<?php echo set_value('teacher_first_name'); ?>" maxlength="250" />
		<?php echo form_error('teacher_first_name', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Teacher">Teacher's Middle Initial</label>
		<input class="form-control" type="text" name="teacher_middle_initial" value="<?php echo set_value('teacher_middle_initial'); ?>" maxlength="250" />
		<?php echo form_error('teacher_middle_initial', '<div class="text-danger">', '</div>'); ?>
		</div>
		<br/>
		
		<div class="form-group"><label for="Name">School:</label>
		<select class="form-control" name="current_employer">
			<?php foreach ($schools as $school): ?>
			<option value="<?php echo $school->School_ID; ?>" <?php echo set_select('current_employer', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
			<?php endforeach; ?>
		</select>		
		</div>

		<div class="form-group"><label for="Subject">Subject:</label>
			<select class="form-control" name="program_student_subject_subject">
					<?php foreach ($subjects as $subject): ?>
					<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Code; ?></option>
					<?php endforeach; ?>
			</select>
		<?php echo form_error('subject', '<div class="text-danger">', '</div>'); ?>		
		</div>
		<br/>

		<div class="form-group"><label for="Semester">Semester:</label>
		<input class="form-control" type="text" name="semester" value="<?php echo set_value('semester'); ?>" maxlength="10" />
		<?php echo form_error('semester', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Year">Year:</label>
		<input class="form-control" type="text" name="year" value="<?php echo set_value('year'); ?>" maxlength="4" />
		<?php echo form_error('year', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Section">Section:</label>
		<input class="form-control" type="text" name="section" value="<?php echo set_value('section'); ?>" maxlength="4" />
		<?php echo form_error('section', '<div class="text-danger">', '</div>'); ?>
		</div>
	</form>
	
	<legend>Student List</legend>
 
		<div class="col-md-3">
		<div class="panel panel-info">
		<div class="panel-heading">Add or Edit Student</div>
		<div class="panel-body">
		<form class="form" role="form">
			<div class="form-group">		
				<label>Last Name</label>			
				<input class="form-control" type="text" name="last_name" "<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" "<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" name="middle_initial" "<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Student Number</label>
				<input type="text" class="form-control" name="student_id_number" "<?php echo set_value('student_id_number'); ?>">
				<?php echo form_error('student_id_number', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="submit-button">
				<button type="button" class="btn btn-primary" name="submit" onclick="add_student();">Add to List</button>
			</div>
		
		</form>
	
		</div>
		</div>
				
		</div>
 
	<div class="col-md-9">
	<legend>List of Students</legend>
	<div class="customize-btn-group">
		<?php $attributes = array('id' => 'upload_student_class_list', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_student_class_list', $attributes); ?>
			<input type="file" name="file_student_class_list" accept=".xlsx" style="visibility:hidden" onchange="$('#upload_student_class_list').submit();">
			<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_student_class_list]').click();">Upload AdEPT Grades</button>
		<?php echo form_close(); ?>

		<button type="button" class="btn btn-danger" onclick="delete_student();">Delete</button>
	</div>
	<table class="table table-striped table-area" id="student_list_table">
		<thead>
			<tr>
				<th>Check</th>
				<th>Action</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Middle Initial</th>
				<th>Student Number</th>
			</tr>
		</thead>
			<?php if ($student_class_list) foreach ($student_class_list as $student): ?>
			<tr>
				<td><input type="checkbox"></td>
				<td><a href="<?php echo base_url('dbms/form_teacher_profile/' . $teacher->Teacher_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_teacher/' . $teacher->Teacher_ID); ?>" onClick="return confirm('Delete record?');">Delete</a></td>
				<td><?php echo $student->Last_Name ?></td>
				<td><?php echo $student->First_Name ?></td>
				<td><?php echo $student->Middle_Initial ?></td>
				<td><?php echo $student->Student_Number ?></td>
			</tr>
			<?php endforeach; ?>
			</table>

	<script type="text/javascript">

	function delete_student()
	{
		if (confirm('Delete selected institutions?'))
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
				'<td><input type="hidden" name="Last_Name[]" value="' + $Last_Name + '">' + $Last_Name + '</td>' +
				'<td><input type="hidden" name="First_Name[]" value="' + $First_Name + '">' + $First_Name + '</td>' +
				'<td><input type="hidden" name="Middle_Initial[]" value="' + $Middle_Initial + '">' + $Middle_Initial + '</td>' +
				'<td><input type="hidden" name="Student_Number[]" value="' + $Student_Number + '">' + $Student_Number + '</td></tr>');
		}
		else
		{
			alert('Invalid input. Please check fields and try again.');
		}
	}


	</script>
	</div>

