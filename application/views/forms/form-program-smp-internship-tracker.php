<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>SMP Internship Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>SMP Internship Tracker</h1>

	<?php echo form_open('/dbms/form_program_smp_tracker/' . $internship->Student_ID); ?>
					
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

					
		<legend>General Information</legend>
		
		<div class="form-inline">
		<form role="form">
			
				<div class="form-group">
					<label>ID Number</label>
					<input type="text" class="form-control" name="id_number" value="<?php echo set_value('id_number'); ?>">
					<?php echo form_error('id_number', '<div class="text-danger">', '</div>'); ?>
				</div>
						
				<div class="form-group">		
					<label>Grades</label>			
					<input class="form-control" type="text" name="intern_grades" value="<?php echo set_value('intern_grades'); ?>">
					<?php echo form_error('intern_grades', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Remarks</label>			
					<input class="form-control" type="text" name="intern_remarks" value="<?php echo set_value('intern_remarks'); ?>">
					<?php echo form_error('intern_remarks', '<div class="text-danger">', '</div>'); ?>
				</div>	
				
				<div class="form-group">		
					<label>School</label>			
					<input class="form-control" type="text" name="intern_school" value="<?php echo set_value('intern_school'); ?>">
					<?php echo form_error('intern_school', '<div class="text-danger">', '</div>'); ?>
				</div>	
				<div class="form-group">		
					<label>Branch</label>			
					<input class="form-control" type="text" name="intern_branch" value="<?php echo set_value('intern_branch'); ?>">
					<?php echo form_error('intern_branch', '<div class="text-danger">', '</div>'); ?>
				</div>								
				<div class="form-group">		
					<label>Year</label>			
					<input class="form-control" type="text" name="intern_year" value="<?php echo set_value('intern_year'); ?>">
					<?php echo form_error('intern_year', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Semester</label>			
					<input class="form-control" type="text" name="intern_year" value="<?php echo set_value('intern_year'); ?>">
					<?php echo form_error('intern_year', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Company Information</label>			
					<input class="form-control" type="text" name="company_information" value="<?php echo set_value('company_information'); ?>">
					<?php echo form_error('company_information', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Name of Company</label>			
					<input class="form-control" type="text" name="company_name" value="<?php echo set_value('company_name'); ?>">
					<?php echo form_error('company_name', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Company Address</label>			
					<input class="form-control" type="text" name="company_address" value="<?php echo set_value('company_address'); ?>">
					<?php echo form_error('company_address', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Department / Divison</label>			
					<input class="form-control" type="text" name="department" value="<?php echo set_value('department'); ?>">
					<?php echo form_error('department', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Supervisor / Mentor</label>			
					<input class="form-control" type="text" name="supervisor" value="<?php echo set_value('supervisor'); ?>">
					<?php echo form_error('supervisor', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Supervisor's Contact Details</label>			
					<input class="form-control" type="text" name="supervisor_contact_details" value="<?php echo set_value('supervisor_contact_details'); ?>">
					<?php echo form_error('supervisor_contact_details', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Supervisor's Email</label>			
					<input class="form-control" type="text" name="supervisor_email" value="<?php echo set_value('supervisor_email'); ?>">
					<?php echo form_error('supervisor_email', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Date Started</label>			
					<input class="form-control" type="date" name="start_date" value="<?php echo set_value('start_date'); ?>">
					<?php echo form_error('start_date', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Date Ended</label>			
					<input class="form-control" type="date" name="end_date" value="<?php echo set_value('end_date'); ?>">
					<?php echo form_error('end_date', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Total Internship Hours</label>			
					<input class="form-control" type="number" name="total_internship_hours" value="<?php echo set_value('total_internship_hours'); ?>">
					<?php echo form_error('total_internship_hours', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Evaluation Form</label><br />
					<input type="radio" name="evaluation_form" value="<?php echo set_value('evaluation_form'); ?>"> Yes
					<input type="radio" name="evaluation_form" value="<?php echo set_value('evaluation_form'); ?>"> No
					<?php echo form_error('evaluation_form', '<div class="text-danger">', '</div>'); ?>
				</div>		
				<div class="form-group">		
					<label>Status</label><br />
					<select class="form-control" name="intern_stat" value="<?php echo set_value('intern_stat'); ?>">
						<option value="pass">Pass</option>
						<option value="fail">Fail</option>
						<option value="incomplete">Incomplete</option>
						<option value="dropped">Dropped</option>
						<option value="taking">Currently Taking</option>
					</select>
					<?php echo form_error('intern_stat', '<div class="text-danger">', '</div>'); ?>				
				
		</form>
		</div>
</div>	
