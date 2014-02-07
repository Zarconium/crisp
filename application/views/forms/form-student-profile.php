<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1><?php echo $this->student->getStudentFullNameById($student->Student_ID)->Full_Name; ?> <small><?php echo $this->school->getSchoolById($student->School_ID)->Name . " - " . $this->school->getSchoolById($student->School_ID)->Branch; ?></small></h1>
	
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
					<input type="radio" name="civil" value="married" <?php if (!strcasecmp($student->Civil_Status, 'married')) { echo 'checked="checked"'; }?>> Married
					<input type="radio" name="civil" value="single" <?php if (!strcasecmp($student->Civil_Status, 'single')) { echo 'checked="checked"'; }?>> Single
					<input type="radio" name="civil" value="separated" <?php if (!strcasecmp($student->Civil_Status, 'separated')) { echo 'checked="checked"'; }?>> Separated
					<input type="radio" name="civil" value="widowed" <?php if (!strcasecmp($student->Civil_Status, 'widowed')) { echo 'checked="checked"'; }?>> Widowed
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
						<option value="BS" <?php if (substr($student->Course, 0, 2) == 'BS') { echo 'selected="selected"'; }?>>BS</option>
						<option value="AB" <?php if (substr($student->Course, 0, 2) == 'AB') { echo 'selected="selected"'; }?>>AB</option>
					</select>
					<?php echo form_error('degree_type'); ?>
				</div>
				
				<div class="form-group">
					<label>Degree</label>
					<input class="form-control" type="text" name="degree" value="<?php echo substr($student->Course, 3); ?>">
					<?php echo form_error('degree'); ?>
				</div>
				
				<div class="form-group">
					<label>Year Level</label>
					<input class="form-control" type="text" name="year" value="<?php echo $student->Year; ?>">
					<?php echo form_error('year'); ?>
				</div>	
			</form>
					
			<form class="form-inline" role="form">		
				<div class="form-group">
					<label>School</label>
					<select class="form-control" name="school">
					<?php foreach ($schools as $school): ?>
						<option value="<?php echo $school->School_ID ?>" <?php if ($student->School_ID == $school->School_ID) { echo 'selected="selected"'; }?>><?php echo $school->Name . " - " . $school->Branch ?></option>
					<?php endforeach; ?>
					</select>
					<?php echo form_error('school'); ?>
				</div>
					
				<div class="form-group">
					<label>Expected Year of Graduation</label>
					<input type="text" class="form-control" name="expected_year_of_graduation" value="<?php echo $student->Expected_Year_of_Graduation; ?>">
					<?php echo form_error('expected_year_of_graduation'); ?>
				</div>
			</form>
					
			<form class="form-inline" role="form">	
				<div class="form-group">
					<label>Are you a DOST Scholar?</label><br />
					<input type="radio" name="DOSTscholar" value="1" <?php if ($student->DOST_Scholar == 1) { echo 'checked="checked"'; } ?>> Yes
					<input type="radio" name="DOSTscholar" value="0" <?php if ($student->DOST_Scholar == 0) { echo 'checked="checked"'; } ?>> No
					<?php echo form_error('DOSTscholar'); ?>
				</div>
			</form>
			
			<form class="form-inline" role="form">	
				<div class="form-group">
					<label>If not, are you a recipient of any scholarship?</label><br />
					<input type="radio" name="scholar" value="1" <?php if ($student->Scholar == 1) { echo 'checked="checked"'; } ?>> Yes
					<input type="radio" name="scholar" value="0" <?php if ($student->Scholar == 0) { echo 'checked="checked"'; } ?>> No
					<?php echo form_error('scholar'); ?>
				</div>
			</form>
			
			<form class="form-inline" role="form">	
				<div class="form-group">
					<label>Are you willing to work for the IT-BPO sector</label><br/>
					<input type="radio" name="work" value="1" <?php if ($student->Interested_in_ITBPO == 1) { echo 'checked="checked"'; } ?>> Yes
					<input type="radio" name="work" value="0" <?php if ($student->Interested_in_ITBPO == 0) { echo 'checked="checked"'; } ?>> No		
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
							<label>Proctor</label>
							<input class="form-control" type="text" name="gcat_proctor" value="<?php if (isset($this->proctor->getProctorFullNameById($gcat_tracker->Proctor_ID)->Full_Name)) echo $this->proctor->getProctorFullNameById($gcat_tracker->Proctor_ID)->Full_Name; ?>">
							<?php echo form_error('gcat_proctor'); ?>
						</div>

						<div class="form-group">
							<label>Semester</label>
							<input class="form-control" type="text" name="gcat_semester" value="<?php if(isset($gcat_tracker->Semester)) echo $gcat_tracker->Semester; ?>">
							<?php echo form_error('gcat_semester'); ?>
						</div>

						<div class="form-group">
							<label>Year</label>
							<input class="form-control" type="text" name="gcat_year" value="<?php if(isset($gcat_tracker->School_Year)) echo $gcat_tracker->School_Year; ?>">
							<?php echo form_error('gcat_year'); ?>
						</div>

						<div class="form-group">
							<label>Session ID</label>
							<input class="form-control" type="text" name="gcat_session_id" value="<?php if(isset($gcat_tracker->Session_ID)) echo $gcat_tracker->Session_ID; ?>">
							<?php echo form_error('gcat_session_id'); ?>
						</div>

						<div class="form-group">
							<label>Test Date</label>
							<input class="form-control" type="date" name="gcat_test_date" value="<?php if(isset($gcat_tracker->Test_Date)) echo date('Y-m-d', strtotime($gcat_tracker->Test_Date)); ?>">
							<?php echo form_error('gcat_test_date'); ?>
						</div>

						<div class="form-group">
							<label>Status</label>
							<input class="form-control" type="text" name="gcat_status" value="<?php if(isset($gcat_tracker->Status_Name)) echo $gcat_tracker->Status_Name; ?>">
							<?php echo form_error('gcat_status'); ?>
						</div>
					</form>
				</div>

				<div class="tab-pane" id="best">
					<form class="form" role="form">
						<div class="form-group">
							<label>Date</label>
							<input class="form-control" type="date" name="best_date" value="<?php if (isset($best_tracker->Updated_At)) echo date('Y-m-d', strtotime($best_tracker->Updated_At)); ?>">
							<?php echo form_error('best_date'); ?>
						</div>

						<div class="form-group">
							<label>Control Number</label>
							<input class="form-control" type="text" name="best_control_number" value="<?php if (isset($best_tracker->Control_Number)) echo $best_tracker->Control_Number; ?>">
							<?php echo form_error('best_control_number'); ?>
						</div>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="best_username" value="<?php if (isset($best_tracker->Username)) echo $best_tracker->Username; ?>">
							<?php echo form_error('best_username'); ?>
						</div>
					</form>
				</div>

				<div class="tab-pane" id="adept">
					<form class="form" role="form">	
						<div class="form-group">
							<label>Date</label>
							<input class="form-control" type="date" name="adept_date" value="<?php if (isset($adept_tracker->Updated_At)) echo date('Y-m-d', strtotime($adept_tracker->Updated_At)); ?>">
							<?php echo form_error('adept_date'); ?>
						</div>

						<div class="form-group">
							<label>Control Number</label>	
							<input class="form-control" type="text" name="adept_control_number" value="<?php if (isset($adept_tracker->Control_Number)) echo $adept_tracker->Control_Number; ?>">
							<?php echo form_error('adept_control_number'); ?>
						</div>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="adept_username" value="<?php if (isset($adept_tracker->Username)) echo $adept_tracker->Username; ?>">
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
									<input class="form-control" type="text" name="bizcon_year" value="<?php if (isset($bizcom->School_Year)) echo $bizcom->School_Year; ?>">
									<?php echo form_error('bizcom_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php if (isset($bizcom->Semester)) echo $bizcom->Semester; ?>">
									<?php echo form_error('bizcom_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status">
									<?php foreach ($statuses as $status): ?>
										<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($bizcom->Status_ID)) if ($status->Status_ID == $bizcom->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
									<?php endforeach; ?>
									</select>
									<?php echo form_error('bizcom_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php if (isset($bizcom->Grade)) echo $bizcom->Grade; ?>">
									<?php echo form_error('bizcom_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php if (isset($bizcom->Times_Taken)) echo $bizcom->Times_Taken; ?>">
									<?php echo form_error('bizcom_times_taken'); ?>
								</td>
							</tr>	
							<tr>
								<td>BPO101</td>
								<td>
									<input class="form-control" type="text" name="bpo101_year" value="<?php if (isset($bpo101->School_Year)) echo $bpo101->School_Year; ?>">
									<?php echo form_error('bpo101_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php if (isset($bpo101->Semester)) echo $bpo101->Semester; ?>">
									<?php echo form_error('bpo101_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status">
									<?php foreach ($statuses as $status): ?>
										<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($bpo101->Status_ID)) if ($status->Status_ID == $bpo101->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
									<?php endforeach; ?>
									</select>
									<?php echo form_error('bpo101_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php if (isset($bpo101->Grade)) echo $bpo101->Grade; ?>">
									<?php echo form_error('bpo101_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php if (isset($bpo101->Times_Taken)) echo $bpo101->Times_Taken; ?>">
									<?php echo form_error('bpo101_times_taken'); ?>
								</td>
							</tr>
							<tr>
								<td>BPO102</td>
								<td>
									<input class="form-control" type="text" name="bpo102_year" value="<?php if (isset($bpo102->School_Year)) echo $bpo102->School_Year; ?>">
									<?php echo form_error('bpo102_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php if (isset($bpo102->Semester)) echo $bpo102->Semester; ?>">
									<?php echo form_error('bpo102_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status">
									<?php foreach ($statuses as $status): ?>
										<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($bpo102->Status_ID)) if ($status->Status_ID == $bpo102->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
									<?php endforeach; ?>
									</select>
									<?php echo form_error('bpo102_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php if (isset($bpo102->Grade)) echo $bpo102->Grade; ?>">
									<?php echo form_error('bpo102_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php if (isset($bpo102->Times_Taken)) echo $bpo102->Times_Taken; ?>">
									<?php echo form_error('bpo102_times_taken'); ?>
								</td>
							</tr>
							<tr>
								<td>Service Culture</td>
								<td>
									<input class="form-control" type="text" name="sc_year" value="<?php if (isset($sc101->School_Year)) echo $sc101->School_Year; ?>">
									<?php echo form_error('sc_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php if (isset($sc101->Semester)) echo $sc101->Semester; ?>">
									<?php echo form_error('sc_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status">
									<?php foreach ($statuses as $status): ?>
										<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($sc101->Status_ID)) if ($status->Status_ID == $sc101->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
									<?php endforeach; ?>
									</select>
									<?php echo form_error('sc_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php if (isset($sc101->Grade)) echo $sc101->Grade; ?>">
									<?php echo form_error('sc_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php if (isset($sc101->Times_Taken)) echo $sc101->Times_Taken; ?>">
									<?php echo form_error('sc_times_taken'); ?>
								</td>
							</tr>
							<tr>
								<td>Systems Thinking</td>
								<td>
									<input class="form-control" type="text" name="systh_year" value="<?php if (isset($systh101->School_Year)) echo $systh101->School_Year; ?>">
									<?php echo form_error('st_year'); ?>
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_semester" value="<?php if (isset($systh101->Semester)) echo $systh101->Semester; ?>">
									<?php echo form_error('st_semester'); ?>
								</td>
								<td>
									<select class="form-control" name="bizcom_status">
									<?php foreach ($statuses as $status): ?>
										<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($systh101->Status_ID)) if ($status->Status_ID == $systh101->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
									<?php endforeach; ?>
									</select>
									<?php echo form_error('st_status'); ?>
								</td>
								<td>
									<input class="form-control" type="text" name="bizcom_grade" value="<?php if (isset($systh101->Grade)) echo $systh101->Grade; ?>">
									<?php echo form_error('st_grade'); ?>	
								</td>
								<td>
									<input class="form-control" type="number" name="bizcom_times_taken" value="<?php if (isset($systh101->Times_Taken)) echo $systh101->Times_Taken; ?>">
									<?php echo form_error('st_times_taken'); ?>
								</td>
							</tr>
						</table>
					</form>
					
					<legend>Internship</legend>

					<form class="form" role="form">
						<div class="form-group">
							<label>Status</label>
							<input class="form-control" type="text" name="intern_status" value="<?php if (isset($internship->Name)) echo $internship->Name; ?>">
							<?php echo form_error('intern_status'); ?>
						</div>	
						<div class="form-group">
							<label>Grades</label>
							<input class="form-control" type="text" name="intern_grades" value="<?php echo set_value('intern_grades'); ?>">
							<?php echo form_error('intern_grades'); ?>
						</div>
						<div class="form-group">
							<label>Remarks</label>
							<input class="form-control" type="text" name="intern_remarks" value="<?php if (isset($internship->Remarks)) echo $internship->Remarks; ?>">
							<?php echo form_error('intern_remarks'); ?>
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
							<input class="form-control" type="text" name="company_information" value="<?php if (isset($internship->Company_Information)) echo $internship->Company_Information; ?>">
							<?php echo form_error('company_information'); ?>
						</div>
						<div class="form-group">
							<label>Name of Company</label>
							<input class="form-control" type="text" name="company_name" value="<?php echo set_value('company_name'); ?>">
							<?php echo form_error('company_name'); ?>
						</div>		
						<div class="form-group">
							<label>Company Address</label>
							<input class="form-control" type="text" name="company_address" value="<?php if (isset($internship->Company_Address)) echo $internship->Company_Address; ?>">
							<?php echo form_error('company_address'); ?>
						</div>
						<div class="form-group">
							<label>Department / Divison</label>
							<input class="form-control" type="text" name="department" value="<?php if (isset($internship->Task)) echo $internship->Task; ?>">
							<?php echo form_error('department'); ?>
						</div>
						<div class="form-group">
							<label>Supervisor / Mentor</label>
							<input class="form-control" type="text" name="supervisor" value="<?php if (isset($internship->Supervisor_Name)) echo $internship->Supervisor_Name; ?>">
							<?php echo form_error('supervisor'); ?>
						</div>
						<div class="form-group">
							<label>Supervisor's Contact Details</label>
							<input class="form-control" type="text" name="supervisor_contact_details" value="<?php if (isset($internship->Supervisor_Contact)) echo $internship->Supervisor_Contact; ?>">
							<?php echo form_error('supervisor_contact_details'); ?>
						</div>
						<div class="form-group">
							<label>Supervisor's Email</label>
							<input class="form-control" type="text" name="supervisor_email" value="<?php echo set_value('supervisor_email'); ?>">
							<?php echo form_error('supervisor_email'); ?>
						</div>
						<div class="form-group">
							<label>Date Started</label>
							<input class="form-control" type="date" name="start_date" value="<?php if (isset($internship->Start_Date)) echo date('Y-m-d', strtotime($internship->Start_Date)); ?>">
							<?php echo form_error('start_date'); ?>
						</div>
						<div class="form-group">
							<label>Date Ended</label>
							<input class="form-control" type="date" name="end_date" value="<?php if (isset($internship->End_Date)) echo date('Y-m-d', strtotime($internship->End_Date)); ?>">
							<?php echo form_error('end_date'); ?>
						</div>
						<div class="form-group">
							<label>Total Internship Hours</label>
							<input class="form-control" type="number" name="total_internship_hours" value="<?php if (isset($internship->Total_Work_Hours)) echo $internship->Total_Work_Hours; ?>">
							<?php echo form_error('total_internship_hours'); ?>
						</div>
						<div class="form-group">
							<label>Evaluation Form</label><br />
							<input type="radio" name="evaluation_form" value="1" <?php if (isset($internship->Meet_Standards)) if ($internship->Meet_Standards == 1) { echo 'checked="checked"'; } ?>> Yes
							<input type="radio" name="evaluation_form" value="0" <?php if (isset($internship->Meet_Standards)) if ($internship->Meet_Standards == 0) { echo 'checked="checked"'; } ?>> No
							<?php echo form_error('evaluation_form'); ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
