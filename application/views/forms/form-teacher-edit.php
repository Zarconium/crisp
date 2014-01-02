<?php include('header.php') ?>
<?php include('menu-save-draft.php'); ?>

<div class="info-form">
	
	<h1>
		Teacher Form
	</h1>
	
	
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#basic" data-toggle="tab">Basic Information</a></li>
	  <li><a href="#attendance" data-toggle="tab">Attendance</a></li>
	  <li><a href="#stipend" data-toggle="tab">Stipend</a></li>
	</ul>
	
	
	<div class="tab-content">
	  <div class="tab-pane active" id="basic">
		<legend>Personal Information</legend>
				
		<form class="form-inline">
			<div class="form-group">
				<label>Name Suffix</label>
				<input class="form-control" type="text" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
				<?php echo form_error('name_suffix', '<div class="text-danger">', '</div>'); ?>
			</div>
			
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
		</form>
			
		<form class="form-inline" role="form">
				
			<div class="form-group">
			<label>Birth Day</label>
			<input type="date" class="form-control" name="birthdate" value="<?php echo set_value('birthdate'); ?>">
				<?php echo form_error('birthdate', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Birth Place</label>
			<input class="form-control" type="text" name="birthplace" value="<?php echo set_value('birthplace'); ?>">
				<?php echo form_error('birthplace', '<div class="text-danger">', '</div>'); ?>
		
		</div>
		</form>

			
		<form class="form-inline">
					
			<div class="form-group">
			<label>Nationality</label>
			<select class="form-control" name = "nationality">
				<option value="Filipino">Filipino</option>
				<option value="American">American</option>
			</select>
				<?php echo form_error('nationality', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Total Years of Teaching</label>
			<input class="form-control" type="number" name="total_year_teaching" value="<?php echo set_value('total_year_teaching'); ?>">
				<?php echo form_error('total_year_teaching', '<div class="text-danger">', '</div>'); ?>
		</div>
	
	</form>
	<div class="form-inline">
		<div class="form-group">
			<label>Civil Status</label><br/>
			<input type="radio" name="civil" value="married"> Married
			<input type="radio" name="civil" value="single"> Single
			<input type="radio" name="civil" value="separated"> Separated
				<?php echo form_error('civil', '<div class="text-danger">', '</div>'); ?>
		</div>		
	</div>
	<div class="form-inline">
		<div class="form-group">
			<label>Gender</label><br/>
			<input type="radio" name="gender" value="male"> Male
			<input type="radio" name="gender" value="female"> Female
				<?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>
		</div>
	</div>	
		</form>	
		
			
		<form class="form-inline">
		
			<div class="form-group">
			<label>Own a Desktop?</label><br/>
			<input type="radio" name="desktop" value="yes"> Yes
			<input type="radio" name="desktop" value="no"> No
				<?php echo form_error('desktop', '<div class="text-danger">', '</div>'); ?>
		</div>

	</div>
		
	<div class="form-inline">
		<div class="form-group">
			<label>Own a Laptop?</label><br/>
			<input type="radio" name="laptop" value="yes"> Yes
			<input type="radio" name="laptop" value="no"> No
				<?php echo form_error('laptop', '<div class="text-danger">', '</div>'); ?>
		</div>
	</div>
		
	<div class="form-inline">

		<div class="form-group">
			<label>Internet Access Outside School?</label><br/>
			<input type="radio" name="access" value="yes"> Yes
			<input type="radio" name="access" value="no"> No
				<?php echo form_error('access', '<div class="text-danger">', '</div>'); ?>
		</div>	
			
		</form>
		
		<legend>Current Address</legend>
			
		<form class="form-inline" role="form">
				
			<div class="form-group">
			<label>Street Number</label>
			<input type="text" class="form-control" name="street_number" value="<?php echo set_value('street_number'); ?>">
				<?php echo form_error('street_number', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		<div class="form-group">
			<label>Street Name</label>
			<input type="text" class="form-control" name="street_name" value="<?php echo set_value('street_name'); ?>">
				<?php echo form_error('street_name', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		<div class="form-group">
			<label>City</label>
			<input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">
				<?php echo form_error('city', '<div class="text-danger">', '</div>'); ?>
		</div>
				
		</form>
		<form class="form-inline" role="form">
			<div class="form-group">
			<label>Province</label>
			<select class="form-control" name="province">
				<option value="Manila">Manila</option>
			</select>
				<?php echo form_error('province', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		<div class="form-group">
			<label>Region</label>
			<select class="form-control" name = "region">
				<option value="NCR">NCR</option>
			</select>
				<?php echo form_error('region', '<div class="text-danger">', '</div>'); ?>
		</div>
				
		</form>
		
		<legend>Alternate Address</legend>
			
		<form class="form-inline" role="form">
				
			<div class="form-group">
			<label>Street Number</label>
			<input type="text" class="form-control" name="streetnumber" value="<?php echo set_value('streetnumber'); ?>">
				<?php echo form_error('streetnumber', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		<div class="form-group">
			<label>Street Name</label>
			<input type="text" class="form-control" name="streetname" value="<?php echo set_value('streetname'); ?>">
				<?php echo form_error('streetname', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		<div class="form-group">
			<label>City</label>
			<input type="text" class="form-control" name="alt_city" value="<?php echo set_value('alt_city'); ?>">
				<?php echo form_error('alt_city', '<div class="text-danger">', '</div>'); ?>
		</div>
				
		</form>
		<form class="form-inline" role="form">
			<div class="form-group">
			<label>Province</label>
			<select class="form-control" name= "alt_province">
				<option value="Manila">Manila</option>
			</select>
				<?php echo form_error('alt_province', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		<div class="form-group">
			<label>Region</label>
			<select class="form-control" name ="alt_region">
				<option value="NCR">NCR</option>
			</select>
				<?php echo form_error('alt_region', '<div class="text-danger">', '</div>'); ?>
		</div>
				
			</form>
					
		
		<legend>Contact Details</legend>
			
		<form class="form-inline">
			
			<div class="form-group">
			<label>Mobile Number</label>
			<input class="form-control" type="number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>">
				<?php echo form_error('mobile_number', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Landline</label>
			<input class="form-control" type="number" name="landline" value="<?php echo set_value('landline'); ?>">
				<?php echo form_error('landline', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>">
				<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Facebook</label>
			<input class="form-control" type="text" name="facebook" value="<?php echo set_value('facebook'); ?>">
				<?php echo form_error('facebook', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		</form>

		<legend>Academic Background</legend>
		
		<form class="form-inline">
		
			<div class="form-group subtitle">
				<label>College</label>
			</div>
			
			<div class="form-group">
			<label>AB / BS</label>
			<select class="form-control" name="type">
				<option value="BS">BS</option>
				<option value="AB">AB</option>
			</select>
				<?php echo form_error('degree', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" placeholder="degree" name="degree" value="<?php echo set_value('degree'); ?>">
				<?php echo form_error('degree', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>School</label>
			<input class="form-control" type="text" name="school" value="<?php echo set_value('school'); ?>">
				<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>
		</div>	
		</form>	
			
		<form class="form-inline">
		
			<div class="form-group subtitle">
				<label>Masters</label>
			</div>

			<div class="form-group">
			<label>MS / MA</label>
			<select class="form-control" name="master_type">
				<option value="BS">MS</option>
				<option value="AB">MA</option>
			</select>
				<?php echo form_error('master_type', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" placeholder="degree" name="master_degree" value="<?php echo set_value('master_degree'); ?>">
				<?php echo form_error('master_degree', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>School</label>
			<input class="form-control" type="text" name="master_school" value="<?php echo set_value('master_school'); ?>">
				<?php echo form_error('master_school', '<div class="text-danger">', '</div>'); ?>
		</div>	
		</form>
			
		<form class="form-inline">
		
			<div class="form-group subtitle">
				<label>Post Graduate</label>
			</div>
			
			<div class="form-group" name="post_type">
			<label> Doctor </label>
			<select class="form-control">
				<option value="BS">PhD</option>
				<option value="AB">Doctor of</option>
			</select>
			<?php echo form_error('post_type', '<div class="text-danger">', '</div>'); ?>
		</div>
				
		
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" placeholder="degree" name="post_degree" value="<?php echo set_value('post_degree'); ?>">
				<?php echo form_error('post_degree', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>School</label>
			<input class="form-control" type="text" name="post_school" value="<?php echo set_value('post_school'); ?>">
				<?php echo form_error('post_school', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		</form>
		
		<legend>Work Information</legend>
		
		<form class="form-inline">
		
			<div class="form-group" name="employment_status">
			<label>Employment Status</label>
			<select class="form-control">
				<option value="BS">Part</option>
				<option value="AB">Full</option>
			</select>
			<?php echo form_error('employment_status', '<div class="text-danger">', '</div>'); ?>
		</div>
	
		<div class="form-group">
			<label>Current Position</label>
			<input class="form-control" type="text" name="current_position" value="<?php echo set_value('current_position'); ?>">
				<?php echo form_error('current_position', '<div class="text-danger">', '</div>'); ?> 
		</div>
		
		<div class="form-group">
			<label>Current Department</label>
			<input class="form-control" type="text" name="current_department" value="<?php echo set_value('current_department'); ?>">
				<?php echo form_error('current_department', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		</form>
		
		<form class="form-inline">
				
			<div class="form-group">
			<label>Current Employer</label>
			<input class="form-control" type="text"  name="current_employer" value="<?php echo set_value('current_employer'); ?>">
				<?php echo form_error('current_employer', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Employer Address</label>
			<input class="form-control" type="text"  name="employer_address" value="<?php echo set_value('employer_address'); ?>">
				<?php echo form_error('employer_address', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		</form>
		
		<form class="form-inline">
			
			<div class="form-group">
			<label>Name of Supervisor</label>
			<input class="form-control" type="text"  name="name_of_supervisor" value="<?php echo set_value('name_of_supervisor'); ?>">
				<?php echo form_error('current_department', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Supervisor Contact Details</label>
			<input class="form-control" type="text"  name="supervisor_contact_details" value="<?php echo set_value('supervisor_contact_details'); ?>">
				<?php echo form_error('supervisor_contact_details', '<div class="text-danger">', '</div>'); ?>
		</div>
		
			
		</form>
		
		<form class="form-inline">
			
			<div class="form-group">
			<label>Other Positions Held</label>
			<input class="form-control" type="text"  name="other_positions_held" value="<?php echo set_value('other_positions_held'); ?>">
				<?php echo form_error('other_positions_held', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Classes Handling</label>
			<input class="form-control" type="text"  name="classes_handling" value="<?php echo set_value('classes_handling'); ?>">
				<?php echo form_error('classes_handling', '<div class="text-danger">', '</div>'); ?>
		</div>
			
		</form>

		<legend>Subjects Taught from 2011 to Present</legend>
		
		<div class="col-md-3">
			<div class="panel panel-info">
			<div class="panel-heading">
				Add to List
			</div>
			<div class="panel-body">
				<form class="form">		
					<div class="form-group">
						<label>Subject</label>
					<input class="form-control" type="text"  name="subject" value="<?php echo set_value('subject'); ?>">
				<?php echo form_error('subject', '<div class="text-danger">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label>Year</label>
					<input class="form-control" type="number"  name="year" value="<?php echo set_value('year'); ?>">
				<?php echo form_error('year', '<div class="text-danger">', '</div>'); ?>
				</div>
					<div class="submit-button">
						<button class="btn btn-primary" name="submit">Add to List</button>
					</div>
				</form>
						
			</div>
		</div>
		</div>
		
		<div class="col-md-9">
			<h3>List of Subjects</h3>
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table table-area">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Subject</th>
					<th>Year</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>English</td>
					<td>2010</td>
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
					<form class="form">
						<div class="form-group">
						<label>Institution</label>
						<input class="form-control" type="text"  name="institution" value="<?php echo set_value('institution'); ?>">
				<?php echo form_error('institution', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text"  name="position" value="<?php echo set_value('position'); ?>">
				<?php echo form_error('position', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Date</label>
						<input class="form-control" type="text"  name="date" value="<?php echo set_value('date'); ?>">
				<?php echo form_error('date', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Level Taught	</label>
						<input class="form-control" type="text"  name="level_taught" value="<?php echo set_value('level_taught'); ?>">
				<?php echo form_error('level_taught', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Courses Taught</label><span class="help-block">separated by a comma</span>
						<input class="form-control" type="text"  name="course_taught" value="<?php echo set_value('course_taught'); ?>">
				<?php echo form_error('course_taught', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Number of Years in the Institution</label>
						<input class="form-control" type="number"  name="number_of_years_in_institution" value="<?php echo set_value('number_of_years_in_institution'); ?>">
				<?php echo form_error('number_of_years_in_institution', '<div class="text-danger">', '</div>'); ?>  
					</div>
					
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
		
			
		
		<div class="col-md-9">
			<h3>List of Institutions</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Institution</th>
					<th>Position</th>
					<th>Date</th>
					<th>Level Taught</th>
					<th>Courses Taught</th>
					<th>Number of Years</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Example</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
					<td>2011</td>
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
					<form class="form">
						<div class="form-group">
						<label>Certifications</label>
						<input class="form-control" type="text" name="certification" value="<?php echo set_value('certification'); ?>">
				<?php echo form_error('certification', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Certifying Body</label>
						<input class="form-control" type="text"  name="certifying_body" value="<?php echo set_value('certifying_body'); ?>">
				<?php echo form_error('certifying_body', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Date Received</label>
						<input class="form-control" type="date" name="date_received" value="<?php echo set_value('date_received'); ?>">
				<?php echo form_error('date_received', '<div class="text-danger">', '</div>'); ?>
					</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</form>	
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
					<form class="form">
						<div class="form-group">
						<label>Award</label>
						<input class="form-control" type="text" name="award" value="<?php echo set_value('award'); ?>">
				<?php echo form_error('award', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Awarding Body</label>
						<input class="form-control" type="text"  name="awarding_body" value="<?php echo set_value('awarding_body'); ?>">
				<?php echo form_error('awarding_body', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Date Received</label>
						<input class="form-control" type="date"  name="date_received" value="<?php echo set_value('date_received'); ?>">
				<?php echo form_error('date_received', '<div class="text-danger">', '</div>'); ?>
					</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</form>	
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
						<label>Organization</label>
						<input class="form-control" type="text" name="organization" value="<?php echo set_value('other_work_organization'); ?>">
				<?php echo form_error('organization', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text"  name="other_work_position" value="<?php echo set_value('other_work_position'); ?>">
				<?php echo form_error('other_work_position', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Description</label>
						<input class="form-control" type="text"  name="description" value="<?php echo set_value('description'); ?>">
				<?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Date</label>
						<input class="form-control" type="date"  name="other_work_date" value="<?php echo set_value('other_work_date'); ?>">
				<?php echo form_error('other_work_date', '<div class="text-danger">', '</div>'); ?>
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
			
		
		<form class="form">
			<div class="form-group"><label>Computer Applications Proficiency</label><span class="help-block">separated by a comma</span>
		<input class="form-control" type="text"  name="computer_proficient_skill" value="<?php echo set_value('computer_proficient_skill'); ?>">
				<?php echo form_error('computer_proficient_skill', '<div class="text-danger">', '</div>'); ?>
			</div>
		
		<div class="form-group"><label>Computer Applications Familiar With</label><span class="help-block">separated by a comma</span>
		<input class="form-control" type="text"  name="computer_familiar_skill" value="<?php echo set_value('computer_familiar_skill'); ?>">
				<?php echo form_error('computer_familiar_skill', '<div class="text-danger">', '</div>'); ?>
			</div>
		
		<div class="form-group"><label>Others</label><span class="help-block">separated by a comma</span>
		<input class="form-control" type="text"  name="skill" value="<?php echo set_value('skill'); ?>">
				<?php echo form_error('skill', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		</form>
		
		
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
				<?php echo form_error('reference_name', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text"  name="reference_position" value="<?php echo set_value('reference_position'); ?>">
				<?php echo form_error('reference_position', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Company</label>
						<input class="form-control" type="text"  name="company" value="<?php echo set_value('company'); ?>">
				<?php echo form_error('company', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="number"  name="phone" value="<?php echo set_value('phone'); ?>">
				<?php echo form_error('phone', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>E-mail Address</label>
						<input class="form-control" type="email"  name="reference_email" value="<?php echo set_value('reference_email'); ?>">
				<?php echo form_error('reference_email', '<div class="text-danger">', '</div>'); ?>
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
					<form class="form">
						<div class="form-group">
						<label>Organization</label>
						<input class="form-control" type="text"  name="affiliation_organization" value="<?php echo set_value('affiliation_organization'); ?>">
				<?php echo form_error('affiliation_organization', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Organization Description</label>
						<input class="form-control" type="text"  name="organization_description" value="<?php echo set_value('organization_description'); ?>">
				<?php echo form_error('organization_description', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text"  name="affiliation_position" value="<?php echo set_value('affiliation_position'); ?>">
				<?php echo form_error('affiliation_position', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Years of Affiliation</label>
						<input class="form-control" type="number"  name="years_of_affiliation" value="<?php echo set_value('years_of_affiliation'); ?>">
				<?php echo form_error('years_of_affiliation', '<div class="text-danger">', '</div>'); ?>
					</div>
						
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					</form>	
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
		<form class="form">
			<div class="form-group">
			<label>Resume</label><br/>
			<input type="radio" name="resume" value="yes"> Yes
			<input type="radio" name="resume" value="no"> No
				<?php echo form_error('resume', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Photo</label><br/>
			<input type="radio" name="photo" value="yes"> Yes
			<input type="radio" name="photo" value="no"> No
				<?php echo form_error('photo', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Proof of Certification</label><br/>
			<input type="radio" name="proof" value="yes"> Yes
			<input type="radio" name="proof" value="no"> No
				<?php echo form_error('proof', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<label>Diploma / TOR</label><br/>
			<input type="radio" name="diploma" value="yes"> Yes
			<input type="radio" name="diploma" value="no"> No
				<?php echo form_error('diploma', '<div class="text-danger">', '</div>'); ?>
		</div>
		
		</form>
		
		<form class="form">
			<legend>Application</legend>
			<div class="form-group">
				<label>Applying for which programs?</label><br/>
				<input type="checkbox" name="applying" value="addBEST"> BEST<br/>
				<input type="checkbox" name="applying" value="addADEPT"> ADEPT<br/>
				<input type="checkbox" name="applying" value="addSMP"> SMP<br/>
			<?php echo form_error('applying', '<div class="text-danger">', '</div>'); ?>
			</div>
		
		</form>
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
				<form class="form">
					
					<div class="form-group"><label>Orientation Date </label>
					<input type="date" class="form-control"  name="orientation_date" value="<?php echo set_value('orientation_date'); ?>">
				<?php echo form_error('orientation_date', '<div class="text-danger">', '</div>'); ?>
				</div>
					
					<div class="form-group"><label>Site Visit</label>
					<input type="date" class="form-control"  name="site_visit" value="<?php echo set_value('site_visit'); ?>">
				<?php echo form_error('site_visit', '<div class="text-danger">', '</div>'); ?>
				</div>
					
					<div class="form-group"><label>GCAT</label>
					<input type="date" class="form-control"  name="gcat" value="<?php echo set_value('gcat'); ?>">
				<?php echo form_error('gcat', '<div class="text-danger">', '</div>'); ?>
				</div>
				
				</form>
				</div>
				
				<div class="col-md-6">
				<form class="form">

					
					<div class="form-group"><label>Day 1</label>
					<input type="date" class="form-control"  name="day_1" value="<?php echo set_value('day_1'); ?>">
				<?php echo form_error('day_1', '<div class="text-danger">', '</div>'); ?>
				</div>
					
					<div class="form-group"><label>Day 2</label>
					<input type="date" class="form-control"  name="day_2" value="<?php echo set_value('day_2'); ?>">
				<?php echo form_error('day_2', '<div class="text-danger">', '</div>'); ?>
				</div>
					
					<div class="form-group"><label>Day 3</label><span class="help-block">If with the faculty</span>
					<input type="date" class="form-control"  name="day_3" value="<?php echo set_value('day_3'); ?>">
				<?php echo form_error('day_3', '<div class="text-danger">', '</div>'); ?>
				</div>
					
				</form>	
				</div>
				</div>
				

				<div class="col-md-12">
				<form class="form">
					<div class="form-group"><label>Total Days Attended </label>
					<input type="text" class="form-control"  name="total_days_attended" value="<?php echo set_value('total_days_attended'); ?>">
				<?php echo form_error('total_days_attended', '<div class="text-danger">', '</div>'); ?>
				</div>
				</form>
				</div>
				
				
			  </div>
			  <div class="tab-pane" id="adept">
				<div class="row">
				<div class="col-md-6">
				<form class="form">
					
					<div class="form-group"><label>Orientation Date </label>
					<input type="date" class="form-control"  name="adept_orientation_date" value="<?php echo set_value('adept_orientation_date'); ?>">
				<?php echo form_error('adept_orientation_date', '<div class="text-danger">', '</div>'); ?>
			</div>
					
					<div class="form-group"><label>Site Visit</label>
					<input type="date" class="form-control"  name="adept_site_visit" value="<?php echo set_value('adept_site_visit'); ?>">
				<?php echo form_error('adept_site_visit', '<div class="text-danger">', '</div>'); ?>
			</div>
					
					<div class="form-group"><label>GCAT</label>
					<input type="date" class="form-control"  name="adept_gcat" value="<?php echo set_value('adept_gcat'); ?>">
				<?php echo form_error('adept_gcat', '<div class="text-danger">', '</div>'); ?>
			</div>
					
					<div class="form-group"><label>Day 1</label>
					<input type="date" class="form-control"  name="adept_day_1" value="<?php echo set_value('adept_day_1'); ?>">
				<?php echo form_error('adept_day_1', '<div class="text-danger">', '</div>'); ?>
			</div>
					
					<div class="form-group"><label>Day 2</label>
					<input type="date" class="form-control"  name="adept_day_2" value="<?php echo set_value('adept_day_2'); ?>">
				<?php echo form_error('adept_day_2', '<div class="text-danger">', '</div>'); ?>
			</div>
					
				</form>
				</div>
				
				<div class="col-md-6">
				<form class="form">
					
					<div class="form-group"><label>Day 3</label><span class="help-block">If with the faculty</span>
					<input type="date" class="form-control"  name="adept_day_3" value="<?php echo set_value('adept_day_3'); ?>">
				<?php echo form_error('adept_day_3', '<div class="text-danger">', '</div>'); ?></div>
					
					<div class="form-group"><label>Day 4 </label>
					<input type="date" class="form-control"  name="adept_day_4" value="<?php echo set_value('adept_day_4'); ?>">
				<?php echo form_error('adept_day_4', '<div class="text-danger">', '</div>'); ?></div>
					
					<div class="form-group"><label>Day 5 </label>
					<input type="date" class="form-control"  name="adept_day_5" value="<?php echo set_value('adept_day_5'); ?>">
				<?php echo form_error('adept_day_5', '<div class="text-danger">', '</div>'); ?></div>
					
					<div class="form-group"><label>Day 6 </label>
					<input type="date" class="form-control"  name="adept_day_6" value="<?php echo set_value('adept_day_6'); ?>">
				<?php echo form_error('adept_day_6', '<div class="text-danger">', '</div>'); ?></div>
				
				</form>
				</div>
				</div>

			
				<div class="col-md-12">
				<form class="form">
					<div class="form-group"><label>Total Days Attended </label>
					<input type="text" class="form-control"  name="adept_total_days_attended" value="<?php echo set_value('adept_total_days_attended'); ?>">
				<?php echo form_error('adept_total_days_attended', '<div class="text-danger">', '</div>'); ?></div>
				</form>
				</div>
			
			  </div>
			  
			  
			  <div class="tab-pane" id="smp">
			  	<legend>Checked By</legend>

				<form class="form">
					<div class="form-group"><label>Event</label>
					<input type="text" class="form-control" placeholder="SMP Language Track BEST / ADEPT / GCAT"  name="smp_event" value="<?php echo set_value('smp_event'); ?>">
				<?php echo form_error('smp_event', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group"><label>Name</label>
					<input type="text" class="form-control" placeholder="Chec Kerr"  name="smp_name" value="<?php echo set_value('smp_name'); ?>">
				<?php echo form_error('smp_name', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group"><label>Date</label>
					<input type="text" class="form-control" placeholder="11/10/2013"  name="smp_date" value="<?php echo set_value('smp_date'); ?>">
				<?php echo form_error('smp_date', '<div class="text-danger">', '</div>'); ?>
					</div>
				</form>
				
			  	<legend>Attendance	</legend>
				<form class="form">
				<span class="help-block">Please check all that applies.</span>
					<div class="form-group">
						<input type="checkbox" name="time_in" value="yes">
						<label> Time In </label>
				<?php echo form_error('time_in', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<input type="checkbox" name="am_snack" value="yes">
						<?php echo form_error('am_snack', '<div class="text-danger">', '</div>'); ?>
						<label> AM Snack </label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="lunch" value="yes">
						<?php echo form_error('lunch', '<div class="text-danger">', '</div>'); ?>
						<label> Lunch </label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="pm_snack" value="yes">
						<?php echo form_error('pm_snack', '<div class="text-danger">', '</div>'); ?>
						<label> PM Snack </label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="time_out" value="yes">
						<?php echo form_error('time_out', '<div class="text-danger">', '</div>'); ?>
						<label> Time Out </label>
					</div>
				</form>
			  </div>
			  
			</div>
			
	  </div>
	  
	  
		<div class="tab-pane" id="stipend">
			
			<div class="col-md-3">
			<div class="panel panel-info">
			<div class="panel-heading">Add or Edit Stipend</div>
			<div class="panel-body">
				<form class="form">
					<div class="form-group"><label>From</label>
					<input class="form-control"  type="text" placeholder="11/10/2013" name="stipend_from" value="<?php echo set_value('stipend_from'); ?>">
				<?php echo form_error('stipend_from', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group"><label>Subject</label>
					<input class="form-control"  type="text" placeholder="11/10/2013" name="stipend_subject" value="<?php echo set_value('stipend_subject'); ?>">
				<?php echo form_error('stipend_subject', '<div class="text-danger">', '</div>'); ?>
					</div>
					<legend>Stipend</legend>
					<div class="form-group"><label>Amount</label>
					<input class="form-control"  type="text" placeholder="100.00" name="stipend_amount" value="<?php echo set_value('stipend_amount'); ?>">
				<?php echo form_error('stipend_amount', '<div class="text-danger">', '</div>'); ?>
					</div><br/>
					<div class="form-group"><label>Claimed</label><br />
						<input type="radio" name="stipend_claimed" value="yes"> Yes
						<input type="radio" name="stipend_claimed" value="yes"> No
				<?php echo form_error('stipend_claimed', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="submit-button">
						<button class="btn btn-primary">Add to List</button>
					</div>
				</form>
			</div>	
			</div>
			</div>
		
			<div class="col-md-9">
				<h3>List of Stipend</h3>
				<div class="customize-btn-group">
					<button type="button" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-success">Refresh</button>
				</div>
				<table class="table table-area">
					<tr>
						<th></th>
						<th>Action</th>
						<th>From</th>
						<th>Subject</th>
						<th>Amount</th>
						<th>Claimed</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
						<td>Federico, Joy</td>
						<td>BPO101</td>
						<td>100</td>
						<td>Yes</td>
					</tr>
				</table>
			</div>
		</div>	

			</div>
	  
	</div>
</div>	

<?php include('footer.php'); ?>