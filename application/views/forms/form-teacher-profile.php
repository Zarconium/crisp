<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Teacher successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1><?php echo $this->teacher->getTeacherFullNameById($teacher->Teacher_ID)->Full_Name; ?> <small><?php echo $this->school->getSchoolById($teacher->School_ID)->Name . " - " . $this->school->getSchoolById($teacher->School_ID)->Branch; ?></small></h1>
	
	<ul class="nav nav-tabs">
		<li class="active"><a href="#basic" data-toggle="tab">Basic Information</a></li>
		<li><a href="#attendance" data-toggle="tab">Attendance</a></li>
		<li><a href="#stipend" data-toggle="tab">Stipend</a></li>
		<li><a href="#application" data-toggle="tab">Application</a></li>
	</ul>
	
		<div class="tab-content">
			<div class="tab-pane active" id="basic">
				<?php echo form_open('/dbms/form_teacher_profile/' . $teacher->Teacher_ID); ?>
					<div class="save">
						<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
						<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
						<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>

					<legend>Personal Information</legend>

					<input type="hidden" name="code" value="<?php echo set_value('code'); ?>">
					<?php echo form_error('code'); ?>

					<div class="form-inline">
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="last_name" value="<?php if(isset($teacher->Last_Name)) echo $teacher->Last_Name; ?>">
							<?php echo form_error('last_name'); ?>
						</div>

						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type="text" name="first_name" value="<?php if(isset($teacher->First_Name)) echo $teacher->First_Name; ?>">
							<?php echo form_error('first_name'); ?>
						</div>

						<div class="form-group">
							<label>Middle Initial</label>
							<input class="form-control" type="text" name="middle_initial" value="<?php if(isset($teacher->Middle_Initial)) echo $teacher->Middle_Initial; ?>">
							<?php echo form_error('middle_initial'); ?>
						</div>

						<div class="form-group">
							<label>Name Suffix</label>
							<input class="form-control" type="text" name="name_suffix" value="<?php if(isset($teacher->Name_Suffix)) echo $teacher->Name_Suffix; ?>">
							<?php echo form_error('name_suffix'); ?>
						</div>
					</div>
					
					<div class="form-inline" role="form">
						<div class="form-group">
							<label>Birthdate</label>
							<input type="date" class="form-control" name="birthdate" value="<?php if(isset($teacher->Birthdate)) echo date('Y-m-d', strtotime($teacher->Birthdate)); ?>">
							<?php echo form_error('birthdate'); ?>
						</div>
						
						<div class="form-group">
							<label>Birth Place</label>
							<input class="form-control" type="text" name="birthplace" value="<?php if(isset($teacher->Birthplace)) echo $teacher->Birthplace; ?>">
							<?php echo form_error('birthplace'); ?>
						</div>
					</div>

					<div class="form-inline">
						<div class="form-group">
							<label>Nationality</label>
							<input class="form-control" type="text" name="nationality" value="<?php if(isset($teacher->Nationality)) echo $teacher->Nationality; ?>">
							<?php echo form_error('nationality'); ?>
						</div>
					
						<div class="form-group">
							<label>Total Years of Teaching</label>
							<input class="form-control" type="number" name="total_year_teaching" value="<?php if(isset($teacher->Total_Year_of_Teaching)) echo $teacher->Total_Year_of_Teaching; ?>">
							<?php echo form_error('total_year_teaching'); ?>
						</div>
					</div>

					<div class="form-inline">
						<div class="form-group">
							<label>Civil Status</label><br/>
							<input type="radio" name="civil" value="married" <?php if (!strcasecmp($teacher->Civil_Status, 'married')) { echo 'checked="checked"'; }?>> Married
							<input type="radio" name="civil" value="single" <?php if (!strcasecmp($teacher->Civil_Status, 'single')) { echo 'checked="checked"'; }?>> Single
							<input type="radio" name="civil" value="separated" <?php if (!strcasecmp($teacher->Civil_Status, 'separated')) { echo 'checked="checked"'; }?>> Separated
							<input type="radio" name="civil" value="widowed" <?php if (!strcasecmp($teacher->Civil_Status, 'widowed')) { echo 'checked="checked"'; }?>> Widowed
							<?php echo form_error('civil'); ?>
						</div>		
					</div>

					<div class="form-inline">
						<div class="form-group">
							<label>Gender</label><br/>
							<input type="radio" name="gender" value="M" <?php if (!strcasecmp($teacher->Gender, 'm')) { echo 'checked="checked"'; }?>> Male
							<input type="radio" name="gender" value="F" <?php if (!strcasecmp($teacher->Gender, 'f')) { echo 'checked="checked"'; }?>> Female
							<?php echo form_error('gender'); ?>
						</div>
					</div>	
					
					<div class="form-inline">
						<div class="form-group">
							<label>Own a Desktop?</label><br/>
							<input type="radio" name="desktop" value="1" <?php if ($teacher->Desktop == 1) { echo 'checked="checked"'; }?>> Yes
							<input type="radio" name="desktop" value="0" <?php if ($teacher->Desktop == 0) { echo 'checked="checked"'; }?>> No
							<?php echo form_error('desktop'); ?>
						</div>
					</div>
					
					<div class="form-inline">
						<div class="form-group">
							<label>Own a Laptop?</label><br/>
							<input type="radio" name="laptop" value="1" <?php if ($teacher->Laptop == 1) { echo 'checked="checked"'; }?>> Yes
							<input type="radio" name="laptop" value="0" <?php if ($teacher->Laptop == 0) { echo 'checked="checked"'; }?>> No
							<?php echo form_error('laptop'); ?>
						</div>
					</div>
					
					<div class="form-inline">
						<div class="form-group">
							<label>Internet Access Outside School?</label><br/>
							<input type="radio" name="access" value="1" <?php if ($teacher->Internet == 1) { echo 'checked="checked"'; }?>> Yes
							<input type="radio" name="access" value="0" <?php if ($teacher->Internet == 0) { echo 'checked="checked"'; }?>> No
							<?php echo form_error('access'); ?>
						</div>	
					</div>
				
					<legend>Current Address</legend>
						
					<div class="form-inline" role="form">
						<div class="form-group">
							<label>Street Number</label>
							<input type="text" class="form-control" name="street_number" value="<?php if(isset($teacher->Street_Number)) echo $teacher->Street_Number; ?>">
							<?php echo form_error('street_number'); ?>
						</div>
							
						<div class="form-group">
							<label>Street Name</label>
							<input type="text" class="form-control" name="street_name" value="<?php if(isset($teacher->Street_Name)) echo $teacher->Street_Name; ?>">
							<?php echo form_error('street_name'); ?>
						</div>
							
						<div class="form-group">
							<label>City</label>
							<input type="text" class="form-control" name="city" value="<?php if(isset($teacher->City)) echo $teacher->City; ?>">
							<?php echo form_error('city'); ?>
						</div>
					</div>

					<div class="form-inline" role="form">
						<div class="form-group">
							<label>Province</label>
							<input type="text" class="form-control" name="province" value="<?php if(isset($teacher->Province)) echo $teacher->Province; ?>">
							<?php echo form_error('province'); ?>
						</div>
							
						<div class="form-group">
							<label>Region</label>
							<input type="text" class="form-control" name="region" value="<?php if(isset($teacher->Region)) echo $teacher->Region; ?>">
							<?php echo form_error('region'); ?>
						</div>
					</div>
				
					<legend>Alternate Address</legend>
					
					<div class="form-inline" role="form">
						<div class="form-group">
							<label>Alternate Address</label>
							<input type="text" class="form-control" name="alternate_address" value="<?php if(isset($teacher->Alternate_Address)) echo $teacher->Alternate_Address; ?>">
							<?php echo form_error('alternate_address'); ?>
						</div>
					</div>

					<legend>Contact Details</legend>
					
					<div class="form-inline">
						<div class="form-group">
							<label>Mobile Number</label>
							<input class="form-control" type="number" name="mobile" value="<?php if(isset($teacher->Mobile_Number)) echo $teacher->Mobile_Number; ?>">
							<?php echo form_error('mobile'); ?>
						</div>
						
						<div class="form-group">
							<label>Landline</label>
							<input class="form-control" type="number" name="landline" value="<?php if(isset($teacher->Landline)) echo $teacher->Landline; ?>">
							<?php echo form_error('landline'); ?>
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email" value="<?php if(isset($teacher->Email)) echo $teacher->Email; ?>">
							<?php echo form_error('email'); ?>
						</div>
						
						<div class="form-group">
							<label>Facebook</label>
							<input class="form-control" type="text" name="facebook" value="<?php if(isset($teacher->Facebook)) echo $teacher->Facebook; ?>">
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
								<option value="BS">BS</option>
								<option value="AB">AB</option>
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
								<option value="BS">MS</option>
								<option value="AB">MA</option>
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
							<label>Doctorate</label>
						</div>
						
						<div class="form-group" name="post_type">
							<label>Doctor</label>
							<select class="form-control">
								<option value="BS">PhD</option>
								<option value="AB">MD</option>
							</select>
							<?php echo form_error('post_type'); ?>
						</div>
						
						<div class="form-group">
							<label>Degree</label>
							<input class="form-control" type="text" name="post_degree" value="<?php echo set_value('post_degree'); ?>">
							<?php echo form_error('post_degree'); ?>
						</div>
						
						<div class="form-group">
							<label>School</label>
							<input class="form-control" type="text" name="post_school" value="<?php echo set_value('post_school'); ?>">
							<?php echo form_error('post_school'); ?>
						</div>
					</div>
				
					<legend>Work Information</legend>
					
					<div class="form-inline">
						<div class="form-group">
							<label>Employment Status</label>
							<select class="form-control" name="employment_status">
								<option value="Part" <?php if (isset($teacher->Employment_Status)) if ($teacher->Employment_Status == "Part") { echo 'selected="selected"'; } ?>>Part</option>
								<option value="Full" <?php if (isset($teacher->Employment_Status)) if ($teacher->Employment_Status == "Full") { echo 'selected="selected"'; } ?>>Full</option>
							</select>
							<?php echo form_error('employment_status'); ?>
						</div>
					
						<div class="form-group">
							<label>Current Position</label>
							<input class="form-control" type="text" name="current_position" value="<?php if(isset($teacher->Current_Position)) echo $teacher->Current_Position; ?>">
							<?php echo form_error('current_position'); ?> 
						</div>
						
						<div class="form-group">
							<label>Current Department</label>
							<input class="form-control" type="text" name="current_department" value="<?php if(isset($teacher->Current_Department)) echo $teacher->Current_Department; ?>">
							<?php echo form_error('current_department'); ?>
						</div>
					</div>
				
					<div class="form-inline">
						<div class="form-group">
							<label>Current Employer</label>
							<select class="form-control" name="current_employer">
							<?php foreach ($schools as $school): ?>
								<option value="<?php echo $school->School_ID ?>" <?php if ($teacher->School_ID == $school->School_ID) { echo 'selected="selected"'; }?>><?php echo $school->Name . " - " . $school->Branch ?></option>
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
							<input class="form-control" type="text"  name="name_of_supervisor" value="<?php if(isset($teacher->Name_of_Supervisor)) echo $teacher->Name_of_Supervisor; ?>">
							<?php echo form_error('current_department'); ?>
						</div>

						<div class="form-group">
							<label>Position of Supervisor</label>
							<input class="form-control" type="text" name="position_of_supervisor" value="<?php if(isset($teacher->Position_of_Supervisor)) echo $teacher->Position_of_Supervisor; ?>">
							<?php echo form_error('position_of_supervisor'); ?>
						</div>
						
						<div class="form-group">
							<label>Supervisor Contact Details</label>
							<input class="form-control" type="text"  name="supervisor_contact_details" value="<?php if(isset($teacher->Supervisor_Contact_Details)) echo $teacher->Supervisor_Contact_Details; ?>">
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
							<input class="form-control" type="text"  name="classes_handling" value="<?php if(isset($teacher->Classes_Handling)) echo $teacher->Classes_Handling; ?>">
							<?php echo form_error('classes_handling'); ?>
						</div>
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
										<button type="submit" class="btn btn-primary" name="institutions_worked_add" value="institutions_worked_add">Add to List</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-md-9">
						<h3>List of Institutions</h3>	
						<div class="customize-btn-group">
							<button type="submit" class="btn btn-danger" name="institutions_worked_delete" value="institutions_worked_delete">Delete</button>
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
							<?php if ($training_experiences) foreach ($training_experiences as $training_experience): ?>
							<tr>
								<td><input type="checkbox" name="institutions_worked_id[]" value="<?php echo $training_experience->Teacher_Training_Experience_ID;?>"></td>
								<td><?php echo $training_experience->Institution; ?></td>
								<td><?php echo $training_experience->Position; ?></td>
								<td><?php echo $training_experience->Date; ?></td>
								<td><?php echo $training_experience->Level_Taught; ?></td>
								<td><?php echo $training_experience->Courses_Taught; ?></td>
								<td><?php echo $training_experience->Number_of_Years_in_Institution; ?></td>
							</tr>
							<?php endforeach; ?>
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
										<button type="submit" class="btn btn-primary" name="certification_add" value="certification_add">Add to List</button>
									</div>
								</div>	
							</div>
						</div>
					</div>
					
					<div class="col-md-9">
						<h3>List of Certifications</h3>	
						<div class="customize-btn-group">
							<button type="submit" class="btn btn-danger" name="certification_delete" value="certification_delete">Delete</button>
						</div>
						<table class="table">
							<tr>
								<th></th>
								<th>Certification</th>
								<th>Certifying Body</th>
								<th>Date Received</th>
							</tr>
							<?php if ($certifications) foreach ($certifications as $certification): ?>
							<tr>
								<td><input type="checkbox" name="certification_id[]" value="<?php echo $certification->Teacher_Certification_ID;?>"></td>
								<td><?php echo $certification->Certification; ?></td>
								<td><?php echo $certification->Certifying_Body; ?></td>
								<td><?php echo date('m/d/Y', strtotime($certification->Date_Received)); ?></td>
							</tr>
							<?php endforeach; ?>
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
										<button type="submit" class="btn btn-primary" name="award_add" value="award_add">Add to List</button>
									</div>
								</div>	
							</div>
						</div>
					</div>

					<div class="col-md-9">
						<h3>List of Awards</h3>	
						<div class="customize-btn-group">
							<button type="submit" class="btn btn-danger" name="award_delete" value="award_delete">Delete</button>
						</div>
						<table class="table">
							<tr>
								<th></th>
								<th>Award</th>
								<th>Awarding Body</th>
								<th>Date Received</th>
							</tr>
							<?php if ($awards) foreach ($awards as $award): ?>
							<tr>
								<td><input type="checkbox" name="award_id[]" value="<?php echo $award->Teacher_Awards_ID; ?>"></td>
								<td><?php echo $award->Award; ?></td>
								<td><?php echo $award->Awarding_Body; ?></td>
								<td><?php echo date('m/d/Y', strtotime($award->Date_Received)); ?></td>
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				
					<legend>Other Works / Related Experiences</legend>
					
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
										<button type="submit" class="btn btn-primary" name="other_work_add" value="other_work_add">Add to List</button>
									</div>
								</div>	
							</div>
						</div>
					</div>
					
					<div class="col-md-9">
						<h3>List of Other Works / Related Experiences</h3>
						<div class="customize-btn-group">
							<button type="submit" class="btn btn-danger" name="other_work_delete" value="other_work_delete">Delete</button>
						</div>	
						<table class="table">
							<tr>
								<th></th>
								<th>Organization</th>
								<th>Position</th>
								<th>Description</th>
								<th>Date Started</th>
							</tr>
							<?php if ($relevant_experiences) foreach ($relevant_experiences as $relevant_experience): ?>
							<tr>
								<td><input type="checkbox" name="other_work_id[]" value="<?php echo $relevant_experience->Teacher_Relevant_Experiences_ID; ?>"></td>
								<td><?php echo $relevant_experience->Organization; ?></td>
								<td><?php echo $relevant_experience->Position; ?></td>
								<td><?php echo $relevant_experience->Description; ?></td>
								<td><?php echo date('m/d/Y', strtotime($relevant_experience->Date)); ?></td>
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
					
					<legend>Skills</legend>
					
					<div class="form">
						<div class="form-group">
							<label>Computer Applications Proficiency</label>
							<span class="help-block">separated by a comma</span>
							<input class="form-control" type="text"  name="computer_proficient_skill" value="<?php echo set_value('computer_proficient_skill'); ?>">
							<?php echo form_error('computer_proficient_skill'); ?>
						</div>
						
						<div class="form-group">
							<label>Computer Applications Familiar With</label>
							<span class="help-block">separated by a comma</span>
							<input class="form-control" type="text"  name="computer_familiar_skill" value="<?php echo set_value('computer_familiar_skill'); ?>">
							<?php echo form_error('computer_familiar_skill'); ?>
						</div>
						
						<div class="form-group">
							<label>Others</label>
							<span class="help-block">separated by a comma</span>
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
										<button type="submit" class="btn btn-primary" name="reference_add" value="reference_add">Add to List</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-9">
						<h3>List of Professional References</h3>	
						<div class="customize-btn-group">
							<button type="submit" class="btn btn-danger" name="reference_delete" value="reference_delete">Delete</button>
						</div>
						<table class="table">
							<tr>
								<th></th>
								<th>Name</th>
								<th>Position</th>
								<th>Company</th>
								<th>Phone</th>
								<th>E-mail Address</th>
							</tr>
							<?php if ($professional_references) foreach ($professional_references as $professional_reference): ?>
							<tr>
								<td><input type="checkbox" name="reference_id[]" value="<?php echo $professional_reference->Teacher_Professional_Reference_ID; ?>"></td>
								<td><?php echo $professional_reference->Name; ?></td>
								<td><?php echo $professional_reference->Position; ?></td>
								<td><?php echo $professional_reference->Company; ?></td>
								<td><?php echo $professional_reference->Phone; ?></td>
								<td><?php echo $professional_reference->Email; ?></td>
							</tr>
							<?php endforeach; ?>
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
										<input class="form-control" type="text" name="affiliation_organization_input">
										<?php echo form_error('affiliation_organization_input'); ?>
									</div>
									<div class="form-group">
										<label>Organization Description</label>
										<input class="form-control" type="text" name="affiliation_description_input">
										<?php echo form_error('affiliation_description_input'); ?>
									</div>
									<div class="form-group">
										<label>Position</label>
										<input class="form-control" type="text" name="affiliation_position_input">
										<?php echo form_error('affiliation_position_input'); ?>
									</div>
									<div class="form-group">
										<label>Years of Affiliation</label>
										<input class="form-control" type="number" name="affiliation_years_input" min="0">
										<?php echo form_error('affiliation_years_input'); ?>
									</div>
									
									<div class="submit-button">
										<button type="submit" class="btn btn-primary" name="affiliation_to_organization_add" value="affiliation_to_organization_add">Add to List</button>
									</div>
								</div>	
							</div>
						</div>
					</div>
				
					<div class="col-md-9">
						<h3>List of Affiliations and Memberships to Other Organizations</h3>	
						<div class="customize-btn-group">
							<button type="submit" class="btn btn-danger" name="affiliation_to_organization_delete" value="affiliation_to_organization_delete">Delete</button>
						</div>
						<table class="table" id="affiliation_table">
							<tr>
								<th></th>
								<th>Organization</th>
								<th>Organization Description</th>
								<th>Position</th>
								<th>Years of Affiliation</th>
							</tr>
							<?php if ($affiliation_to_organizations) foreach ($affiliation_to_organizations as $affiliation_to_organization): ?>
							<tr>
								<td><input type="checkbox" name="affiliation_to_organization_id[]" value="<?php echo $affiliation_to_organization->Teacher_Affiliation_to_Organization_ID; ?>"></td>
								<td><?php echo $affiliation_to_organization->Organization; ?></td>
								<td><?php echo $affiliation_to_organization->Description; ?></td>
								<td><?php echo $affiliation_to_organization->Positions; ?></td>
								<td><?php echo $affiliation_to_organization->Years_Affiliated; ?></td>
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				
					<legend>Documents Submitted</legend>

					<div class="form">
						<div class="form-group">
							<label>Resume</label><br/>
							<input type="radio" name="resume" value="1" <?php if ($teacher->Resume == 1) { echo 'checked="checked"'; } ?>> Yes
							<input type="radio" name="resume" value="0" <?php if ($teacher->Resume == 0) { echo 'checked="checked"'; } ?>> No
							<?php echo form_error('resume'); ?>
						</div>
						
						<div class="form-group">
							<label>Photo</label><br/>
							<input type="radio" name="photo" value="1" <?php if ($teacher->Photo == 1) { echo 'checked="checked"'; } ?>> Yes
							<input type="radio" name="photo" value="0" <?php if ($teacher->Photo == 0) { echo 'checked="checked"'; } ?>> No
							<?php echo form_error('photo'); ?>
						</div>
						
						<div class="form-group">
							<label>Proof of Certification</label><br/>
							<input type="radio" name="proof" value="1" <?php if ($teacher->Proof_of_Certification == 1) { echo 'checked="checked"'; } ?>> Yes
							<input type="radio" name="proof" value="0" <?php if ($teacher->Proof_of_Certification == 0) { echo 'checked="checked"'; } ?>> No
							<?php echo form_error('proof'); ?>
						</div>
						
						<div class="form-group">
							<label>Diploma / TOR</label><br/>
							<input type="radio" name="diploma" value="1" <?php if ($teacher->Diploma_TOR == 1) { echo 'checked="checked"'; } ?>> Yes
							<input type="radio" name="diploma" value="0" <?php if ($teacher->Diploma_TOR == 0) { echo 'checked="checked"'; } ?>> No
							<?php echo form_error('diploma'); ?>
						</div>
					</div>
				</form>
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
			</div>
		
			<div class="tab-pane" id="attendance">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#best" data-toggle="tab">BEST</a></li>
					<li><a href="#adept" data-toggle="tab">ADEPT</a></li>
					<li><a href="#smp" data-toggle="tab">SMP</a></li>
				</ul>
			
				<div class="tab-content">
					<div class="tab-pane active" id="best">
						<div class="row">
							<div class="col-md-6">
								<div class="form">
									<div class="form-group">
										<label>Orientation Date</label>
										<input type="date" class="form-control" value="<?php if ($best_t3_attendance) echo date('Y-m-d', strtotime($best_t3_attendance->Orientation_Day)); ?>">
									</div>
									
									<div class="form-group">
										<label>Site Visit</label>
										<input type="date" class="form-control" value="<?php if ($best_t3_attendance) echo date('Y-m-d', strtotime($best_t3_attendance->Site_Visit)); ?>">
									</div>
									
									<div class="form-group">
										<label>GCAT</label>
										<input type="date" class="form-control" value="">
									</div>
								</div>
							</div>
					
							<div class="col-md-6">
								<div class="form">
									<div class="form-group">
										<label>Day 1</label>
										<input type="date" class="form-control" value="<?php if ($best_t3_attendance) echo date('Y-m-d', strtotime($best_t3_attendance->Day_1)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 2</label>
										<input type="date" class="form-control" value="<?php if ($best_t3_attendance) echo date('Y-m-d', strtotime($best_t3_attendance->Day_2)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 3</label>
										<span class="help-block">If with the faculty</span>
										<input type="date" class="form-control" value="<?php if ($best_t3_attendance) echo date('Y-m-d', strtotime($best_t3_attendance->Day_3)); ?>">
									</div>
								</div>	
							</div>
						</div>
					
						<div class="col-md-12">
							<div class="form">
								<div class="form-group">
									<label>Total Days Attended </label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="adept">
						<div class="row">
							<div class="col-md-6">
								<div class="form">
									<div class="form-group">
										<label>Orientation Date</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Orientation_Day)); ?>">
									</div>
									
									<div class="form-group">
										<label>Site Visit</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Site_Visit)); ?>">
									</div>
									
									<div class="form-group">
										<label>GCAT</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->GCAT)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 1</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Day_1)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 2</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Day_2)); ?>">
									</div>
								</div>
							</div>
					
							<div class="col-md-6">
								<div class="form">
									<div class="form-group">
										<label>Day 3</label>
										<span class="help-block">If with the faculty</span>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Day_3)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 4</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Day_4)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 5</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Day_5)); ?>">
									</div>
									
									<div class="form-group">
										<label>Day 6</label>
										<input type="date" class="form-control" value="<?php if ($adept_t3_attendance) echo date('Y-m-d', strtotime($adept_t3_attendance->Day_6)); ?>">
									</div>
								</div>
							</div>
						</div>
				
						<div class="col-md-12">
							<div class="form">
								<div class="form-group">
									<label>Total Days Attended</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
					</div>
				  
					<div class="tab-pane" id="smp">
				  		<legend>Checked By</legend>

						<div class="form">
							<div class="form-group">
								<label>Event</label>
								<input type="text" class="form-control" value="<?php if ($smp_t3_attendance) echo $smp_t3_attendance->Event; ?>">
							</div>

							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" value="">
							</div>

							<div class="form-group">
								<label>Date</label>
								<input type="date" class="form-control" value="<?php if ($smp_t3_attendance) echo date('Y-m-d', strtotime($smp_t3_attendance->Date)); ?>">
							</div>
						</div>
					
				  		<legend>Attendance</legend>

						<div class="form">
							<span class="help-block">Please check all that applies.</span>

							<div class="form-group">
								<input type="checkbox" name="time_in" value="yes" <?php if ($smp_t3_attendance) if ($smp_t3_attendance->Time_In) echo 'checked="checked"'; ?>>
								<label> Time In </label>
							</div>

							<div class="form-group">
								<input type="checkbox" name="am_snack" value="yes" <?php if ($smp_t3_attendance) if ($smp_t3_attendance->AM_Snack) echo 'checked="checked"'; ?>>
								<label> AM Snack </label>
							</div>

							<div class="form-group">
								<input type="checkbox" name="lunch" value="yes" <?php if ($smp_t3_attendance) if ($smp_t3_attendance->Lunch) echo 'checked="checked"'; ?>>
								<label> Lunch </label>
							</div>

							<div class="form-group">
								<input type="checkbox" name="pm_snack" value="yes" <?php if ($smp_t3_attendance) if ($smp_t3_attendance->PM_Snack) echo 'checked="checked"'; ?>>
								<label> PM Snack </label>
							</div>

							<div class="form-group">
								<input type="checkbox" name="time_out" value="yes" <?php if ($smp_t3_attendance) if ($smp_t3_attendance->Time_Out) echo 'checked="checked"'; ?>>
								<label> Time Out </label>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane" id="stipend">
				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">Add or Edit Stipend</div>
						<div class="panel-body">
							<div class="form">
								<div class="form-group">
									<label>From</label>
									<input class="form-control"  type="text" placeholder="11/10/2013">
								</div>

								<div class="form-group">
									<label>Subject</label>
									<input class="form-control"  type="text" placeholder="11/10/2013">
								</div>

								<legend>Stipend</legend>

								<div class="form-group">
									<label>Amount</label>
									<input class="form-control"  type="text" placeholder="100.00">
								</div><br />

								<div class="form-group">
									<label>Claimed</label><br />
									<input type="radio"> Yes
									<input type="radio"> No
								</div>

								<div class="submit-button">
									<button class="btn btn-primary">Add to List</button>
								</div>
							</div>
						</div>
					</div>
				</div>
		
				<div class="col-md-9">
					<h3>List of Stipend</h3>
					<div class="customize-btn-group">
						<button type="button" class="btn btn-danger">Delete</button>
					</div>
					<table class="table table-area">
						<tr>
							<th>From</th>
							<th>Subject</th>
							<th>Amount</th>
							<th>Claimed</th>
						</tr>
						<?php if (isset($stipends)) if ($stipends) foreach ($stipends as $stipend): ?>
						<tr>
							<td><?php echo $stipend->Checked_By; ?></td>
							<td><?php echo $stipend->Subject_Code; ?></td>
							<td><?php echo $stipend->Amount; ?></td>
							<td><?php echo $stipend->Claimed; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
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
								<label>Date of Application</label>
								<input class="form-control" type="date" name="date_of_application_best" value="<?php if (isset($best_adept_application->Date)) echo $best_adept_application->Date;?>">
							</div>

							<div class="form-group">
								<label>Subject Taking</label><br/>
								<input type="checkbox" name="subject" value="best" <?php if (isset($best_adept_application->Subject_Code)) if ($best_adept_application->Subject_Code == 'BEST/AdEPT' || $best_adept_application->Subject_Code == 'BEST') echo 'checked="checked"'; ?>> BEST
								<input type="checkbox" name="subject" value="adept" <?php if (isset($best_adept_application->Subject_Code)) if ($best_adept_application->Subject_Code == 'BEST/AdEPT' || $best_adept_application->Subject_Code == 'AdEPT') echo 'checked="checked"'; ?>> ADEPT
							</div>

							<legend>Questions</legend>

							<span class="help-block">Please share your thoughts on the following. Limit your answer to 100 to 500 words.</span>
							<div class="form-group">
								<label>What is your main motivation for participating in the certification program?</label>
								<input class="form-control" type="text" name="main_motivation" value="<?php if (isset($best_adept_application->Answer_1)) echo $best_adept_application->Answer_1;?>">
							</div>

							<div class="form-group">
								<label>Are there any schedule / work / health / personal impediments to your participation in the certification process? If yes, please explain. Include dates and other relevant details.	</label>
								<input class="form-control" type="text" name="problem_details" value="<?php if (isset($best_adept_application->Answer_2)) echo $best_adept_application->Answer_2;?>">
							</div>

							<div class="form-group">
								<label>Please share any relevant information not mentioned above that might help you be considered for certification.</label>
								<input class="form-control" type="text" name="answer_3" value="<?php if (isset($best_adept_application->Answer_3)) echo $best_adept_application->Answer_3;?>">
							</div>
						</div>
					</div>
		  
		  			<div class="tab-pane" id="smp_app">
						<div class="form">
							<div class="form-group">
								<label>Date of Application</label>
								<input class="form-control" type="date" name="date_of-application" value="<?php if (isset($smp_application->Date)) echo $smp_application->Date;?>">
							</div>

							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="subject">
								<?php foreach ($subjects as $subject): ?>
									<option value="<?php echo $subject->Subject_ID; ?>" <?php if (isset($smp_application->Subject_ID)) if ($smp_application->Subject_ID == $subject->Subject_ID) echo 'selected="selected"'; ?>><?php echo $subject->Subject_Code; ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>How do you think the BPO contributes to nation building?</label>
								<input class="form-control" type="text" name="nation_building" value="<?php if (isset($smp_application->Answer_1)) echo $smp_application->Answer_1;?>">
							</div>

							<div class="form-group">
								<label>What is the difference between a man and a woman?</label>
								<input class="form-control" type="text" name="man_woman" value="<?php if (isset($smp_application->Answer_2)) echo $smp_application->Answer_2;?>">
							</div>
							
							<legend>Additional Information</legend>

							<div class="form-group">
								<label>Approximate Total Numbers of Subjects Handled</label>
								<input class="form-control" type="number" value="<?php if (isset($smp_application->Total_Number_Of_Subjects_Handled)) echo $smp_application->Total_Number_Of_Subjects_Handled;?>">
							</div>

							<div class="form-group">
								<label>Number of Years Teaching</label>
								<input class="form-control" type="number" value="<?php if (isset($smp_application->Years_Teaching)) echo $smp_application->Years_Teaching;?>">
							</div>

							<div class="form-group">
								<label>Number of Years Teaching in Current Institution</label>
								<input class="form-control" type="number" value="<?php if (isset($smp_application->Years_Teaching_In_Current_Institution)) echo $smp_application->Years_Teaching_In_Current_Institution;?>">
							</div>

							<div class="form-group">
								<label>Average Number of Students per Class</label>
								<input class="form-control" type="number" value="<?php if (isset($smp_application->Avg_Student_Per_Class)) echo $smp_application->Avg_Student_Per_Class;?>">
							</div>
													
							<div class="form-group">
								<label>What are the support offices available to you?</label>
								<input class="form-control" type="text" value="<?php if (isset($smp_application->Support_Offices_Available)) echo $smp_application->Support_Offices_Available;?>">
							</div>

							<div class="form-group">
								<label>Instructional materials support?</label>
								<input class="form-control" type="text" value="<?php if (isset($smp_application->Instructional_Materials_Support)) echo $smp_application->Instructional_Materials_Support;?>">
							</div>

							<div class="form-group">
								<label>Technology support?</label>
								<input class="form-control" type="text" value="<?php if (isset($smp_application->Technology_Support)) echo $smp_application->Technology_Support;?>">
							</div>

							<div class="form-group">
								<label>Can you readily use a laboratory when needed?</label>
								<input class="form-control" type="text" value="<?php if (isset($smp_application->Readily_Use_Lab)) echo $smp_application->Readily_Use_Lab;?>">
							</div>

							<div class="form-group">
								<label>Internet services? (school)</label>
								<input class="form-control" type="text" value="<?php if (isset($smp_application->Internet_Services)) echo $smp_application->Internet_Services;?>">
							</div>
					
							<legend>Training</legend>

							<div class="col-md-12">
								<div class="row">
									<!-- <div class="col-md-3">
										<div class="panel panel-info">
											<div class="panel-heading">Add to List</div>
											<div class="panel-body">
												<div class="form">
													<div class="form-group">
														<label>Training</label>
														<input class="form-control" type="text">
													</div>

													<div class="form-group">
														<label>Training Body</label>
														<input class="form-control" type="text">
													</div>

													<div class="form-group">
														<label>Training Date</label>
														<input class="form-control" type="date">
													</div>
												</div>	
											</div>
										</div>
									</div> -->
				
									<div class="col-md-9">
										<h3>List of Training</h3>
										<!-- <div class="customize-btn-group">
											<button type="button" class="btn btn-danger">Delete</button>
										</div> -->
										<table class="table">
											<tr>
												<th>Training</th>
												<th>Training Body</th>
												<th>Training Date</th>
											</tr>
											<?php if ($related_trainings) foreach ($related_trainings as $related_training): ?>
											<tr>
												<td><?php echo $related_training->Training; ?></td>
												<td><?php echo $related_training->Training_Body; ?></td>
												<td><?php echo $related_training->Training_Date; ?></td>
											</tr>
											<?php endforeach; ?>
										</table>
									</div>
								</div>
							</div>
					
							<legend>Required</legend>

							<div class="form-group">
								<label>Contract</label><br/>
								<input type="radio" name="contract" value="1" <?php if (isset($smp_application->Contract)) if ($smp_application->Contract == 1) echo 'checked="checked"'; ?>> Yes
								<input type="radio" name="contract" value="0" <?php if (isset($smp_application->Contract)) if ($smp_application->Contract == 0) echo 'checked="checked"'; ?>> No
							</div>

							<div class="form-group">
								<label>Self-Assesment Form<span class="help-block">Business Communcation</span></label><br/>
								<input type="radio" name="assessment_bc" value="1" <?php if (isset($smp_application->Self_Assessment_Form_Business_Communication)) if ($smp_application->Self_Assessment_Form_Business_Communication == 1) echo 'checked="checked"'; ?>> Yes
								<input type="radio" name="assessment_bc" value="0" <?php if (isset($smp_application->Self_Assessment_Form_Business_Communication)) if ($smp_application->Self_Assessment_Form_Business_Communication == 0) echo 'checked="checked"'; ?>> No
							</div>

							<div class="form-group">
								<label>Self-Assesment Form<span class="help-block">Service Culture</span></label><br/>
								<input type="radio" name="assessment_sc" value="1" <?php if (isset($smp_application->Self_Assessment_Form_Service_Culture)) if ($smp_application->Self_Assessment_Form_Service_Culture == 1) echo 'checked="checked"'; ?>> Yes
								<input type="radio" name="assessment_sc" value="0" <?php if (isset($smp_application->Self_Assessment_Form_Service_Culture)) if ($smp_application->Self_Assessment_Form_Service_Culture == 0) echo 'checked="checked"'; ?>> No
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>