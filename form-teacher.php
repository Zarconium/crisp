<?php include('header.php') ?>

<?php include('menu-save-draft.php'); ?>
<div class="info-form">
	
	<h1>
		Teacher Form
	</h1>
	
	<legend>Personal Information</legend>
			
	<form class="form-inline">
		<div class="form-group">
			<label>Name Suffix</label>
			<input class="form-control" type="text">
		</div>
		
		<div class="form-group">
			<label>Last Name</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group">
			<label>Middle Initial</label>
			<input class="form-control" type="text">
		</div>
	</form>
		
	<form class="form-inline" role="form">
			
		<div class="form-group">
			<label>Birth Day</label>
			<input type="date" class="form-control">
		</div>
		
		<div class="form-group">
			<label>Birth Place</label>
			<input class="form-control" type="text">
		
		</div>
	</form>

		
	<form class="form-inline">
				
		<div class="form-group">
			<label>Nationality</label>
			<select class="form-control">
				<option value="Filipino">Filipino</option>
				<option value="American">American</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Total Years of Teaching</label>
			<input class="form-control" type="number">
		</div>
	
	</form><form class="form-inline">
		<div class="form-group">
			<label>Civil Status</label><br/>
			<input type="radio" name="civil" value="married"> Married
			<input type="radio" name="civil" value="single"> Single
			<input type="radio" name="civil" value="separated"> Separated
		</div>		
	</form>
			
		
	<form class="form-inline">
		<div class="form-group">
			<label>Gender</label><br/>
			<input type="radio" name="gender" value="male"> Male
			<input type="radio" name="gender" value="female"> Female
		</div>
	</form>	
	
		
	<form class="form-inline">
	
		<div class="form-group">
			<label>Own a Desktop?</label><br/>
			<input type="radio" name="desktop" value="yes"> Yes
			<input type="radio" name="desktop" value="no"> No
		</div>

	</form>
		
	<form class="form-inline">
		<div class="form-group">
			<label>Own a Laptop?</label><br/>
			<input type="radio" name="laptop" value="yes"> Yes
			<input type="radio" name="laptop" value="no"> No
		</div>
	</form>
		
	<form class="form-inline">

		<div class="form-group">
			<label>Internet Access Outside School?</label><br/>
			<input type="radio" name="access" value="yes"> Yes
			<input type="radio" name="acess" value="no"> No
		</div>	
		
	</form>
	
	<legend>Current Address</legend>
		
	<form class="form-inline" role="form">
			
		<div class="form-group">
			<label>Street Number</label>
			<input type="text" class="form-control">
		</div>
			
		<div class="form-group">
			<label>Street Name</label>
			<input type="text" class="form-control">
		</div>
			
		<div class="form-group">
			<label>City</label>
			<input type="text" class="form-control">
		</div>
			
	</form>
	<form class="form-inline" role="form">
		<div class="form-group">
			<label>Province</label>
			<select class="form-control">
				<option value="Manila">Manila</option>
			</select>
		</div>
			
		<div class="form-group">
			<label>Region</label>
			<select class="form-control">
				<option value="NCR">NCR</option>
			</select>
		</div>
			
	</form>
	
	<legend>Alternate Address</legend>
		
	<form class="form-inline" role="form">
			
		<div class="form-group">
			<label>Street Number</label>
			<input type="text" class="form-control">
		</div>
			
		<div class="form-group">
			<label>Street Name</label>
			<input type="text" class="form-control">
		</div>
			
		<div class="form-group">
			<label>City</label>
			<input type="text" class="form-control">
		</div>
			
	</form>
	<form class="form-inline" role="form">
		<div class="form-group">
			<label>Province</label>
			<select class="form-control">
				<option value="Manila">Manila</option>
			</select>
		</div>
			
		<div class="form-group">
			<label>Region</label>
			<select class="form-control">
				<option value="NCR">NCR</option>
			</select>
		</div>
			
		</form>
				
	
	<legend>Contact Details</legend>
		
	<form class="form-inline">
		
		<div class="form-group">
			<label>Mobile Number</label>
			<input class="form-control" type="number">
		</div>
		
		<div class="form-group">
			<label>Landline</label>
			<input class="form-control" type="number">
		</div>
		
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email">
		</div>
		
		<div class="form-group">
			<label>Facebook</label>
			<input class="form-control" type="text">
		</div>
	
	</form>

	<legend>Academic Background</legend>
	
	<form class="form-inline">
	
		<div class="form-group subtitle">
			<label>College</label>
		</div>
		
		<div class="form-group">
			<label>AB / BS</label>
			<select class="form-control">
				<option value="BS">BS</option>
				<option value="AB">AB</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" placeholder="degree">
		</div>
		
		<div class="form-group">
			<label>School</label>
			<input class="form-control" type="text">
		</div>	
	</form>	
		
	<form class="form-inline">
	
		<div class="form-group subtitle">
			<label>Masters</label>
		</div>

		<div class="form-group">
			<label>AB / BS</label>
			<select class="form-control">
				<option value="BS">BS</option>
				<option value="AB">AB</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" placeholder="degree">
		</div>
		
		<div class="form-group">
			<label>School</label>
			<input class="form-control" type="text">
		</div>	
	</form>
		
	<form class="form-inline">
	
		<div class="form-group subtitle">
			<label>Post Graduate</label>
		</div>
		
		<div class="form-group">
			<label>AB / BS</label>
			<select class="form-control">
				<option value="BS">BS</option>
				<option value="AB">AB</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" placeholder="degree">
		</div>
		
		<div class="form-group">
			<label>School</label>
			<input class="form-control" type="text">
		</div>
		
	</form>
	
	<legend>Work Information</legend>
	
	<form class="form-inline">
	
		<div class="form-group">
			<label>Employment Status</label>
			<input class="form-control" type="text">
		</div>
	
		<div class="form-group">
			<label>Current Position</label>
			<input class="form-control" type="text">
		</div>
		
		<div class="form-group">
			<label>Current Department</label>
			<input class="form-control" type="text">
		</div>
		
	</form>
	
	<form class="form-inline">
			
		<div class="form-group">
			<label>Current Employer</label>
			<input class="form-control" type="text">
		</div>
		
		<div class="form-group">
			<label>Employer Address</label>
			<input class="form-control" type="text">
		</div>
		
	</form>
	
	<form class="form-inline">
		
		<div class="form-group">
			<label>Name of Supervisor</label>
			<input class="form-control" type="text">
		</div>
		
		<div class="form-group">
			<label>Position of Supervisor</label>
			<input class="form-control" type="text">
		</div>
		
		<div class="form-group">
			<label>Supervisor Contact Details</label>
			<input class="form-control" type="text">
		</div>
	
		
	</form>
	
	<form class="form-inline">
		
		<div class="form-group">
			<label>Other Positions Held</label>
			<input class="form-control" type="text">
		</div>
		
		<div class="form-group">
			<label>Classes Handling</label>
			<input class="form-control" type="text">
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
					<input class="form-control" type="text">
				</div>
				<div class="form-group">
					<label>Year</label>
					<input class="form-control" type="number">
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
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Date</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Level Taught	</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Courses Taught</label><span class="help-block">separated by a comma</span>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Number of Years in the Institution</label>
						<input class="form-control" type="number">
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
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Certifying Body</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Date Received</label>
						<input class="form-control" type="date">
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
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Awarding Body</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Date Received</label>
						<input class="form-control" type="date">
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
					<div class="form-group">
						<label>Organization</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Date</label>
						<input class="form-control" type="date">
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
		<input class="form-control" type="text"></div>
		
		<div class="form-group"><label>Computer Applications Familiar With</label><span class="help-block">separated by a comma</span>
		<input class="form-control" type="text"></div>
		
		<div class="form-group"><label>Others</label><span class="help-block">separated by a comma</span>
		<input class="form-control" type="text"></div>
	
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
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Company</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="number">
					</div>
					<div class="form-group">
						<label>E-mail Address</label>
						<input class="form-control" type="email">
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
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Organization Description</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Position</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Years of Affiliation</label>
						<input class="form-control" type="number">
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
		</div>
		
		<div class="form-group">
			<label>Photo</label><br/>
			<input type="radio" name="photo" value="yes"> Yes
			<input type="radio" name="photo" value="no"> No
		</div>
		
		<div class="form-group">
			<label>Proof of Certification</label><br/>
			<input type="radio" name="proof" value="yes"> Yes
			<input type="radio" name="proof" value="no"> No
		</div>
		
		<div class="form-group">
			<label>Diploma / TOR</label><br/>
			<input type="radio" name="diploma" value="yes"> Yes
			<input type="radio" name="diploma" value="no"> No
		</div>
	
	</form>
	
	<form class="form">
		<legend>Application</legend>
		<div class="form-group">
			<label>Applying for which programs?</label><br/>
			<input type="checkbox" name="applying" value="addBEST"> BEST<br/>
			<input type="checkbox" name="applying" value="addADEPT"> ADEPT<br/>
			<input type="checkbox" name="applying" value="addSMP"> SMP<br/>
		</div>
	
	</form>
</div>	

<?php include('footer.php'); ?>