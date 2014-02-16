<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Class list successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	
	<?php if (isset($mastertrainer_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Master Trainer not found. Please check the fields and try again.</div>';} ?>
	<?php if (isset($teacher_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Teacher not found. Please check the fields and try again.</div>';} ?>
	
	<h1>Master Trainer Class List</h1>
	
	<?php echo form_open_multipart('dbms/form_mastertrainer_classlist'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>Class Information</legend>

		<div class="form" role="form">
			<div class="form-group">
				<label>Trainer Email</label>
				<input type="email" class="form-control" name="trainer_email" value="<?php echo set_value('trainer_email'); ?>">
				<?php echo form_error('trainer_email'); ?>
			</div>
				
			<div class="form-group">
				<label>Subject</label>
				<select class="form-control" name="subject">
					<?php foreach ($subjects as $subject): ?>
					<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Code; ?></option>
					<?php endforeach; ?>
				</select>
				<?php echo form_error('subject'); ?>
			</div>
			
			<div class="form-group">
				<label>Class Name</label>
				<input type="text" class="form-control" name="section" value="<?php echo set_value('section'); ?>">
				<?php echo form_error('section'); ?>
			</div>
		</div>

		<script type="text/javascript">
		function add_teacher()
		{
			var last_name = $('[name="last_name_input"]').val().trim();
			var first_name = $('[name="first_name_input"]').val().trim();
			var middle_initial = $('[name="middle_initial_input"]').val().trim();
			var school = $('[name="school_input"]').val().trim();
			var birthdate = $('[name="birthdate_input"]').val().trim();

			if (last_name && first_name && middle_initial && birthdate)
			{
				$('#teacher_table').append('<tr><td><input type="checkbox"></td>' +
					'<td><input type="hidden" name="last_name[]" value="' + last_name + '">' + last_name + '</td>' +
					'<td><input type="hidden" name="first_name[]" value="' + first_name + '">' + first_name + '</td>' +
					'<td><input type="hidden" name="middle_initial[]" value="' + middle_initial + '">' + middle_initial + '</td>' +
					'<td><input type="hidden" name="school[]" value="' + school + '">' + school + '</td>' +
					'<td><input type="hidden" name="birthdate[]" value="' + birthdate.replace(/-/gi,'') + '">' + birthdate + '</td></tr>');
			}
			else
			{
				alert('Invalid input. Please check fields and try again.');
			}
		}
		
		function delete_teacher()
		{
			if (confirm('Delete selected teachers?'))
			{
				$('#teacher_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
			}
		}
		</script>
	
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
							<input type="text" class="form-control" name="last_name_input">
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name_input">
						</div>
						<div class="form-group">
							<label>Middle Initial</label>
							<input type="text" class="form-control" name="middle_initial_input">
						</div>
						<div class="form-group"><label for="Name">School:</label>
						<select class="form-control" name="school_input">
							<?php foreach ($schools as $school): ?>
							<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch; ?></option>
							<?php endforeach; ?>
						</select>
						</div>
						<div class="form-group">
							<label>Birthdate</label>
							<input type="date" class="form-control" name="birthdate_input">
						</div>

						<div class="submit-button">
							<button type="button" class="btn btn-primary" name="submit" onclick="add_teacher();">Add to List</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<h3>List of Teachers</h3>
			<div class="customize-btn-group">
				<input type="file" name="file_teacher_class_list" accept=".xlsx" style="visibility:hidden" onchange="$('#upload_teacher_class_list').submit();">
				<button type="button" class="btn btn-primary" onclick="$('[name=file_teacher_class_list]').click();">Batch Upload</button>
				<button type="button" class="btn btn-danger" onclick="delete_teacher();">Delete</button>
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
				<?php if (isset($class_list)) foreach ($class_list as $teacher): ?>
				<tr>
					<td><input type="checkbox"></td>
					<td><?php echo $teacher['Last_Name'] ?></td>
					<td><?php echo $teacher['First_Name'] ?></td>
					<td><?php echo $teacher['Middle_Initial'] ?></td>
					<td><?php echo $teacher['School'] ?></td>
					<td><?php echo $teacher['Birthdate'] ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</form>
</div>