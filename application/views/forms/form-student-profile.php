<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Proctor successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>Student Profile</h1>
	
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#basic" data-toggle="tab">Basic Information</a></li>
	  <li><a href="#grades" data-toggle="tab">Grades</a></li>
	  <li><a href="#tracker" data-toggle="tab">Tracker</a></li>
	</ul>
	
	<div class="tab-content">
		<div class="tab-pane active" id="basic">

			<legend>Personal Information</legend>
			
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>ID Number</label>
					<input type="text" class="form-control" name="id_number" value="<?php echo $student->Student_ID_Number; ?>">
					<?php echo form_error('id_number'); ?>
				</div>
			</form>

			<form class="form-inline" role="form">
				<div class="form-group">		
					<label>Name Suffix</label>			
					<input class="form-control" type="text" name="name_suffix" value="<?php echo $student->Name_Suffix; ?>">
					<?php echo form_error('name_suffix'); ?>
				</div>
				
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="last_name" value="<?php echo $student->Last_Name; ?>">
					<?php echo form_error('last_name'); ?>
				</div>
				
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" value="<?php echo $student->First_Name; ?>">
					<?php echo form_error('first_name'); ?>
				</div>
				
				<div class="form-group">
					<label>Middle Initial</label>
					<input type="text" class="form-control" name="middle_initial" value="<?php echo $student->Middle_Initial; ?>">
					<?php echo form_error('middle_initial'); ?>
				</div>
			</form>
				
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Civil Status</label><br/>
					<input type="radio" name="civil" value="married" <?php if ($student->Civil_Status == 'married') { echo 'checked="checked"'; }?>> Married
					<input type="radio" name="civil" value="single" <?php if ($student->Civil_Status == 'single') { echo 'checked="checked"'; }?>> Single
					<input type="radio" name="civil" value="separated" <?php if ($student->Civil_Status == 'separated') { echo 'checked="checked"'; }?>> Separated
					<?php echo form_error('civil'); ?>
				</div>
			</form>
			
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Birth Day</label>
					<input type="date" class="form-control" name="birthday" value="<?php echo date('Y-m-d', strtotime($student->Birthdate)); ?>">
					<?php echo form_error('birthday'); ?>
				</div>
			</form>
			
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Nationality</label>
					<input type="text" class="form-control" name="nationality" value="<?php echo $student->Nationality; ?>">
					<?php echo form_error('nationality'); ?>
				</div>
			</form>
						
			<legend>Current Address</legend>
				
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Street Number</label>
					<input type="text" class="form-control" name="street_number" value="<?php echo $student->Street_Number; ?>">
					<?php echo form_error('street_number'); ?>
				</div>
					
				<div class="form-group">
					<label>Street Name</label>
					<input type="text" class="form-control" name="street_name" value="<?php echo $student->Street_Name; ?>">
					<?php echo form_error('street_name'); ?>
				</div>
					
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" name="city" value="<?php echo $student->City; ?>">
					<?php echo form_error('city'); ?>
				</div>
			</form>

			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Province</label>
					<input type="text" class="form-control" name="province" value="<?php echo $student->Province; ?>">
					<?php echo form_error('province'); ?>
				</div>
					
				<div class="form-group">
					<label>Region</label>
					<input type="text" class="form-control" name="region" value="<?php echo $student->Region; ?>">
					<?php echo form_error('region'); ?>
				</div>
					
				</form>
						
			<legend>Alternate Address</legend>
				
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Alternate Address</label>
					<input type="text" class="form-control" name="alternate_address" value="<?php echo $student->Alternate_Address; ?>">
					<?php echo form_error('alternate_address'); ?>
				</div>
			</form>
				
			<legend>Contact Details</legend>
				
			<form class="form-inline" role="form">
				<div class="form-group"><label>Mobile</label>
					<input type="text" class="form-control" name="mobile" value="<?php echo $student->Mobile_Number; ?>">
					<?php echo form_error('mobile'); ?>
				</div>
					
				<div class="form-group"><label>Landline</label>
					<input type="text" class="form-control" name="landline" value="<?php echo $student->Landline; ?>">
					<?php echo form_error('landline'); ?>
				</div>
					
				<div class="form-group"><label>Email</label>
					<input type="text" class="form-control"name="email" value="<?php echo $student->Email; ?>">
					<?php echo form_error('email'); ?>
				</div>
					
				<div class="form-group"><label>Facebook</label>
					<input type="text" class="form-control" name="facebook" value="<?php echo $student->Facebook; ?>">
					<?php echo form_error('facebook'); ?>
				</div>
			</form>

			<legend>Academic Background</legend>
				
			<form class="form-inline" role="form">
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
					<input class="form-control" type="text" placeholder="degree" name="degree" value="<?php echo set_value('degree'); ?>">
					<?php echo form_error('degree'); ?>
				</div>
				
				<div class="form-group">
					<label>Year Level</label>
					<input class="form-control" type="text" name="year" value="<?php echo set_value('year'); ?>">
					<?php echo form_error('year'); ?>
				</div>	
			</form>
					
			<form class="form-inline" role="form">		
				<div class="form-group">
					<label>School</label>
					<input type="text" class="form-control" name="school" value="<?php echo set_value('school'); ?>">
					<?php echo form_error('school'); ?>
				</div>
					
				<div class="form-group">
					<label>Branch</label>
					<input type="text" class="form-control" name="branch" value="<?php echo set_value('branch'); ?>">
					<?php echo form_error('branch'); ?>
				</div>
					
				<div class="form-group">
					<label>Expected Year of Graduation</label>
					<input type="text" class="form-control" name="expected_year_of_graduation" value="<?php echo set_value('expected_year_of_graduation'); ?>">
					<?php echo form_error('expected_year_of_graduation'); ?>
				</div>
			</form>
					
			<form class="form-inline" role="form">	
				<div class="form-group">
					<label>Are you a DOST Scholar?</label><br />
					<input type="radio" name="DOSTscholar" value="yes"> Yes
					<input type="radio" name="DOSTscholar" value="No"> No
					<?php echo form_error('DOSTscholar'); ?>
				</div>
			</form>
			
			<form class="form-inline" role="form">	
				<div class="form-group">
					<label>If not, are you a recipient of any scholarship?</label><br />
					<input type="radio" name="scholar" value="yes"> Yes
					<input type="radio" name="scholar" value="No"> No
					<?php echo form_error('scholar'); ?>
				</div>
			</form>
			
			<form class="form-inline" role="form">	
				<div class="form-group">
					<label>Are you willing to work for the IT-BPO sector</label><br/>
					<input type="radio" name="work" value="yes"> Yes
					<input type="radio" name="work" value="No"> No		
				</div>	
				<?php echo form_error('work'); ?>
			</form>
		</div>
	  
		<div class="tab-pane" id="grades">
			<legend>Grades</legend>
			<table class="table">
				<tr>
					<th>Program</th>
					<th>Date</th>
					<th>Grade</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>GCAT</td>
					<td>December 20, 2013</td>
					<td>80</td>
					<td>Pass</td>
				</tr>
			</table>
		</div>
	  
		<div class="tab-pane" id="tracker">
	
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#gcat" data-toggle="tab">GCAT</a></li>
			  <li><a href="#best" data-toggle="tab">BEST</a></li>
			  <li><a href="#adept" data-toggle="tab">ADEPT</a></li>
			  <li><a href="#smp" data-toggle="tab">SMP</a></li>
			</ul>
			
			<div class="tab-content">
				<div class="tab-pane active" id="gcat">			
					<form class="form" role="form">
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text" name="gcat_school" value="<?php echo set_value('gcat_school'); ?>">
				<?php echo form_error('gcat_school'); ?>
						</div>			
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text" name="gcat_branch" value="<?php echo set_value('gcat_branch'); ?>">
				<?php echo form_error('gcat_branch'); ?>
						</div>			
						<div class="form-group">		
							<label>Subject</label>			
							<input class="form-control" type="text" name="gcat_subject" value="<?php echo set_value('gcat_subject'); ?>">
				<?php echo form_error('gcat_subject'); ?>
						</div>			
						<div class="form-group">		
							<label>Proctor</label>			
							<input class="form-control" type="text" name="gcat_proctor" value="<?php echo set_value('gcat_proctor'); ?>">
				<?php echo form_error('gcat_proctor'); ?>
						</div>		
						<div class="form-group">		
							<label>Semester</label>			
							<input class="form-control" type="text" name="gcat_semester" value="<?php echo set_value('gcat_semester'); ?>">
				<?php echo form_error('gcat_semester'); ?>
						</div>			
						<div class="form-group">		
							<label>Year</label>			
							<input class="form-control" type="text" name="gcat_year" value="<?php echo set_value('gcat_year'); ?>">
				<?php echo form_error('gcat_year'); ?>
						</div>			
						<div class="form-group">		
							<label>Session ID</label>			
							<input class="form-control" type="text" name="gcat_session_id" value="<?php echo set_value('gcat_session_id'); ?>">
				<?php echo form_error('gcat_session_id'); ?>
						</div>			
						<div class="form-group">		
							<label>Test Date</label>			
							<input class="form-control" type="text" name="gcat_test_date" value="<?php echo set_value('gcat_test_date'); ?>">
				<?php echo form_error('gcat_test_date'); ?>
						</div>			
						<div class="form-group">		
							<label>Status</label>			
							<input class="form-control" type="text" name="gcat_status" value="<?php echo set_value('gcat_status'); ?>">
				<?php echo form_error('gcat_status'); ?>
						</div>			
					</form>
				</div>
				<div class="tab-pane" id="best">
				
					<form class="form" role="form">	
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text" name="best_school" value="<?php echo set_value('best_school'); ?>">
				<?php echo form_error('best_school'); ?>
						</div>			
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text" name="best_branch" value="<?php echo set_value('best_branch'); ?>">
				<?php echo form_error('best_branch'); ?>
						</div>			
						<div class="form-group">		
							<label>Date</label>			
							<input class="form-control" type="date" name="best_date" value="<?php echo set_value('best_date'); ?>">
				<?php echo form_error('best_date'); ?>
						</div>			
						<div class="form-group">		
							<label>Control Number</label>			
							<input class="form-control" type="text" name="best_control_number" value="<?php echo set_value('best_control_number'); ?>">
				<?php echo form_error('best_control_number'); ?>
						</div>		
						<div class="form-group">		
							<label>Username</label>			
							<input class="form-control" type="text" name="best_username" value="<?php echo set_value('best_username'); ?>">
				<?php echo form_error('best_username'); ?>
						</div>			
					</form>
				</div>
				<div class="tab-pane" id="adept">
				
					<form class="form" role="form">	
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text" name="adept_school" value="<?php echo set_value('adept_school'); ?>">
				<?php echo form_error('adept_school'); ?>
						</div>			
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text" name="adept_branch" value="<?php echo set_value('adept_branch'); ?>">
				<?php echo form_error('adept_branch'); ?>
						</div>			
						<div class="form-group">		
							<label>Date</label>			
							<input class="form-control" type="date" name="adept_date" value="<?php echo set_value('adept_date'); ?>">
				<?php echo form_error('adept_date'); ?>
						</div>		
						<div class="form-group">		
							<label>Control Number</label>			
							<input class="form-control" type="text" name="adept_control_number" value="<?php echo set_value('adept_control_number'); ?>">
				<?php echo form_error('adept_control_number'); ?>
						</div>		
						<div class="form-group">		
							<label>Username</label>			
							<input class="form-control" type="text" name="adept_username" value="<?php echo set_value('adept_username'); ?>">
				<?php echo form_error('adept_username'); ?>
						</div>			
					</form>
					
				</div>
				
				<div class="tab-pane" id="smp">
				
					<legend>General Information</legend>
					
					<form class="form" role="form">
						<div class="form-group">						
							<label>Taking SMP as</label>
							<select class="form-control" name="smp" value="<?php echo set_value('smp'); ?>">
								<option>Option1</option>
								<option>Option2</option>
								<option>Option3</option>
							</select>
				<?php echo form_error('smp'); ?>
						</div>
					
					</form>
					
					<legend>Subjects</legend>
					<form class="form" role="form">
						<table class="table">
							<tr>
								<th>Subject</th>
								<th>Year Taken</th>
								<th>Semester</th>
								<th>Status</th>
								<th>Grade Received</th>
								<th>No. of Times Taken</th>
							</tr>
							<tr>
								<td>Business Communication</td>
								<td>
									<select class="form-control" name="bizcom_year" value="<?php echo set_value('bizcom_year'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('bizcom_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bizcom_semester'); ?>">
									<?php echo form_error('bizcom_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status" value="<?php echo set_value('bizcom_status'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('bizcom_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bizcom_grade'); ?>">
									<?php echo form_error('bizcom_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bizcom_times_taken'); ?>">
									<?php echo form_error('bizcom_times_taken'); ?>
								</td>
							</tr>	
							<tr>
								<td>BPO101</td>
								<td>
									<select class="form-control" name="bizcom_year" value="<?php echo set_value('bpo101_year'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('bpo101_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bpo101_semester'); ?>">
									<?php echo form_error('bpo101_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status" value="<?php echo set_value('bpo101_status'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('bpo101_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bpo101_grade'); ?>">
									<?php echo form_error('bpo101_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bpo101_times_taken'); ?>">
									<?php echo form_error('bpo101_times_taken'); ?>
								</td>
							</tr>
							<tr>
								<td>BPO102</td>
								<td>
									<select class="form-control" name="bizcom_year" value="<?php echo set_value('bpo102_year'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('bpo102_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bpo102_semester'); ?>">
									<?php echo form_error('bpo102_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status" value="<?php echo set_value('bpo102_status'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('bpo102_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bpo102_grade'); ?>">
									<?php echo form_error('bpo102_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bpo102_times_taken'); ?>">
									<?php echo form_error('bpo102_times_taken'); ?>
								</td>
							</tr>
							<tr>
								<td>Service Culture</td>
								<td>
									<select class="form-control" name="bizcom_year" value="<?php echo set_value('sc_year'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('sc_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('sc_semester'); ?>">
									<?php echo form_error('sc_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status" value="<?php echo set_value('sc_status'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('sc_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('sc_grade'); ?>">
									<?php echo form_error('sc_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('sc_times_taken'); ?>">
									<?php echo form_error('sc_times_taken'); ?>
								</td>
							</tr>
							<tr>
								<td>Systems Thinking</td>
								<td>
									<select class="form-control" name="bizcom_year" value="<?php echo set_value('st_year'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('st_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('st_semester'); ?>">
									<?php echo form_error('st_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status" value="<?php echo set_value('st_status'); ?>">
										<option>Option1</option>
										<option>Option2</option>
										<option>Option3</option>
									</select>
									<?php echo form_error('st_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('st_grade'); ?>">
									<?php echo form_error('st_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('st_times_taken'); ?>">
									<?php echo form_error('st_times_taken'); ?>
								</td>
							</tr>
						</table>
					</form>
					
					<legend>Internship</legend>
					<form class="form" role="form">
					
						<div class="form-group">		
							<label>Status</label>			
							<input class="form-control" type="text" name="intern_status" value="<?php echo set_value('intern_status'); ?>">
				<?php echo form_error('intern_status'); ?>
						</div>		
						<div class="form-group">		
							<label>Grades</label>			
							<input class="form-control" type="text" name="intern_grades" value="<?php echo set_value('intern_grades'); ?>">
				<?php echo form_error('intern_grades'); ?>
						</div>		
						<div class="form-group">		
							<label>Remarks</label>			
							<input class="form-control" type="text" name="intern_remarks" value="<?php echo set_value('intern_remarks'); ?>">
				<?php echo form_error('intern_remarks'); ?>
						</div>	
						
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text" name="intern_school" value="<?php echo set_value('intern_school'); ?>">
				<?php echo form_error('intern_school'); ?>
						</div>	
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text" name="intern_branch" value="<?php echo set_value('intern_branch'); ?>">
				<?php echo form_error('intern_branch'); ?>
						</div>								
						<div class="form-group">		
							<label>Year</label>			
							<input class="form-control" type="text" name="intern_year" value="<?php echo set_value('intern_year'); ?>">
				<?php echo form_error('intern_year'); ?>
						</div>		
						<div class="form-group">		
							<label>Semester</label>			
							<input class="form-control" type="text" name="intern_year" value="<?php echo set_value('intern_year'); ?>">
				<?php echo form_error('intern_year'); ?>
						</div>		
						<div class="form-group">		
							<label>Company Information</label>			
							<input class="form-control" type="text" name="company_information" value="<?php echo set_value('company_information'); ?>">
				<?php echo form_error('company_information'); ?>
						</div>		
						<div class="form-group">		
							<label>Name of Company</label>			
							<input class="form-control" type="text" name="company_name" value="<?php echo set_value('company_name'); ?>">
				<?php echo form_error('company_name'); ?>
						</div>		
						<div class="form-group">		
							<label>Company Address</label>			
							<input class="form-control" type="text" name="company_address" value="<?php echo set_value('company_address'); ?>">
				<?php echo form_error('company_address'); ?>
						</div>		
						<div class="form-group">		
							<label>Department / Divison</label>			
							<input class="form-control" type="text" name="department" value="<?php echo set_value('department'); ?>">
				<?php echo form_error('department'); ?>
						</div>		
						<div class="form-group">		
							<label>Supervisor / Mentor</label>			
							<input class="form-control" type="text" name="supervisor" value="<?php echo set_value('supervisor'); ?>">
				<?php echo form_error('supervisor'); ?>
						</div>		
						<div class="form-group">		
							<label>Supervisor's Contact Details</label>			
							<input class="form-control" type="text" name="supervisor_contact_details" value="<?php echo set_value('supervisor_contact_details'); ?>">
				<?php echo form_error('supervisor_contact_details'); ?>
						</div>		
						<div class="form-group">		
							<label>Supervisor's Email</label>			
							<input class="form-control" type="text" name="supervisor_email" value="<?php echo set_value('supervisor_email'); ?>">
				<?php echo form_error('supervisor_email'); ?>
						</div>		
						<div class="form-group">		
							<label>Date Started</label>			
							<input class="form-control" type="date" name="start_date" value="<?php echo set_value('start_date'); ?>">
				<?php echo form_error('start_date'); ?>
						</div>		
						<div class="form-group">		
							<label>Date Ended</label>			
							<input class="form-control" type="date" name="end_date" value="<?php echo set_value('end_date'); ?>">
				<?php echo form_error('end_date'); ?>
						</div>		
						<div class="form-group">		
							<label>Total Internship Hours</label>			
							<input class="form-control" type="number" name="total_internship_hours" value="<?php echo set_value('total_internship_hours'); ?>">
				<?php echo form_error('total_internship_hours'); ?>
						</div>		
						<div class="form-group">		
							<label>Evaluation Form</label><br />
							<input type="radio" name="evaluation_form" value="<?php echo set_value('evaluation_form'); ?>"> Yes
							<input type="radio" name="evaluation_form" value="<?php echo set_value('evaluation_form'); ?>"> No
				<?php echo form_error('evaluation_form'); ?>
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
				<?php echo form_error('intern_stat'); ?>							
						</div>		
					</form>
				</div>
				
			</div>
	  </div>
	  
	</div>
</div>
