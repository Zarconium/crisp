<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>

	
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
				<label>Trainer</label>
				<input type="text" class="form-control" id="trainer" name="Trainer" value="<?php echo set_value('Trainer'); ?>">
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
	
	<legend>Teacher List</legend>
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<form class="form">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="name"name="Name" value="<?php echo set_value('Name'); ?>">
				<?php echo form_error('Name'); ?>
						</div>
						<div class="form-group">
							<label>School</label>
							<input type="text" class="form-control" id="school"name="School" value="<?php echo set_value('School'); ?>">
				<?php echo form_error('School'); ?>
						</div>
						<div class="form-group">
							<label>Branch</label>
							<input type="text" class="form-control" id="branch"name="Branch" value="<?php echo set_value('Branch'); ?>">
				<?php echo form_error('Branch'); ?>
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
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					
					</form>
				</div>
			</div>
		</div>
			

		<div class="col-md-9">
			<h3>List of Teachers</h3>	
			<div class="customize-btn-group">
				<?php $attributes = array('id' => 'upload_teacher_class_list', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_teacher_class_list', $attributes); ?>
					<input type="file" name="file_teacher_class_list" accept=".xlsx" style="visibility:hidden" onchange="$('#upload_teacher_class_list').submit();">
					<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_teacher_class_list]').click();">Upload AdEPT Grades</button>
				<?php echo form_close(); ?>
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Name</th>
					<th>School</th>
					<th>Branch</th>
					<th>Contact Details</th>
					<th>Email</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Simon, Dayanara F.</td>
					<td>Ateneo de Manila University</td>
					<td>Quezon City</td>
					<td>09053633495</td>
					<td>dayanarasimono@yahoo.com</td>
				</tr>
			</table>
		</div>
	</div>
