<div class="wrapper info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>

		<h3>Internship Evaluation</h3>
		
		<legend>Information</legend>
		
		<?php echo form_open('/dbms/form_internevaluation'); ?>

		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Name Suffix</label><!-- This is the another label -->
				<input type="text" class="form-control" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
				<?php echo form_error('name_suffix', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Last Name</label><!-- This is the start where you put the label -->
				<input type="text" class="form-control" name="Last_Name" value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?><!-- The input field. Don't forget the id -->
			</div>
			
			<div class="form-group">
				<label>First Name</label><!-- This is the another label -->
				<input type="text" class="form-control" name="First_Name"
				value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('frst_name', '<div class="text-danger">', '</div>'); ?>
			</div>
		
			<div class="form-group">
				<label>Middle Initial</label><!-- This is the another label -->
				<input type="text" class="form-control" name="Middle_Initial" value="<?php echo set_value('middle_name'); ?>">
				<?php echo form_error('middle_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
		</div>
		
		<div class="form-inline">
		
			<div class="form-group">
				<label>Student ID Number</label><!-- This is the another label -->
				<input type="text" class="form-control" name="student_id_number" value="<?php echo set_value('student_id_number'); ?>">
				<?php echo form_error('student_id_number', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>School</label><!-- This is the another label -->
				<input type="text" class="form-control" name="school" value="<?php echo set_value('school'); ?>">
				<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>
			</div>
		
			<div class="form-group">
				<label>Branch</label><!-- This is the another label -->
				<input type="text" class="form-control" name="branch" value="<?php echo set_value('branch'); ?>">
				<?php echo form_error('branch', '<div class="text-danger">', '</div>'); ?>
			</div>
		
		</div>

	<div class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
		<form class="form-inline">
			<legend>Supervisor Information</legend>
			<div class="form-group">
				<label>Name</label><!-- This is the start where you put the label -->
				<input type="text" class="form-control" name="supervisor_name" value="<?php echo set_value('supervisor_name'); ?>">
				<?php echo form_error('supervisor_name', '<div class="text-danger">', '</div>'); ?><!-- The input field. Don't forget the id -->
			</div>
			
			<div class="form-group">
				<label>Position</label><!-- This is the another label -->
				<input type="text" class="form-control" name="supervisor_position" value="<?php echo set_value('supervisor_position'); ?>">
				<?php echo form_error('supervisor_position', '<div class="text-danger">', '</div>'); ?>
			</div>
		
			<div class="form-group">
				<label>Contact Details</label><!-- This is the another label -->
				<input type="text" class="form-control" name="supervisor_contact" value="<?php echo set_value('supervisor_contact'); ?>">
				<?php echo form_error('supervisor_contact', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Email</label><!-- This is the another label -->
				<input type="text" class="form-control" name="supervisor_email" value="<?php echo set_value('supervisor_email'); ?>">
				<?php echo form_error('supervisor_email', '<div class="text-danger">', '</div>'); ?>
			</div>
			</form>	
	</div>
	<div class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
		<div class="form-inline">
			<legend>Company Information</legend>
			<div class="form-group">
				<label>Name</label><!-- This is the start where you put the label -->
				<input type="text" class="form-control" name="company_name" value="<?php echo set_value('company_name'); ?>">
				<?php echo form_error('company_name', '<div class="text-danger">', '</div>'); ?>
				<!-- The input field. Don't forget the id -->
			</div>
			
			<div class="form-group">
				<label>Address</label><!-- This is the another label -->
				<input type="text" class="form-control" name="company_address" value="<?php echo set_value('company_address'); ?>">
				<?php echo form_error('company_address', '<div class="text-danger">', '</div>'); ?>
			</div>
			</div>	
	</div>
	<div class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
		<div class="form-inline">
			<legend>Internship Information</legend>
			<div class="form-group">
				<label>Start Date</label><!-- This is the start where you put the label -->
				<input type="date" class="form-control" name="start_date" value="<?php echo set_value('start_date'); ?>">
				<?php echo form_error('start_date', '<div class="text-danger">', '</div>'); ?>
				<!-- The input field. Don't forget the id -->
			</div>
			
			<div class="form-group">
				<label>End Date</label><!-- This is the another label -->
				<input type="date" class="form-control" name="end_date" value="<?php echo set_value('end_date'); ?>">
				<?php echo form_error('end_date', '<div class="text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Total Work Hours Rendered</label><!-- This is the another label -->
				<input type="number" class="form-control" name="total_work_hours" value="<?php echo set_value('total_work_hours'); ?>">
				<?php echo form_error('total_work_hours', '<div class="text-danger">', '</div>'); ?>
			</div>
			</div>	
		</div>
	</div>
	
	<div class="form-inline">
		<legend>Evaluation</legend>
		<div class="form-group">
			<label>Task Assigned</label><!-- This is the start where you put the label -->
			<input type="text" class="form-control" name="task" value="<?php echo set_value('task'); ?>">
				<?php echo form_error('task', '<div class="text-danger">', '</div>'); ?>
				<!-- The input field. Don't forget the id -->
		</div>
	</div>
		
	<h4>Rating</h4>

	<span class="help-block">Given the following skills, please give the appropriate overall rating based on your observation of the intern's performance: <br/> 5 - Outstanding, 4 - Very Good, 3 - Satisfactory, 2 - Less than satisfactory, 1 - poor</span>
	<table class="table">
		<tr>
			<th></th>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>
			<th>5</th>
		</tr>
		<tr>
			<td>English Proficiency</td>
			<td><input type="radio" name="english_proficiency" value="1"></td>
			<td><input type="radio" name="english_proficiency" value="2"></td>
			<td><input type="radio" name="english_proficiency" value="3"></td>
			<td><input type="radio" name="english_proficiency" value="4"></td>
			<td><input type="radio" name="english_proficiency" value="5"></td>
			<?php echo form_error('english_proficiency', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Computer Literacy</td>
			<td><input type="radio" name="conputer_literacy" value="1"></td>
			<td><input type="radio" name="computer_literacy" value="2"></td>
			<td><input type="radio" name="computer_literacy" value="3"></td>
			<td><input type="radio" name="computer_literacy" value="4"></td>
			<td><input type="radio" name="computer_literacy" value="5"></td>
			<?php echo form_error('computer_literacy', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Learning Orientation</td>
			<td><input type="radio" name="learning_orientation" value="1"></td>
			<td><input type="radio" name="learning_orientation" value="2"></td>
			<td><input type="radio" name="learning_orientation" value="3"></td>
			<td><input type="radio" name="learning_orientation" value="4"></td>
			<td><input type="radio" name="learning_orientation" value="5"></td>
			<?php echo form_error('learning_orientation', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Perceptual Speed and Accuracy</td>
			<td><input type="radio" name="perceptual_speed_and_accuracy" value="1"></td>
			<td><input type="radio" name="perceptual_speed_and_accuracy" value="2"></td>
			<td><input type="radio" name="perceptual_speed_and_accuracy" value="3"></td>
			<td><input type="radio" name="perceptual_speed_and_accuracy" value="4"></td>
			<td><input type="radio" name="perceptual_speed_and_accuracy" value="5"></td>
			<?php echo form_error('perceptual_speed_and_accuracy', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Reliability</td>
			<td><input type="radio" name="reliability" value="1"></td>
			<td><input type="radio" name="reliability" value="2"></td>
			<td><input type="radio" name="reliability" value="3"></td>
			<td><input type="radio" name="reliability" value="4"></td>
			<td><input type="radio" name="reliability" value="5"></td>
			<?php echo form_error('reliability', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Empathy</td>
			<td><input type="radio" name="empathy" value="1"></td>
			<td><input type="radio" name="empathy" value="2"></td>
			<td><input type="radio" name="empathy" value="3"></td>
			<td><input type="radio" name="empathy" value="4"></td>
			<td><input type="radio" name="empathy" value="5"></td>
			<?php echo form_error('empathy', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Courtesy</td>
			<td><input type="radio" name="courtesy" value="1"></td>
			<td><input type="radio" name="courtesy" value="2"></td>
			<td><input type="radio" name="courtesy" value="3"></td>
			<td><input type="radio" name="courtesy" value="4"></td>
			<td><input type="radio" name="courtesy" value="5"></td>
			<?php echo form_error('courtesy', '<div class="text-danger">', '</div>'); ?>
		</tr>
		<tr>
			<td>Responsiveness</td>
			<td><input type="radio" name="responsiveness" value="1"></td>
			<td><input type="radio" name="responsiveness" value="2"></td>
			<td><input type="radio" name="responsiveness" value="3"></td>
			<td><input type="radio" name="responsiveness" value="4"></td>
			<td><input type="radio" name="responsiveness" value="5"></td>
			<?php echo form_error('responsiveness', '<div class="text-danger">', '</div>'); ?>
		</tr>
	</table>
			
	<div class="form" role="form"> <!-- This is the start of the blocked fields -->
		<div class="form-group">
			<label>Comments and Suggestions</label><!-- This is the start where you put the label -->
			<textarea class="form-control" name="commnents" rows="3"></textarea>
			<?php echo form_error('comments', '<div class="text-danger">', '</div>'); ?>
		</div>
	</div>
	<div class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
		<div class="form-group">
			<label>Does the student meet the standards of the company for employment?</label><br/><!-- This is the start where you put the label -->
			<input type="radio" name="standard" value="yes"> Yes
			<?php echo form_error('standard', '<div class="text-danger">', '</div>'); ?><!-- The input field. Don't forget the id -->
			<input type="radio" name="standard" value="no"> No
			<?php echo form_error('standard', '<div class="text-danger">', '</div>'); ?><!-- The input field. Don't forget the id -->
		</div>
			
	</div>
</form>
</div>	
