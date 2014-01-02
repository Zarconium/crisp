<div class="info-form">
	<h1>SMP Tracker</h1>
	<legend>General Information</legend>
					
					<form class="form-inline" role="form">
						<div class="form-group">
							<label>ID Number</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>State University</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Year</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Course</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">						
							<label>Taking SMP as</label>
							<select class="form-control" name="smp" value="<?php echo set_value('smp'); ?>">
								<option>Option1</option>
								<option>Option2</option>
								<option>Option3</option>
							</select>
							<?php echo form_error('smp', '<div class="text-danger">', '</div>'); ?>
						</div>
					
					</form>
					
					<legend>Business Communication</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control" name="bizcom_year" value="<?php echo set_value('bizcom_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bizcom_year', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bizcom_semester'); ?>">
				<?php echo form_error('bizcom_semester', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control" name="bizcom_status" value="<?php echo set_value('bizcom_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bizcom_status', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bizcom_grade'); ?>">
				<?php echo form_error('bizcom_grade', '<div class="text-danger">', '</div>'); ?>			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bizcom_times_taken'); ?>">
				<?php echo form_error('bizcom_times_taken', '<div class="text-danger">', '</div>'); ?>
						</div>
					
					</form>
					
					<legend>BPO101</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control" name="bpo101_year" value="<?php echo set_value('bpo101_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bpo101_year', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number" name="bpo101_semester" value="<?php echo set_value('bpo101_semester'); ?>">
				<?php echo form_error('bpo101_semester', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control" name="bpo101_status" value="<?php echo set_value('bpo101_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bpo101_status', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text" name="bpo101_grade" value="<?php echo set_value('bpo101_grade'); ?>">
				<?php echo form_error('bpo101_grade', '<div class="text-danger">', '</div>'); ?>			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number" name="bpo101_times_taken" value="<?php echo set_value('bpo101_times_taken'); ?>">
				<?php echo form_error('bpo101_times_taken', '<div class="text-danger">', '</div>'); ?>
						</div>
					
					</form>
					
					<legend>BPO102</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control" name="bpo102_year" value="<?php echo set_value('bpo102_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bpo102_year', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number" name="bpo102_semester" value="<?php echo set_value('bpo102_semester'); ?>">
				<?php echo form_error('bpo102_semester', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control" name="bpo102_status" value="<?php echo set_value('bpo102_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bpo102_status', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text" name="bpo102_grade" value="<?php echo set_value('bpo102_grade'); ?>">
				<?php echo form_error('bpo102_grade', '<div class="text-danger">', '</div>'); ?>			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number" name="bpo102_times_taken" value="<?php echo set_value('bpo102_times_taken'); ?>">
				<?php echo form_error('bpo102_times_taken', '<div class="text-danger">', '</div>'); ?>
						</div>
					
					</form>
					
					<legend>Service Culture</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control" name="sc101_year" value="<?php echo set_value('sc101_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('sc101_year', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number" name="sc101_semester" value="<?php echo set_value('sc101_semester'); ?>">
				<?php echo form_error('sc101_semester', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control" name="sc101_status" value="<?php echo set_value('sc101_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('sc101_status', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text" name="sc101_grade" value="<?php echo set_value('sc101_grade'); ?>">
				<?php echo form_error('sc101_grade', '<div class="text-danger">', '</div>'); ?>			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number" name="sc101_times_taken" value="<?php echo set_value('sc101_times_taken'); ?>">
				<?php echo form_error('sc101_times_taken', '<div class="text-danger">', '</div>'); ?>
						</div>
					
					</form>
					
					<legend>Systems Thinking</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control" name="bpo101_year" value="<?php echo set_value('bpo101_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('bpo101_year', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number" name="systh101_semester" value="<?php echo set_value('systh101_semester'); ?>">
				<?php echo form_error('systh101_semester', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control" name="systh101_status" value="<?php echo set_value('systh101_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
				<?php echo form_error('systh101_status', '<div class="text-danger">', '</div>'); ?>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text" name="systh101_grade" value="<?php echo set_value('systh101_grade'); ?>">
				<?php echo form_error('systh101_grade', '<div class="text-danger">', '</div>'); ?>			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number" name="systh101_times_taken" value="<?php echo set_value('systh101_times_taken'); ?>">
				<?php echo form_error('systh01_times_taken', '<div class="text-danger">', '</div>'); ?>
						</div>
					
					</form>
					
					<legend>Internship</legend>
					<form class="form" role="form">
					
						<div class="form-group">		
							<label>Status</label>			
							<input class="form-control" type="text" name="intern_status" value="<?php echo set_value('intern_status'); ?>">
				<?php echo form_error('intern_status', '<div class="text-danger">', '</div>'); ?>
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
								<option>Pass
								<option>Fail
								<option>Incomplete
								<option>Dropped
								<option>Currently Taking
							</select>
				<?php echo form_error('intern_stat', '<div class="text-danger">', '</div>'); ?>				
				
	<form>

	
</div>	
</BODY>

</HTML>