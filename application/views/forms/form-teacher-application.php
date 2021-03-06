<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Teacher successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>Teacher Form</h1>

	<?php echo form_open('/dbms/form_teacher_application'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
	
		<ul class="nav nav-tabs">
			<li class="active"><a href="#basic" data-toggle="tab">Basic Information</a></li>
			<li><a href="#application" data-toggle="tab">Application</a></li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="basic">

				<legend>Personal Information</legend>
			
				<input type="hidden" name="code" value="<?php echo set_value('code'); ?>">
				<?php echo form_error('code'); ?>
	
				<div class="form-inline">
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
						<input class="form-control" type="text" name="middle_initial" placeholder="Please put a '-' if there is no MI" value="<?php echo set_value('middle_initial'); ?>">
						<?php echo form_error('middle_initial'); ?>
					</div>
					
					<div class="form-group">
						<label>Name Suffix</label>
						<input class="form-control" type="text" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
						<?php echo form_error('name_suffix'); ?>
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
						<input class="form-control" type="number" name="total_year_teaching" min="0" value="<?php echo set_value('total_year_teaching'); ?>">
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
						<input class="form-control" type="number" name="mobile" min="0" value="<?php echo set_value('mobile'); ?>">
						<?php echo form_error('mobile'); ?>
					</div>
					
					<div class="form-group">
						<label>Landline</label>
						<input class="form-control" type="number" name="landline" min="0" value="<?php echo set_value('landline'); ?>">
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
							<option value="<?php echo $school->School_ID; ?>" <?php echo set_select('current_employer', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
						<?php endforeach; ?>
						</select>
						<?php echo form_error('current_employer'); ?>
					</div>
					
					<div class="form-group">
						<label>Employer Address</label>
						<input class="form-control" type="text" name="employer_address" value="<?php echo set_value('employer_address'); ?>">
						<?php echo form_error('employer_address'); ?>
					</div>
				</div>
				
				<div class="form-inline">
					<div class="form-group">
						<label>Name of Supervisor</label>
						<input class="form-control" type="text" name="name_of_supervisor" value="<?php echo set_value('name_of_supervisor'); ?>">
						<?php echo form_error('name_of_supervisor'); ?>
					</div>
					
					<div class="form-group">
						<label>Position of Supervisor</label>
						<input class="form-control" type="text" name="position_of_supervisor" value="<?php echo set_value('position_of_supervisor'); ?>">
							<?php echo form_error('position_of_supervisor'); ?>
					</div>
					
					<div class="form-group">
						<label>Supervisor Contact Details</label>
						<input class="form-control" type="text" name="supervisor_contact_details" value="<?php echo set_value('supervisor_contact_details'); ?>">
						<?php echo form_error('supervisor_contact_details'); ?>
					</div>
				</div>
				
				<div class="form-inline">
					<div class="form-group">
						<label>Other Positions Held</label>
						<input class="form-control" type="text" name="other_positions_held" value="<?php echo set_value('other_positions_held'); ?>">
						<?php echo form_error('other_positions_held'); ?>
					</div>
					
					<div class="form-group">
						<label>Classes Handling</label>
						<input class="form-control" type="text" name="classes_handling" value="<?php echo set_value('classes_handling'); ?>">
						<?php echo form_error('classes_handling'); ?>
					</div>
				</div>

				<legend>Institutions Worked in from 2011 to Present</legend>

				<script type="text/javascript">
				function institutions_worked_add()
				{
					$institution = $('[name="institutions_worked_institution_input"]').val().trim();
					$position = $('[name="institutions_worked_position_input"]').val().trim();
					$year_started = $('[name="institutions_worked_year_started_input"]').val().trim();
					$level_taught = $('[name="institutions_worked_level_taught_input"]').val().trim();
					$courses_taught = $('[name="institutions_worked_courses_taught_input"]').val().trim();
					$number_of_years_in_institution = $('[name="institutions_worked_number_of_years_in_institution_input"]').val().trim();

					if ($institution && $position && $year_started && $level_taught && $courses_taught && $number_of_years_in_institution)
					{
						$('#institutions_worked_table').append('<tr><td><input type="checkbox"></td>' +
							'<td><input type="hidden" name="institutions_worked_institution[]" value="' + $institution + '">' + $institution + '</td>' +
							'<td><input type="hidden" name="institutions_worked_position[]" value="' + $position + '">' + $position + '</td>' +
							'<td><input type="hidden" name="institutions_worked_year_started[]" value="' + $year_started + '">' + $year_started + '</td>' +
							'<td><input type="hidden" name="institutions_worked_level_taught[]" value="' + $level_taught + '">' + $level_taught + '</td>' +
							'<td><input type="hidden" name="institutions_worked_courses_taught[]" value="' + $courses_taught + '">' + $courses_taught + '</td>' +
							'<td><input type="hidden" name="institutions_worked_number_of_years_in_institution[]" value="' + $number_of_years_in_institution + '">' + $number_of_years_in_institution + '</td></tr>');
					}
					else
					{
						alert('Invalid input. Please check fields and try again.');
					}
				}

				function institutions_worked_delete()
				{
					if (confirm('Delete selected institutions?'))
					{
						$('#institutions_worked_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
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
									<label>Institution</label>
									<input class="form-control" type="text" name="institutions_worked_institution_input">
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="institutions_worked_position_input">
								</div>
								<div class="form-group">
									<label>Year Started</label>
									<input class="form-control" type="number" name="institutions_worked_year_started_input" min="2011">
								</div>
								<div class="form-group">
									<label>Level Taught</label>
									<input class="form-control" type="text" name="institutions_worked_level_taught_input">
								</div>
								<div class="form-group">
									<label>Courses Taught</label><span class="help-block">separated by a comma</span>
									<input class="form-control" type="text" name="institutions_worked_courses_taught_input">
								</div>
								<div class="form-group">
									<label>Number of Years in the Institution</label>
									<input class="form-control" type="number" name="institutions_worked_number_of_years_in_institution_input" min="0">
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
						<button type="button" class="btn btn-danger" onclick="institutions_worked_delete();">Delete</button>
					</div>
					<table class="table" id="institutions_worked_table">
						<tr>
							<th></th>
							<th>Institution</th>
							<th>Position</th>
							<th>Year Started</th>
							<th>Level Taught</th>
							<th>Courses Taught</th>
							<th>Number of Years</th>
						</tr>
						<?php if (set_value('institutions_worked_institution[]')): ?>
						<?php for ($i = 0; $i < count($this->input->post('institutions_worked_institution')); $i++): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><input type="hidden" name="institutions_worked_institution[]" value="<?php echo $this->input->post('institutions_worked_institution')[$i]; ?>"><?php echo $this->input->post('institutions_worked_institution')[$i]; ?></td>
							<td><input type="hidden" name="institutions_worked_position[]" value="<?php echo $this->input->post('institutions_worked_position')[$i]; ?>"><?php echo $this->input->post('institutions_worked_position')[$i]; ?></td>
							<td><input type="hidden" name="institutions_worked_year_started[]" value="<?php echo $this->input->post('institutions_worked_year_started')[$i]; ?>"><?php echo $this->input->post('institutions_worked_year_started')[$i]; ?></td>
							<td><input type="hidden" name="institutions_worked_level_taught[]" value="<?php echo $this->input->post('institutions_worked_level_taught')[$i]; ?>"><?php echo $this->input->post('institutions_worked_level_taught')[$i]; ?></td>
							<td><input type="hidden" name="institutions_worked_courses_taught[]" value="<?php echo $this->input->post('institutions_worked_courses_taught')[$i]; ?>"><?php echo $this->input->post('institutions_worked_courses_taught')[$i]; ?></td>
							<td><input type="hidden" name="institutions_worked_number_of_years_in_institution[]" value="<?php echo $this->input->post('institutions_worked_number_of_years_in_institution')[$i]; ?>"><?php echo $this->input->post('institutions_worked_number_of_years_in_institution')[$i]; ?></td>
						</tr>
						<?php endfor; ?>
						<?php endif; ?>
					</table>
				</div>
				
				<legend>Certifications</legend>

				<script type="text/javascript">
				function certifications_add()
				{
					$certification = $('[name="certifications_certification_input"]').val().trim();
					$certifying_body = $('[name="certifications_certifying_body_input"]').val().trim();
					$date_received = $('[name="certifications_date_received_input"]').val().trim();

					if ($certification && $certifying_body && $date_received)
					{
						$('#certifications_table').append('<tr><td><input type="checkbox"></td>' +
							'<td><input type="hidden" name="certifications_certification[]" value="' + $certification + '">' + $certification + '</td>' +
							'<td><input type="hidden" name="certifications_certifying_body[]" value="' + $certifying_body + '">' + $certifying_body + '</td>' +
							'<td><input type="hidden" name="certifications_date_received[]" value="' + $date_received + '">' + $date_received + '</td></tr>');
					}
					else
					{
						alert('Invalid input. Please check fields and try again.');
					}
				}

				function certifications_delete()
				{
					if (confirm('Delete selected certifications?'))
					{
						$('#certifications_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
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
									<label>Certifications</label>
									<input class="form-control" type="text" name="certifications_certification_input">
								</div>
								<div class="form-group">
									<label>Certifying Body</label>
									<input class="form-control" type="text" name="certifications_certifying_body_input">
								</div>
								<div class="form-group">
									<label>Date Received</label>
									<input class="form-control" type="date" name="certifications_date_received_input">
								</div>
								
								<div class="submit-button">
									<button type="button" class="btn btn-primary" name="submit" onclick="certifications_add();">Add to List</button>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<h3>List of Certifications</h3>	
					<div class="customize-btn-group">
						<button type="button" class="btn btn-danger" onclick="certifications_delete();">Delete</button>
					</div>
					<table class="table" id="certifications_table">
						<tr>
							<th></th>
							<th>Certification</th>
							<th>Certifying Body</th>
							<th>Date Received</th>
						</tr>
						<?php if (set_value('certifications_certification[]')): ?>
						<?php for ($i = 0; $i < count($this->input->post('certifications_certification')); $i++): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><input type="hidden" name="certifications_certification[]" value="<?php echo $this->input->post('certifications_certification')[$i]; ?>"><?php echo $this->input->post('certifications_certification')[$i]; ?></td>
							<td><input type="hidden" name="certifications_certifying_body[]" value="<?php echo $this->input->post('certifications_certifying_body')[$i]; ?>"><?php echo $this->input->post('certifications_certifying_body')[$i]; ?></td>
							<td><input type="hidden" name="certifications_date_received[]" value="<?php echo $this->input->post('certifications_date_received')[$i]; ?>"><?php echo $this->input->post('certifications_date_received')[$i]; ?></td>
						</tr>
						<?php endfor; ?>
						<?php endif; ?>
					</table>
				</div>
				
				<legend>Awards</legend>

				<script type="text/javascript">
				function awards_add()
				{
					$award = $('[name="awards_award_input"]').val().trim();
					$awarding_body = $('[name="awards_awarding_body_input"]').val().trim();
					$date_received = $('[name="awards_date_received_input"]').val().trim();

					if ($award && $awarding_body && $date_received)
					{
						$('#awards_table').append('<tr><td><input type="checkbox"></td>' +
							'<td><input type="hidden" name="awards_award[]" value="' + $award + '">' + $award + '</td>' +
							'<td><input type="hidden" name="awards_awarding_body[]" value="' + $awarding_body + '">' + $awarding_body + '</td>' +
							'<td><input type="hidden" name="awards_date_received[]" value="' + $date_received + '">' + $date_received + '</td></tr>');
					}
					else
					{
						alert('Invalid input. Please check fields and try again.');
					}
				}

				function awards_delete()
				{
					if (confirm('Delete selected awards?'))
					{
						$('#awards_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
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
									<label>Award</label>
									<input class="form-control" type="text" name="awards_award_input">
								</div>
								<div class="form-group">
									<label>Awarding Body</label>
									<input class="form-control" type="text" name="awards_awarding_body_input">
								</div>
								<div class="form-group">
									<label>Date Received</label>
									<input class="form-control" type="date" name="awards_date_received_input">
								</div>
								
								<div class="submit-button">
									<button type="button" class="btn btn-primary" name="submit" onclick="awards_add();">Add to List</button>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<h3>List of Awards</h3>	
					<div class="customize-btn-group">
						<button type="button" class="btn btn-danger" onclick="awards_delete();">Delete</button>
					</div>
					<table class="table" id="awards_table">
						<tr>
							<th></th>
							<th>Award</th>
							<th>Awarding Body</th>
							<th>Date Received</th>
						</tr>
						<?php if (set_value('awards_award[]')): ?>
						<?php for ($i = 0; $i < count($this->input->post('awards_award')); $i++): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><input type="hidden" name="awards_award[]" value="<?php echo $this->input->post('awards_award')[$i]; ?>"><?php echo $this->input->post('awards_award')[$i]; ?></td>
							<td><input type="hidden" name="awards_awarding_body[]" value="<?php echo $this->input->post('awards_awarding_body')[$i]; ?>"><?php echo $this->input->post('awards_awarding_body')[$i]; ?></td>
							<td><input type="hidden" name="awards_date_received[]" value="<?php echo $this->input->post('awards_date_received')[$i]; ?>"><?php echo $this->input->post('awards_date_received')[$i]; ?></td>
						</tr>
						<?php endfor; ?>
						<?php endif; ?>
					</table>
				</div>
				
				<legend>Other Works / Related Experiences</legend>

				<script type="text/javascript">
				function other_work_add()
				{
					$organization = $('[name="other_work_organization_input"]').val().trim();
					$position = $('[name="other_work_position_input"]').val().trim();
					$description = $('[name="other_work_description_input"]').val().trim();
					$date_started = $('[name="other_work_date_started_input"]').val().trim();

					if ($organization && $position && $description && $date_started)
					{
						$('#other_work_table').append('<tr><td><input type="checkbox"></td>' +
							'<td><input type="hidden" name="other_work_organization[]" value="' + $organization + '">' + $organization + '</td>' +
							'<td><input type="hidden" name="other_work_position[]" value="' + $position + '">' + $position + '</td>' +
							'<td><input type="hidden" name="other_work_description[]" value="' + $description + '">' + $description + '</td>' +
							'<td><input type="hidden" name="other_work_date_started[]" value="' + $date_started + '">' + $date_started + '</td></tr>');
					}
					else
					{
						alert('Invalid input. Please check fields and try again.');
					}
				}

				function other_work_delete()
				{
					if (confirm('Delete selected related experiences?'))
					{
						$('#other_work_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
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
									<label>Organization</label>
									<input class="form-control" type="text" name="other_work_organization_input">
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="other_work_position_input">
								</div>
								<div class="form-group">
									<label>Description</label>
									<input class="form-control" type="text" name="other_work_description_input">
								</div>
								<div class="form-group">
									<label>Date Started</label>
									<input class="form-control" type="date" name="other_work_date_started_input">
								</div>
								
								<div class="submit-button">
									<button type="button" class="btn btn-primary" name="submit" onclick="other_work_add();">Add to List</button>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<h3>List of Other Works / Related Experiences</h3>
					<?php echo form_error('other_work_organization[]'); ?>
					<div class="customize-btn-group">
						<button type="button" class="btn btn-danger" onclick="other_work_delete();">Delete</button>
					</div>	
					<table class="table" id="other_work_table">
						<tr>
							<th></th>
							<th>Organization</th>
							<th>Position</th>
							<th>Description</th>
							<th>Date Started</th>
						</tr>
						<?php if (set_value('other_work_organization[]')): ?>
						<?php for ($i = 0; $i < count($this->input->post('other_work_organization')); $i++): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><input type="hidden" name="other_work_organization[]" value="<?php echo $this->input->post('other_work_organization')[$i]; ?>"><?php echo $this->input->post('other_work_organization')[$i]; ?></td>
							<td><input type="hidden" name="other_work_position[]" value="<?php echo $this->input->post('other_work_position')[$i]; ?>"><?php echo $this->input->post('other_work_position')[$i]; ?></td>
							<td><input type="hidden" name="other_work_description[]" value="<?php echo $this->input->post('other_work_description')[$i]; ?>"><?php echo $this->input->post('other_work_description')[$i]; ?></td>
							<td><input type="hidden" name="other_work_date_started[]" value="<?php echo $this->input->post('other_work_date_started')[$i]; ?>"><?php echo $this->input->post('other_work_date_started')[$i]; ?></td>
						</tr>
						<?php endfor; ?>
						<?php endif; ?>
					</table>
				</div>
		
				<legend>Skills</legend>
				
				<div class="form">
					<div class="form-group"><label>Computer Applications Proficiency</label><span class="help-block">separated by a comma</span>
						<input class="form-control" type="text" name="computer_proficient_skill" value="<?php echo set_value('computer_proficient_skill'); ?>">
						<?php echo form_error('computer_proficient_skill'); ?>
					</div>
					
					<div class="form-group"><label>Computer Applications Familiar With</label><span class="help-block">separated by a comma</span>
						<input class="form-control" type="text" name="computer_familiar_skill" value="<?php echo set_value('computer_familiar_skill'); ?>">
						<?php echo form_error('computer_familiar_skill'); ?>
					</div>
						
					<div class="form-group"><label>Others</label><span class="help-block">separated by a comma</span>
						<input class="form-control" type="text" name="skill" value="<?php echo set_value('skill'); ?>">
						<?php echo form_error('skill'); ?>
					</div>
				</div>
				
				<legend>Professional References</legend>

				<script type="text/javascript">
				function reference_add()
				{
					$name = $('[name="reference_name_input"]').val().trim();
					$position = $('[name="reference_position_input"]').val().trim();
					$company = $('[name="reference_company_input"]').val().trim();
					$phone = $('[name="reference_phone_input"]').val().trim();
					$email = $('[name="reference_email_input"]').val().trim();

					if ($name && $position && $company && $phone && $email)
					{
						$('#reference_table').append('<tr><td><input type="checkbox"></td>' +
							'<td><input type="hidden" name="reference_name[]" value="' + $name + '">' + $name + '</td>' +
							'<td><input type="hidden" name="reference_position[]" value="' + $position + '">' + $position + '</td>' +
							'<td><input type="hidden" name="reference_company[]" value="' + $company + '">' + $company + '</td>' +
							'<td><input type="hidden" name="reference_phone[]" value="' + $phone + '">' + $phone + '</td>' +
							'<td><input type="hidden" name="reference_email[]" value="' + $email + '">' + $email + '</td></tr>');
					}
					else
					{
						alert('Invalid input. Please check fields and try again.');
					}
				}

				function reference_delete()
				{
					if (confirm('Delete selected references?'))
					{
						$('#reference_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
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
									<label>Name</label>
									<input class="form-control" type="text" name="reference_name_input">
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="reference_position_input">
								</div>
								<div class="form-group">
									<label>Company</label>
									<input class="form-control" type="text" name="reference_company_input">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="reference_phone_input">
								</div>
								<div class="form-group">
									<label>E-mail Address</label>
									<input class="form-control" type="text" name="reference_email_input">
								</div>
								
								<div class="submit-button">
									<button type="button" class="btn btn-primary" name="submit" onclick="reference_add();">Add to List</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<h3>List of Professional References</h3>
					<div class="customize-btn-group">
						<button type="button" class="btn btn-danger" onclick="reference_delete();">Delete</button>
					</div>
					<table class="table" id="reference_table">
						<tr>
							<th></th>
							<th>Name</th>
							<th>Position</th>
							<th>Company</th>
							<th>Phone</th>
							<th>E-mail Address</th>
						</tr>
						<?php if (set_value('reference_name[]')): ?>
						<?php for ($i = 0; $i < count($this->input->post('reference_name')); $i++): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><input type="hidden" name="reference_name[]" value="<?php echo $this->input->post('reference_name')[$i]; ?>"><?php echo $this->input->post('reference_name')[$i]; ?></td>
							<td><input type="hidden" name="reference_position[]" value="<?php echo $this->input->post('reference_position')[$i]; ?>"><?php echo $this->input->post('reference_position')[$i]; ?></td>
							<td><input type="hidden" name="reference_company[]" value="<?php echo $this->input->post('reference_company')[$i]; ?>"><?php echo $this->input->post('reference_company')[$i]; ?></td>
							<td><input type="hidden" name="reference_phone[]" value="<?php echo $this->input->post('reference_phone')[$i]; ?>"><?php echo $this->input->post('reference_phone')[$i]; ?></td>
							<td><input type="hidden" name="reference_email[]" value="<?php echo $this->input->post('reference_email')[$i]; ?>"><?php echo $this->input->post('reference_email')[$i]; ?></td>
						</tr>
						<?php endfor; ?>
						<?php endif; ?>
					</table>
				</div>
						
				<legend>Affiliations and Memberships to Other Organizations</legend>
						
				<script type="text/javascript">
				function affiliation_add()
				{
					$organization = $('[name="affiliation_organization_input"]').val().trim();
					$description = $('[name="affiliation_description_input"]').val().trim();
					$position = $('[name="affiliation_position_input"]').val().trim();
					$years = $('[name="affiliation_years_input"]').val().trim();

					if ($organization && $description && $position && $years)
					{
						$('#affiliation_table').append('<tr><td><input type="checkbox"></td>' +
							'<td><input type="hidden" name="affiliation_organization[]" value="' + $organization + '">' + $organization + '</td>' +
							'<td><input type="hidden" name="affiliation_description[]" value="' + $description + '">' + $description + '</td>' +
							'<td><input type="hidden" name="affiliation_position[]" value="' + $position + '">' + $position + '</td>' +
							'<td><input type="hidden" name="affiliation_years[]" value="' + $years + '">' + $years + '</td></tr>');
					}
					else
					{
						alert('Invalid input. Please check fields and try again.');
					}
				}

				function affiliation_delete()
				{
					if (confirm('Delete selected affiliations?'))
					{
						$('#affiliation_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
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
									<label>Organization</label>
									<input class="form-control" type="text" name="affiliation_organization_input">
								</div>
								<div class="form-group">
									<label>Organization Description</label>
									<input class="form-control" type="text" name="affiliation_description_input">
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="affiliation_position_input">
								</div>
								<div class="form-group">
									<label>Years of Affiliation</label>
									<input class="form-control" type="number" name="affiliation_years_input" min="0">
								</div>
								
								<div class="submit-button">
									<button type="button" class="btn btn-primary" name="submit" onclick="affiliation_add();">Add to List</button>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<h3>List of Affiliations and Memberships to Other Organizations</h3>
					<div class="customize-btn-group">
						<button type="button" class="btn btn-danger" onclick="affiliation_delete();">Delete</button>
					</div>
					<table class="table" id="affiliation_table">
						<tr>
							<th></th>
							<th>Organization</th>
							<th>Organization Description</th>
							<th>Position</th>
							<th>Years of Affiliation</th>
						</tr>
						<?php if (set_value('affiliation_organization[]')): ?>
						<?php for ($i = 0; $i < count($this->input->post('affiliation_organization')); $i++): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><input type="hidden" name="affiliation_organization[]" value="<?php echo $this->input->post('affiliation_organization')[$i]; ?>"><?php echo $this->input->post('affiliation_organization')[$i]; ?></td>
							<td><input type="hidden" name="affiliation_description[]" value="<?php echo $this->input->post('affiliation_description')[$i]; ?>"><?php echo $this->input->post('affiliation_description')[$i]; ?></td>
							<td><input type="hidden" name="affiliation_position[]" value="<?php echo $this->input->post('affiliation_position')[$i]; ?>"><?php echo $this->input->post('affiliation_position')[$i]; ?></td>
							<td><input type="hidden" name="affiliation_years[]" value="<?php echo $this->input->post('affiliation_years')[$i]; ?>"><?php echo $this->input->post('affiliation_years')[$i]; ?></td>
						</tr>
						<?php endfor; ?>
						<?php endif; ?>
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
			</div>

			<div class="tab-pane" id="application">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#best_adept" data-toggle="tab">BEST and AdEPT</a></li>
					<li><a href="#smp_app" data-toggle="tab">SMP</a></li>
				</ul>	

				<div class="tab-content">
					<div class="tab-pane active" id="best_adept">
						<div class="form">
							<div class="form-group">
								<label>Application</label><br/>
								<input type="checkbox" name="program[]" value="best_adept" <?php echo set_checkbox('program[]', 'best_adept'); ?>> Applying for BEST/AdEPT?<br/>
								<?php echo form_error('program[]'); ?>
							</div>

							<div class="form-group">
								<label>Date of Application</label>
								<input class="form-control" type="date" name="best_adept_application_date" value="<?php echo set_value('best_adept_application_date'); ?>">
								<?php echo form_error('best_adept_application_date'); ?>
							</div>

							<div class="form-group">
								<label>Subject Taking</label><br/>
								<input type="radio" name="best_adept_subject" value="best" <?php echo set_radio('best_adept_subject', 'best'); ?>> BEST
								<input type="radio" name="best_adept_subject" value="adept" <?php echo set_radio('best_adept_subject', 'adept'); ?>> AdEPT
								<input type="radio" name="best_adept_subject" value="both" <?php echo set_radio('best_adept_subject', 'both'); ?>> Both
								<?php echo form_error('best_adept_subject'); ?>
							</div>

							<legend>Questions</legend>
							<span class="help-block">Please share your thoughts on the following. Limit your answer to 100 to 500 words.</span>
							<div class="form-group">
								<label>What is your main motivation for participating in the certification program?</label>
								<input class="form-control" type="text" name="best_adept_answer_1" value="<?php echo set_value('best_adept_answer_1'); ?>">
								<?php echo form_error('best_adept_answer_1'); ?>
							</div>

							<div class="form-group">
								<label>Are there any schedule / work / health / personal impediments to your participation in the certification process? If yes, please explain. Include dates and other relevant details.	</label>
								<input class="form-control" type="text" name="best_adept_answer_2"  value="<?php echo set_value('best_adept_answer_2'); ?>">
								<?php echo form_error('best_adept_answer_2'); ?>
							</div>

							<div class="form-group">
								<label>Please share any relevant information not mentioned above that might help you be considered for certification.</label>
								<input class="form-control" type="text" name="best_adept_answer_3"  value="<?php echo set_value('best_adept_answer_3'); ?>">
								<?php echo form_error('best_adept_answer_3'); ?>
							</div>
						</div>
					</div>
				  
					<div class="tab-pane" id="smp_app">
						<div class="form">
							<div class="form-group">
								<label>Application</label><br/>
								<input type="checkbox" name="program[]" value="smp" <?php echo set_checkbox('program[]', 'smp'); ?>> Applying for SMP?<br/>
								<?php echo form_error('program[]'); ?>
							</div>

							<div class="form-group">
								<label>Date of Application</label>
								<input class="form-control" type="date" name="smp_application_date" value="<?php echo set_value('smp_application_date'); ?>">
								<?php echo form_error('smp_application_date'); ?>
							</div>

							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="smp_subject">
								<?php foreach ($subjects as $subject): ?>
									<option value="<?php echo $subject->Subject_ID; ?>" <?php echo set_select('smp_subject', $subject->Subject_ID); ?>><?php echo $subject->Subject_Code; ?></option>
								<?php endforeach; ?>
								</select>
								<?php echo form_error('smp_subject'); ?>
							</div>
							
							<div class="form-group">
								<label>How do you think the BPO contributes to nation building?</label>
								<input class="form-control" type="text" name="smp_answer_1" value="<?php echo set_value('smp_answer_1'); ?>">
								<?php echo form_error('smp_answer_1'); ?>
							</div>

							<div class="form-group">
								<label>What is the difference between a man and a woman?</label>
								<input class="form-control" type="text" name="smp_answer_2" value="<?php echo set_value('smp_answer_2'); ?>">
								<?php echo form_error('smp_answer_2'); ?>
							</div>
							
							<legend>Additional Information</legend>

							<div class="form-group">
								<label>Approximate Total Numbers of Subjects Handled</label>
								<input class="form-control" type="number" name="smp_subjects_handled" value="<?php echo set_value('smp_subjects_handled'); ?>">
								<?php echo form_error('smp_subjects_handled'); ?>
							</div>

							<div class="form-group">
								<label>Number of Years Teaching</label>
								<input class="form-control" type="number" name="smp_years_teaching" value="<?php echo set_value('smp_years_teaching'); ?>">
								<?php echo form_error('smp_years_teaching'); ?>
							</div>

							<div class="form-group">
								<label>Number of Years Teaching in Current Institution</label>
								<input class="form-control" type="number" name="smp_years_teaching_current" value="<?php echo set_value('smp_years_teaching_current'); ?>">
								<?php echo form_error('smp_years_teaching_current'); ?>
							</div>

							<div class="form-group">
								<label>Average Number of Students per Class</label>
								<input class="form-control" type="number" name="smp_students_per_class" value="<?php echo set_value('smp_students_per_class'); ?>">
								<?php echo form_error('smp_students_per_class'); ?>
							</div>
													
							<div class="form-group">
								<label>What are the support offices available to you?</label>
								<input class="form-control" type="text" name="smp_support_offices" value="<?php echo set_value('smp_support_offices'); ?>">
								<?php echo form_error('smp_support_offices'); ?>
							</div>

							<div class="form-group">
								<label>Instructional materials support?</label>
								<input class="form-control" type="text" name="smp_materials_support" value="<?php echo set_value('smp_materials_support'); ?>">
								<?php echo form_error('smp_materials_support'); ?>
							</div>

							<div class="form-group">
								<label>Technology support?</label>
								<input class="form-control" type="text" name="smp_technology_support" value="<?php echo set_value('smp_technology_support'); ?>">
								<?php echo form_error('smp_technology_support'); ?>
							</div>

							<div class="form-group">
								<label>Can you readily use a laboratory when needed?</label>
								<input class="form-control" type="text" name="smp_laboratory" value="<?php echo set_value('smp_laboratory'); ?>">
								<?php echo form_error('smp_laboratory'); ?>
							</div>

							<div class="form-group">
								<label>Internet services? (school)	</label>
								<input class="form-control" type="text" name="smp_internet" value="<?php echo set_value('smp_internet'); ?>">
								<?php echo form_error('smp_internet'); ?>
							</div>
							
							<legend>Training</legend>

							<script type="text/javascript">
							function training_add()
							{
								$training = $('[name="training_input"]').val().trim();
								$training_body = $('[name="training_body_input"]').val().trim();
								$training_date = $('[name="training_date_input"]').val().trim();

								if ($training && $training_body && $training_date)
								{
									$('#training_table').append('<tr><td><input type="checkbox"></td>' +
										'<td><input type="hidden" name="training[]" value="' + $training + '">' + $training + '</td>' +
										'<td><input type="hidden" name="training_body[]" value="' + $training_body + '">' + $training_body + '</td>' +
										'<td><input type="hidden" name="training_date[]" value="' + $training_date + '">' + $training_date + '</td></tr>');
								}
								else
								{
									alert('Invalid input. Please check fields and try again.');
								}
							}

							function training_delete()
							{
								if (confirm('Delete selected related trainings?'))
								{
									$('#training_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
								}
							}
							</script>

							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-info">
											<div class="panel-heading">
												Add to List
											</div>
											<div class="panel-body">
												<div class="form">
													<div class="form-group">
														<label>Training</label>
														<input class="form-control" type="text" name="training_input">
													</div>
													<div class="form-group">
														<label>Training Body</label>
														<input class="form-control" type="text" name="training_body_input">
													</div>
													<div class="form-group">
														<label>Training Date</label>
														<input class="form-control" type="date" name="training_date_input">
													</div>
													<div class="submit-button">
														<button type="button" class="btn btn-primary" name="submit" onclick="training_add();">Add to List</button>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-9">
										<h3>List of Training</h3>
										<div class="customize-btn-group">
											<button type="button" class="btn btn-danger" onclick="training_delete();">Delete</button>
										</div>	
										<table class="table" id="training_table">
											<tr>
												<th></th>
												<th>Training</th>
												<th>Training Body</th>
												<th>Training Date</th>
											</tr>
										</table>
									</div>
								</div>
							</div>
							
							<legend>Required</legend>

							<div class="form-group">
								<label>Contract</label><br/>
								<input type="radio" name="smp_contract" value="1" <?php echo set_radio('smp_contract', '1'); ?>> Yes
								<input type="radio" name="smp_contract" value="0" <?php echo set_radio('smp_contract', '0'); ?>> No
								<?php echo form_error('smp_contract'); ?>
							</div>

							<div class="form-group">
								<label>Self-Assesment Form<span class="help-block">Business Communcation</span></label><br/>
								<input type="radio" name="smp_self_assessment_bizcom" value="1" <?php echo set_radio('smp_self_assessment_bizcom', '1'); ?>> Yes
								<input type="radio" name="smp_self_assessment_bizcom" value="0" <?php echo set_radio('smp_self_assessment_bizcom', '0'); ?>> No
								<?php echo form_error('smp_self_assessment_bizcom'); ?>
							</div>

							<div class="form-group">
								<label>Self-Assesment Form<span class="help-block">Service Culture</span></label><br/>
								<input type="radio" name="smp_self_assessment_sc" value="1" <?php echo set_radio('smp_self_assessment_sc', '1'); ?>> Yes
								<input type="radio" name="smp_self_assessment_sc" value="0" <?php echo set_radio('smp_self_assessment_sc', '0'); ?>> No
								<?php echo form_error('smp_self_assessment_sc'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
$('[name="save_draft"]').click
(
	function()
	{
		$('[name="code"]').val($('[name="current_employer"]').val() + $('[name="first_name"]').val().charAt(0)+ $('[name="middle_initial"]').val().charAt(0)+ $('[name="last_name"]').val().charAt(0)+ $('[name="birthdate"]').val().replace(/-/gi,''));
	}
);

$('[name="submit"]').click
(
	function()
	{
		$('[name="code"]').val($('[name="current_employer"]').val() + $('[name="first_name"]').val().charAt(0)+ $('[name="middle_initial"]').val().charAt(0)+ $('[name="last_name"]').val().charAt(0)+ $('[name="birthdate"]').val().replace(/-/gi,''));
	}
);
</script>