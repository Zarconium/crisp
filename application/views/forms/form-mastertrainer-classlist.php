<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Class list successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	
	<h1>Master Trainer Class List</h1>
	
	<?php echo form_open('/dbms/form_mastertrainer_class_add'); ?>

	<!-- BUTTONS DIV -->
	<div class="save">
		<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
		<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
	</div>

	<legend>Class Information</legend>
		<form class="form" role="form"> 
				
			<div class="form-group">
				<label>Trainer Email</label>
				<input type="email" class="form-control" id="trainer" name="Trainer" value="<?php echo set_value('Trainer'); ?>">
				<?php echo form_error('Trainer'); ?>
			</div>
				
			<div class="form-group">
				<label>Subject</label>
				<input type="text" class="form-control" id="subject" name="Subject" value="<?php echo set_value('Subject'); ?>">
				<?php echo form_error('Subject'); ?>
			</div>
			
			<div class="form-group">
				<label>Class Name</label>
				<input type="text" class="form-control" id="class_name" name="Subject" value="<?php echo set_value('class_name'); ?>">
				<?php echo form_error('class_name'); ?>
			</div>
			
		</form>

	<script type="text/javascript">

		function delete_teacher()
		{
			if (confirm('Delete selected teachers?'))
			{
				$('#teacher_list_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
			}
		}
		
		function add_teacher()
		{
			$Last_Name = $('[name="last_name_input"]').val().trim();
			$First_Name = $('[name="first_name_input"]').val().trim();
			$Middle_Initial = $('[name="middle_initial_input"]').val().trim();
			$Code = $('[name="code_input"]').val().trim();
			$birthdate = $('[name="birthdate_input"]').val().trim();

			if ($Last_Name && $First_Name && $Middle_Initial && $birthdate)
			{
				$('#teacher_list_table').append('<tr><td><input type="checkbox"></td>' +
					'<td><input type="hidden" name="Last_Name[]" value="' + $Last_Name + '">' + $Last_Name + '</td>' +
					'<td><input type="hidden" name="First_Name[]" value="' + $First_Name + '">' + $First_Name + '</td>' +
					'<td><input type="hidden" name="Middle_Initial[]" value="' + $Middle_Initial + '">' + $Middle_Initial + '</td>' +
					'<td><input type="hidden" name="Code[]" value="' + $Code + '">' + $Code + '</td>' +
					'<td><input type="hidden" name="birthdate[]" value="' + $birthdate + '">' + $birthdate + '</td></tr>');
			}
			else
			{
				alert('Invalid input. Please check fields and try again.');
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
					<form class="form">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" id="Last_Name"name="Last_Name" value="<?php echo set_value('Last_Name'); ?>">
				<?php echo form_error('Name'); ?>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" id="First_Name"name="First_Name" value="<?php echo set_value('First_Name'); ?>">
				<?php echo form_error('Name'); ?>
						</div>
						<div class="form-group">
							<label>Middle Initial</label>
							<input type="text" class="form-control" id="Middle_Initial"name="Middle_Initial" value="<?php echo set_value('Middle_Initial'); ?>">
				<?php echo form_error('Name'); ?>
						</div>
						<div class="form-group"><label for="Name">School:</label>
						<select class="form-control" name="current_employer">
							<?php foreach ($schools as $school): ?>
							<option value="<?php echo $school->School_ID; ?>" <?php echo set_select('Code', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
							<?php endforeach; ?>
						</select>		
						</div>
						<div class="form-group">
							<label>Contact Details</label>
							<input type="text" class="form-control" id="contact"name="Contact_Details" value="<?php echo set_value('Contact_Details'); ?>">
				<?php echo form_error('Contact_Details'); ?>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="email"name="Email" value="<?php echo set_value('Email'); ?>">
				<?php echo form_error('Email'); ?>
						</div>
							
						<div class="submit-button">
							<button class="btn btn-primary" name="submit" onclick="add_teacher();">Add to List</button>
						</div>
					
					</form>
				</div>
			</div>
		</div>
			

		<div class="col-md-9">
			<h3>List of Teachers</h3>	
			<div class="customize-btn-group">
				<?php $attributes = array('id' => 'upload_teacher_class_list', 'class' => 'teacher-button-groups'); echo form_open_multipart('dbms/upload_teacher_class_list', $attributes); ?>
					<input type="file" name="file_teacher_class_list" accept=".xlsx" style="visibility:hidden" onchange="$('#upload_teacher_class_list').submit();">
					<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_teacher_class_list]').click();">Batch Upload</button>
				<?php echo form_close(); ?>
				<button type="button" class="btn btn-danger" onclick="delete_teacher();">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<thead>
					<th></th>
					<th>Action</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Initial</th>
					<th>School</th>
					<th>Birthday</th>
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
	</div>
