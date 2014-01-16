<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>Teacher Form</h1>
	
	<legend>Personal Information</legend>

	<?php echo form_open('/dbms/form_teacher_application'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<input type="hidden" name="code" value="<?php echo set_value('code'); ?>">
		<?php echo form_error('code'); ?>
	
		<div class="form-inline">
			<div class="form-group">
				<label>Name Suffix</label>
				<input class="form-control" type="text" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
				<?php echo form_error('name_suffix'); ?>
			</div>
			
			<div class="form-group">
				<label>Last Name</label>
				<input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name'); ?>
			</div>

			<div class="form-group">
				<label>First Name</label>
				<input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name'); ?>
			</div>

			<div class="form-group">
				<label>Middle Initial</label>
				<input class="form-control" type="text" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial'); ?>
			</div>
		</div>
			
		<div class="form-inline">
			<div class="form-group">
				<label>Birthdate</label>
				<input type="date" class="form-control" name="birthdate" value="<?php echo set_value('birthdate'); ?>">
				<?php echo form_error('birthdate'); ?>
			</div>
			
			<div class="form-group">
				<label>Birthplace</label>
				<input class="form-control" type="text" name="birthplace" value="<?php echo set_value('birthplace'); ?>">
				<?php echo form_error('birthplace'); ?>
			</div>
		</div>
	
		<div class="form-inline">
			<div class="form-group">
				<label>Nationality</label>
				<input class="form-control" type="text" name="nationality" value="<?php echo set_value('nationality'); ?>">
				<?php echo form_error('nationality'); ?>
			</div>
			
			<div class="form-group">
				<label>Total Years of Teaching</label>
				<input class="form-control" type="number" name="total_year_teaching" value="<?php echo set_value('total_year_teaching'); ?>">
				<?php echo form_error('total_year_teaching'); ?>
			</div>		
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Civil Status</label><br/>
				<input type="radio" name="civil" value="married" <?php echo set_radio('civil', 'married'); ?>> Married
				<input type="radio" name="civil" value="single" <?php echo set_radio('civil', 'single'); ?>> Single
				<input type="radio" name="civil" value="separated" <?php echo set_radio('civil', 'separated'); ?>> Separated
				<input type="radio" name="civil" value="widowed" <?php echo set_radio('civil', 'widowed'); ?>> Widowed
				<?php echo form_error('civil'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Gender</label><br/>
				<input type="radio" name="gender" value="M" <?php echo set_radio('gender', 'M'); ?>> Male
				<input type="radio" name="gender" value="F" <?php echo set_radio('gender', 'F'); ?>> Female
				<?php echo form_error('gender'); ?>
			</div>
		</div>	
			
		<div class="form-inline">
			<div class="form-group">
				<label>Do you own a desktop?</label><br/>
				<input type="radio" name="desktop" value="1" <?php echo set_radio('desktop', '1'); ?>> Yes
				<input type="radio" name="desktop" value="0" <?php echo set_radio('desktop', '0'); ?>> No
				<?php echo form_error('desktop'); ?>
			</div>
		</div>
			
		<div class="form-inline">
			<div class="form-group">
				<label>Do you own a laptop?</label><br/>
				<input type="radio" name="laptop" value="1" <?php echo set_radio('laptop', '1'); ?>> Yes
				<input type="radio" name="laptop" value="0" <?php echo set_radio('laptop', '0'); ?>> No
				<?php echo form_error('laptop'); ?>
			</div>
		</div>
			
		<div class="form-inline">
			<div class="form-group">
				<label>Do you have Internet access outside school?</label><br/>
				<input type="radio" name="access" value="1" <?php echo set_radio('access', '1'); ?>> Yes
				<input type="radio" name="access" value="0" <?php echo set_radio('access', '0'); ?>> No
				<?php echo form_error('access'); ?>
			</div>
		</div>
		
		<legend>Current Address</legend>
			
		<div class="form-inline" role="form">
			<div class="form-group">
				<label>Street Number</label>
				<input type="text" class="form-control" name="street_number" value="<?php echo set_value('street_number'); ?>">
				<?php echo form_error('street_number'); ?>
			</div>
				
			<div class="form-group">
				<label>Street Name</label>
				<input type="text" class="form-control" name="street_name" value="<?php echo set_value('street_name'); ?>">
				<?php echo form_error('street_name'); ?>
			</div>
				
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">
				<?php echo form_error('city'); ?>
			</div>		
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Province</label>
				<input type="text" class="form-control" name="province" value="<?php echo set_value('province'); ?>">
				<?php echo form_error('province'); ?>
			</div>

			<div class="form-group">
				<label>Region</label>
				<input type="text" class="form-control" name="region" value="<?php echo set_value('region'); ?>">
				<?php echo form_error('region'); ?>
			</div>
		</div>
		
		<legend>Alternate Address</legend>
			
		<div class="form-inline" role="form">
			<div class="form-group">
				<label>Alternate Address</label>
				<input type="text" class="form-control" name="alternate_address" value="<?php echo set_value('alternate_address'); ?>">
				<?php echo form_error('alternate_address'); ?>
			</div>
		</div>
		
		<legend>Contact Details</legend>
			
		<div class="form-inline">
			
			<div class="form-group">
				<label>Mobile Number</label>
				<input class="form-control" type="number" name="mobile" value="<?php echo set_value('mobile'); ?>">
				<?php echo form_error('mobile'); ?>
			</div>
			
			<div class="form-group">
				<label>Landline</label>
				<input class="form-control" type="number" name="landline" value="<?php echo set_value('landline'); ?>">
				<?php echo form_error('landline'); ?>
			</div>
			
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>">
				<?php echo form_error('email'); ?>
			</div>
			
			<div class="form-group">
				<label>Facebook</label>
				<input class="form-control" type="text" name="facebook" value="<?php echo set_value('facebook'); ?>">
				<?php echo form_error('facebook'); ?>
			</div>
		
		</div>

		<legend>Academic Background</legend>
		
		<div class="form-inline">
			<div class="form-group subtitle">
				<label>College</label>
			</div>
			
			<div class="form-group">
				<label>AB / BS</label>
				<select class="form-control" name="degree_type">
					<option value="BS" <?php echo set_select('degree_type', 'BS'); ?>>BS</option>
					<option value="AB" <?php echo set_select('degree_type', 'AB'); ?>>AB</option>
				</select>
				<?php echo form_error('degree_type'); ?>
			</div>
			
			<div class="form-group">
				<label>Degree</label>
				<input class="form-control" type="text" name="degree" value="<?php echo set_value('degree'); ?>">
				<?php echo form_error('degree'); ?>
			</div>
			
			<div class="form-group">
				<label>School</label>
				<input class="form-control" type="text" name="school" value="<?php echo set_value('school'); ?>">
				<?php echo form_error('school'); ?>
			</div>	
		</div>	
			
		<div class="form-inline">
			<div class="form-group subtitle">
				<label>Masters</label>
			</div>

			<div class="form-group">
				<label>MS / MA</label>
				<select class="form-control" name="master_type">
					<option value="MS" <?php echo set_select('master_type', 'MS'); ?>>MS</option>
					<option value="MA" <?php echo set_select('master_type', 'MA'); ?>>MA</option>
				</select>
				<?php echo form_error('master_type'); ?>
			</div>
			
			<div class="form-group">
				<label>Degree</label>
				<input class="form-control" type="text" name="master_degree" value="<?php echo set_value('master_degree'); ?>">
				<?php echo form_error('master_degree'); ?>
			</div>
			
			<div class="form-group">
				<label>School</label>
				<input class="form-control" type="text" name="master_school" value="<?php echo set_value('master_school'); ?>">
				<?php echo form_error('master_school'); ?>
			</div>	
		</div>
			
		<div class="form-inline">
			<div class="form-group subtitle">
				<label>Post Graduate</label>
			</div>
			
			<div class="form-group">
				<label>Doctor</label>
				<select class="form-control" name="doctorate_type">
					<option value="PhD" <?php echo set_select('doctorate_type', 'PhD'); ?>>PhD</option>
					<option value="MD" <?php echo set_select('doctorate_type', 'MD'); ?>>MD</option>
				</select>
				<?php echo form_error('doctorate_type'); ?>
			</div>
			
			<div class="form-group">
				<label>Degree</label>
				<input class="form-control" type="text" name="doctorate_degree" value="<?php echo set_value('doctorate_degree'); ?>">
				<?php echo form_error('doctorate_degree'); ?>
			</div>
			
			<div class="form-group">
				<label>School</label>
				<input class="form-control" type="text" name="doctorate_school" value="<?php echo set_value('doctorate_school'); ?>">
				<?php echo form_error('doctorate_school'); ?>
			</div>
		</div>
		
		<legend>Work Information</legend>
		
		<div class="form-inline">
			<div class="form-group">
				<label>Employment Status</label>
				<select class="form-control" name="employment_status">
					<option value="Part" <?php echo set_select('employment_status', 'Part'); ?>>Part</option>
					<option value="Full" <?php echo set_select('employment_status', 'Full'); ?>>Full</option>
				</select>
				<?php echo form_error('employment_status'); ?>
			</div>
		
			<div class="form-group">
				<label>Current Position</label>
				<input class="form-control" type="text" name="current_position" value="<?php echo set_value('current_position'); ?>">
				<?php echo form_error('current_position'); ?>
			</div>
			
			<div class="form-group">
				<label>Current Department</label>
				<input class="form-control" type="text" name="current_department" value="<?php echo set_value('current_department'); ?>">
				<?php echo form_error('current_department'); ?>
			</div>
		</div>
		
		<div class="form-inline">
			<div class="form-group">
				<label>Current Employer</label>
				<select class="form-control" name="current_employer">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php echo set_select('current_employer', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('current_employer'); ?>
			</div>
			
			<div class="form-group">
				<label>Employer Address</label>
				<input class="form-control" type="text"  name="employer_address" value="<?php echo set_value('employer_address'); ?>">
				<?php echo form_error('employer_address'); ?>
			</div>
		</div>
		
		<div class="form-inline">
			<div class="form-group">
				<label>Name of Supervisor</label>
				<input class="form-control" type="text"  name="name_of_supervisor" value="<?php echo set_value('name_of_supervisor'); ?>">
				<?php echo form_error('name_of_supervisor'); ?>
			</div>
			
			<div class="form-group">
				<label>Position of Supervisor</label>
				<input class="form-control" type="text"  name="position_of_supervisor" value="<?php echo set_value('position_of_supervisor'); ?>">
					<?php echo form_error('position_of_supervisor'); ?>
			</div>
			<div class="form-group">
				<label>Supervisor Contact Details</label>
				<input class="form-control" type="text"  name="supervisor_contact_details" value="<?php echo set_value('supervisor_contact_details'); ?>">
				<?php echo form_error('supervisor_contact_details'); ?>
			</div>
		</div>
		
		<div class="form-inline">
			<div class="form-group">
				<label>Other Positions Held</label>
				<input class="form-control" type="text"  name="other_positions_held" value="<?php echo set_value('other_positions_held'); ?>">
				<?php echo form_error('other_positions_held'); ?>
			</div>
			
			<div class="form-group">
				<label>Classes Handling</label>
				<input class="form-control" type="text"  name="classes_handling" value="<?php echo set_value('classes_handling'); ?>">
				<?php echo form_error('classes_handling'); ?>
			</div>
		</div>

		<legend>Subjects Taught from 2011 to Present</legend>

		<script type="text/javascript">
		function subjects_taught_add()
		{
			$subject = $('[name="subjects_taught_subject_input"]').val();
			$year = $('[name="subjects_taught_year_input"]').val();

			if ($subject && $year)
			{
				$('#subjects_taught_table').append('<tr><td><input type="checkbox"></td><td><input type="hidden" name="subjects_taught_subject[]" value="' + $subject + '">' + $subject + '</td><td><input type="hidden" name="subjects_taught_year[]" value="' + $year + '">' + $year + '</td></tr>');
			}
			else
			{
				alert('Invalid input. Please check fields and try again.');
			}
		}

		function subjects_taught_delete()
		{
			if (confirm('Delete selected subjects?'))
			{
				$('#subjects_taught_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
			}
		}
		</script>
		
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Subject</label>
							<input class="form-control" type="text"  name="subjects_taught_subject_input" value="">
						</div>
						<div class="form-group">
							<label>Year</label>
							<input class="form-control" type="number"  name="subjects_taught_year_input" value="2011">
						</div>
						<div class="submit-button">
							<button type="button" class="btn btn-primary" onclick="subjects_taught_add();">Add to List</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Subjects</h3>
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger" onclick="subjects_taught_delete();">Delete</button>
			</div>
			<table class="table table-area" id="subjects_taught_table">
				<tr>
					<th></th>
					<th>Subject</th>
					<th>Year</th>
				</tr>
			</table>			
		</div>
		
		<legend>Institutions Worked in from 2011 to Present</legend>
		
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Institution</label>
							<input class="form-control" type="text"  name="institutions_worked_institution">
						</div>
						<div class="form-group">
							<label>Position</label>
							<input class="form-control" type="text"  name="institutions_worked_position">
						</div>
						<div class="form-group">
							<label>Date</label>
							<input class="form-control" type="text"  name="institutions_worked_date">
						</div>
						<div class="form-group">
							<label>Level Taught	</label>
							<input class="form-control" type="text"  name="institutions_worked_level_taught">
						</div>
						<div class="form-group">
							<label>Courses Taught</label><span class="help-block">separated by a comma</span>
							<input class="form-control" type="text"  name="institutions_worked_courses_taught">
						</div>
						<div class="form-group">
							<label>Number of Years in the Institution</label>
							<input class="form-control" type="number"  name="institutions_worked_number_of_years_in_institution">
						</div>
					
						<div class="submit-button">
							<button type="button" class="btn btn-primary" name="submit" onclick="institutions_worked_add();">Add to List</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Institutions</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Institution</th>
					<th>Position</th>
					<th>Date</th>
					<th>Level Taught</th>
					<th>Courses Taught</th>
					<th>Number of Years</th>
				</tr>
			</table>
		</div>
		
		<legend>Certifications</legend>
		
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Certifications</label>
							<input class="form-control" type="text" name="certification" value="<?php echo set_value('certification'); ?>">
						</div>
						<div class="form-group">
							<label>Certifying Body</label>
							<input class="form-control" type="text"  name="certifying_body" value="<?php echo set_value('certifying_body'); ?>">
						</div>
						<div class="form-group">
							<label>Date Received</label>
							<input class="form-control" type="date" name="date_received" value="<?php echo set_value('date_received'); ?>">
						</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Certifications</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Certification</th>
					<th>Certifying Body</th>
					<th>Date</th>
					<th>Date Received</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Example</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
				</tr>
			</table>
		</div>
		
		<legend>Awards</legend>
		
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Award</label>
							<input class="form-control" type="text" name="award" value="<?php echo set_value('award'); ?>">
						</div>
						<div class="form-group">
							<label>Awarding Body</label>
							<input class="form-control" type="text"  name="awarding_body" value="<?php echo set_value('awarding_body'); ?>">
						</div>
						<div class="form-group">
							<label>Date Received</label>
							<input class="form-control" type="date"  name="date_received" value="<?php echo set_value('date_received'); ?>">
						</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Awards</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Award</th>
					<th>Awarding Body</th>
					<th>Date</th>
					<th>Date Received</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Example</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
				</tr>
			</table>
		</div>
		
		<legend>Other Works / Related Experiences</legend>
		
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<form class="form">
						<div class="form-group">
							<label>Organization</label>
							<input class="form-control" type="text" name="organization" value="<?php echo set_value('other_work_organization'); ?>">
						</div>
						<div class="form-group">
							<label>Position</label>
							<input class="form-control" type="text"  name="other_work_position" value="<?php echo set_value('other_work_position'); ?>">
						</div>
						<div class="form-group">
							<label>Description</label>
							<input class="form-control" type="text"  name="description" value="<?php echo set_value('description'); ?>">
						</div>
						<div class="form-group">
							<label>Date</label>
							<input class="form-control" type="date"  name="other_work_date" value="<?php echo set_value('other_work_date'); ?>">
						</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Other Works / Related Experiences</h3>
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>	
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Organization</th>
					<th>Position</th>
					<th>Description</th>
					<th>Date</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Example</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
				</tr>
			</table>
		</div>
			
		<legend>Skills</legend>
			
		<div class="form">
			<div class="form-group"><label>Computer Applications Proficiency</label><span class="help-block">separated by a comma</span>
				<input class="form-control" type="text"  name="computer_proficient_skill" value="<?php echo set_value('computer_proficient_skill'); ?>">
				<?php echo form_error('computer_proficient_skill'); ?>
			</div>
			
			<div class="form-group"><label>Computer Applications Familiar With</label><span class="help-block">separated by a comma</span>
				<input class="form-control" type="text"  name="computer_familiar_skill" value="<?php echo set_value('computer_familiar_skill'); ?>">
				<?php echo form_error('computer_familiar_skill'); ?>
			</div>
				
			<div class="form-group"><label>Others</label><span class="help-block">separated by a comma</span>
				<input class="form-control" type="text"  name="skill" value="<?php echo set_value('skill'); ?>">
				<?php echo form_error('skill'); ?>
			</div>
		</div>
		
		<legend>Professional References</legend>
			
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<form class="form">
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" type="text"  name="reference_name" value="<?php echo set_value('reference_name'); ?>">
						</div>
						<div class="form-group">
							<label>Position</label>
							<input class="form-control" type="text"  name="reference_position" value="<?php echo set_value('reference_position'); ?>">
						</div>
						<div class="form-group">
							<label>Company</label>
							<input class="form-control" type="text"  name="company" value="<?php echo set_value('company'); ?>">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" type="number"  name="phone" value="<?php echo set_value('phone'); ?>">
						</div>
						<div class="form-group">
							<label>E-mail Address</label>
							<input class="form-control" type="email"  name="reference_email" value="<?php echo set_value('reference_email'); ?>">
						</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Other Works / Related Experiences</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Name</th>
					<th>Position</th>
					<th>Company</th>
					<th>Phone</th>
					<th>E-mail Address</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Example</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
				</tr>
			</table>
		</div>
				
		<legend>Affiliations and Memberships to Other Organizations</legend>
				
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Organization</label>
							<input class="form-control" type="text"  name="affiliation_organization" value="<?php echo set_value('affiliation_organization'); ?>">
						</div>
						<div class="form-group">
							<label>Organization Description</label>
							<input class="form-control" type="text"  name="organization_description" value="<?php echo set_value('organization_description'); ?>">
						</div>
						<div class="form-group">
							<label>Position</label>
							<input class="form-control" type="text"  name="affiliation_position" value="<?php echo set_value('affiliation_position'); ?>">
						</div>
						<div class="form-group">
							<label>Years of Affiliation</label>
							<input class="form-control" type="number"  name="years_of_affiliation" value="<?php echo set_value('years_of_affiliation'); ?>">
						</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Affiliations and Memberships to Other Organizations</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Organization</th>
					<th>Organization Description</th>
					<th>Position</th>
					<th>Years of Affiliation</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Example</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
				</tr>
			</table>
		</div>
		
		<legend>Documents Submitted</legend>

		<div class="form">
			<div class="form-group">
				<label>Resume</label><br/>
				<input type="radio" name="resume" value="1" <?php echo set_radio('resume', '1'); ?>> Yes
				<input type="radio" name="resume" value="0" <?php echo set_radio('resume', '0'); ?>> No
				<?php echo form_error('resume'); ?>
			</div>
			
			<div class="form-group">
				<label>Photo</label><br/>
				<input type="radio" name="photo" value="1" <?php echo set_radio('photo', '1'); ?>> Yes
				<input type="radio" name="photo" value="0" <?php echo set_radio('photo', '0'); ?>> No
				<?php echo form_error('photo'); ?>
			</div>
			
			<div class="form-group">
				<label>Proof of Certification</label><br/>
				<input type="radio" name="proof" value="1" <?php echo set_radio('proof', '1'); ?>> Yes
				<input type="radio" name="proof" value="0" <?php echo set_radio('proof', '0'); ?>> No
				<?php echo form_error('proof'); ?>
			</div>
			
			<div class="form-group">
				<label>Diploma / TOR</label><br/>
				<input type="radio" name="diploma" value="1" <?php echo set_radio('diploma', '1'); ?>> Yes
				<input type="radio" name="diploma" value="0" <?php echo set_radio('diploma', '0'); ?>> No
				<?php echo form_error('diploma'); ?>
			</div>
		</div>
	</form>
</div>
