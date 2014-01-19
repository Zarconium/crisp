<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>BEST	 T3 Tracker</h1>
	<?php echo form_open('/dbms/form_program_t3_best_tracker'); ?>
		<!-- BUTTONS DIV -->
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		
<form class="form-inline">
	<legend>Personal Information</legend>
	<div class="form-group">
		<label>Last Name</label>
		<input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>">		
		<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>First Name</label>
		<input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>">		
		<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>Middle Initial</label>
		<input class="form-control" type="text" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>">		
		<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>School</label>
		<input class="form-control" type="text" name="school" value="<?php echo set_value('school'); ?>">		
		<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>	
	
	</div>
	<div class="form-group">
		<label>Birthday</label>
		<input class="form-control" type="date" name="birthday" value="<?php echo set_value('birthday'); ?>">		
		<?php echo form_error('birthday', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="passed"> Passed
			<option value="failed"> Failed
			<option value="complete"> Complete
			<option value="incomplete"> Incomplete
			<option value="dropped"> Dropped
		</select>
		<?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<legend>Submitted Documents</legend>
	<div class="form-group"></label>
		<label>Contract</label><br/>
			<input type="radio" name="contract" value="yes"> Yes
			<input type="radio" name="contract" value="no"> No
		<?php echo form_error('contract', '<div class="text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Interview Form</label><br/>
		<input type="radio" name="interview_form" value="yes"> Yes
		<input type="radio" name="interview_form" value="no"> No
		<?php echo form_error('interview_form', '<div class="text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Site Visit Form</label><br/>
		<input type="radio" name="site_visit_form" value="yes"> Yes
		<input type="radio" name="site_visit_form" value="no"> No
		<?php echo form_error('', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<div class="form-group">
		<label>BEST E-Learning Feedback</label><br/>
		<input type="radio" name="adept_elearning_feedback" value="yes"> Yes
		<input type="radio" name="adept_elearning_feedback" value="no"> No
		<?php echo form_error('adept_elearning_feedback', '<div class="text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>BEST T3 Feedback</label><br/>
		<input type="radio" name="adept_t3_feedback" value="yes"> Yes
		<input type="radio" name="adept_t3_feedback" value="no"> No
		<?php echo form_error('adept_t3_feedback', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<div class="form-group">
		<label>BEST CD</label><br/>
		<input type="radio" name="cd" value="yes"> Yes
		<input type="radio" name="cd" value="no"> No
		<?php echo form_error('cd', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<div class="form-group">
		<label>Certificate of Attendance</label><br/>
		<input type="radio" name="certificate_attendance" value="yes"> Yes
		<input type="radio" name="certificate_attendance" value="no"> No
		<?php echo form_error('certificate_attendance', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<div class="form-group">
		<label>BEST Certified Trainers</label><br/>
		<input type="radio" name="certificatied_trainers" value="yes"> Yes
		<input type="radio" name="certificatied_trainers" value="no"> No
	
	</div>
	<legend>Grade of Tasks</legend>
	<div class="form-group">
		<label>Task 1</label><br/>
		<input class="form-control" type="number" name="task_1" value="<?php echo set_value('task_1'); ?>">		
		<?php echo form_error('task_1', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>Task 2</label><br/>
		<input class="form-control" type="number" name="task_2" value="<?php echo set_value('task_2'); ?>">		
		<?php echo form_error('task_2', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>Task 3</label><br/>
		<input class="form-control" type="number" name="task_3" value="<?php echo set_value('task_3'); ?>">		
		<?php echo form_error('task_3', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>Task 4</label><br/>
		<input class="form-control" type="number" name="task_4" value="<?php echo set_value('task_4'); ?>">		
		<?php echo form_error('task_4', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>Task 5</label><br/>
		<input class="form-control" type="number" name="task_5" value="<?php echo set_value('task_5'); ?>">		
		<?php echo form_error('task_5', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<legend>Miscellaneous</legend>
	<div class="form-group">
		<label>Remarks</label><br/>
		<input class="form-control" type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">		
		<?php echo form_error('remarks', '<div class="text-danger">', '</div>'); ?>
	</div>
</form>
</div>