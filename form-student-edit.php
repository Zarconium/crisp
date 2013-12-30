<?php include('header.php') ?>
<?php include('menu-save-draft.php') ?>

<div class="info-form">
	<h1>
		Student Information
	</h1>
	
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
							<input type="text" class="form-control">
						</div>
						
					</form>
					<form class="form-inline" role="form">
						<div class="form-group">		
							<label>Name Suffix</label>			
							<input class="form-control" type="text">
						</div>
						
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control">
						</div>
						
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control">
						</div>
						
						<div class="form-group">
							<label>Middle Initial</label>
							<input type="text" class="form-control">
						</div>
					</form>
					
					<form class="form-inline" role="form">
							
						<div class="form-group">
							<label>Are you a new applicant?</label><br/>
							<input type="radio" name="applicant" value="yes"> Yes
							<input type="radio" name="applicant" value="no"> No
						</div>
					</form>
					<form class="form-inline" role="form">
							
						<div class="form-group">
							<label>If no, do you want to update your information (Do we even need this here)</label><br/>
							<input type="radio" name="update" value="yes"> Yes
							<input type="radio" name="update" value="no" > No
						</div>
						
					</form>
						
					<form class="form-inline" role="form">
						<div class="form-group">
							<label>Civil Status</label><br/>
							<input type="radio" name="civil" value="married"> Married
							<input type="radio" name="civil" value="single"> Single
							<input type="radio" name="civil" value="separated"> Separated
						</div>
					</form>
					
					<form class="form-inline" role="form">
							
						<div class="form-group">
							<label>Birth Day</label>
							<input type="date" class="form-control">
						</div>
					</form>
					
					
					<form class="form-inline role="form">
						
						<div class="form-group">
							<label>Nationality</label>
							<select class="form-control">
								<option value="Filipino">Filipino</option>
								<option value="American">American</option>
							</select>
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
							
							<div class="form-group"><label>Street Name</label>
							<input type="text" class="form-control">
						</div>
							
							<div class="form-group"><label>City</label>
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
						
					<form class="form-inline" role="form">
							
							<div class="form-group"><label>Mobile</label>
							<input type="text" class="form-control">
						</div>
							
							<div class="form-group"><label>Landline</label>
							<input type="text" class="form-control">
						</div>
							
							<div class="form-group"><label>Email</label>
							<input type="text" class="form-control">
						</div>
							
							<div class="form-group"><label>Facebook</label>
							<input type="text" class="form-control">
						</div>
							
					</form>
					<legend>Academic Background</legend>
						
					<form class="form-inline" role="form">
						
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
							<label>Year</label>
							<input class="form-control" type="text">
						</div>	
					</form>
							
					<form class="form-inline" role="form">		
						<div class="form-group">
							<label>School</label>
							<input type="text" class="form-control">
						</div>
							
						<div class="form-group">
							<label>Branch</label>
							<input type="text" class="form-control">
						</div>
							
						<div class="form-group">
							<label>Expected Year of Graduation</label>
							<input type="text" class="form-control">
						</div>
					</form>
							
					<form class="form-inline" role="form">	
						<div class="form-group">
							<label>Are you a DOST Scholar?</label><br />
							<input type="radio" name="DOSTscholar" value="yes"> Yes
							<input type="radio" name="DOSTscholar" value="No"> No
						</div>
							
						
					</form>
					
					<form class="form-inline" role="form">	
						<div class="form-group">
							<label>If not, are you a recipient of any scholarship? Specify if yes.</label><br />
							<input type="radio" name="scholar" value="yes"> Yes
							<input type="radio" name="scholar" value="No"> No
						</div>
						<br/>
						<div class="form-group">
							<label>Scholarship</label>
							<input type="text" class="form-control">
						</div>
					</form>
					
					<form class="form-inline" role="form">	
						<div class="form-group">
							<label>What BPAP-CHED intervention program has been taken previously?</label><br/>
							<input type="checkbox" name="program" value="best"> AdEPT<br/>
							<input type="checkbox" name="program" value="adept"> BEST<br/>
							<input type="checkbox" name="program" value="smp"> SMP<br/>
							<input type="checkbox" name="program" value="gcat"> GCAT<br/>
						</div>
					</form>
					<form class="form-inline" role="form">	
							
						<div class="form-group">
							<label>Are you willing to work for the IT-BPO sector</label><br/>
							<input type="radio" name="work" value="yes"> Yes
							<input type="radio" name="work" value="No"> No		
						</div>	
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
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Subject</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Proctor</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Semester</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Year</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Session ID</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Test Date</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Status</label>			
							<input class="form-control" type="text">
						</div>			
					</form>
				</div>
				<div class="tab-pane" id="best">
				
					<form class="form" role="form">	
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Date</label>			
							<input class="form-control" type="date">
						</div>			
						<div class="form-group">		
							<label>Control Number</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Username</label>			
							<input class="form-control" type="text">
						</div>			
					</form>
				</div>
				<div class="tab-pane" id="adept">
				
					<form class="form" role="form">	
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text">
						</div>			
						<div class="form-group">		
							<label>Date</label>			
							<input class="form-control" type="date">
						</div>		
						<div class="form-group">		
							<label>Control Number</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Username</label>			
							<input class="form-control" type="text">
						</div>			
					</form>
					
				</div>
				
				<div class="tab-pane" id="smp">
				
					<legend>General Information</legend>
					
					<form class="form" role="form">
						<div class="form-group">						
							<label>Taking SMP as</label>
							<select class="form-control">
								<option>Option1</option>
								<option>Option2</option>
								<option>Option3</option>
							</select>
						</div>
					
					</form>
					
					<legend>Business Communication</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number">
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text">			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number">
						</div>
					
					</form>
					
					<legend>BPO101</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number">
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text">			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number">
						</div>
					
					</form>
					
					<legend>BPO102</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number">
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text">			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number">
						</div>
					
					</form>
					
					<legend>Service Culture</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number">
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text">			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number">
						</div>
					
					</form>
					
					<legend>Systems Thinking</legend>
					<form class="form" role="form">

						<div class="form-group">	
						<label>Year Taken</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Semester</label>
							<input class="form-control" type="number">
						</div>
						
						<div class="form-group">							
						<label>Status</label>
						<select class="form-control">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						</div>
						
						<div class="form-group">	
						<label>Grade Received</label>
							<input class="form-control" type="text">			
						</div>
						
						<div class="form-group">	
						<label>No. of Times Taken</label>
							<input class="form-control" type="number">
						</div>
					
					</form>
					
					<legend>Internship</legend>
					<form class="form" role="form">
					
						<div class="form-group">		
							<label>Status</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Grades</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Remarks</label>			
							<input class="form-control" type="text">
						</div>	
						
						<div class="form-group">		
							<label>School</label>			
							<input class="form-control" type="text">
						</div>	
						<div class="form-group">		
							<label>Branch</label>			
							<input class="form-control" type="text">
						</div>								
						<div class="form-group">		
							<label>Year</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Semester</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Company Information</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Name of Company</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Company Address</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Department / Divison</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Supervisor / Mentor</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Supervisor's Contact Details</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Supervisor's Email</label>			
							<input class="form-control" type="text">
						</div>		
						<div class="form-group">		
							<label>Date Started</label>			
							<input class="form-control" type="date">
						</div>		
						<div class="form-group">		
							<label>Date Ended</label>			
							<input class="form-control" type="date">
						</div>		
						<div class="form-group">		
							<label>Total Internship Hours</label>			
							<input class="form-control" type="number">
						</div>		
						<div class="form-group">		
							<label>Evaluation Form</label><br />
							<input type="radio"> Yes
							<input type="radio"> No
						</div>		
						<div class="form-group">		
							<label>Status</label><br />
							<select class="form-control">
								<option>Pass
								<option>Fail
								<option>Incomplete
								<option>Dropped
								<option>Currently Taking
							</select>
						</div>		
					</form>
				</div>
				
			</div>
	  </div>
	  
	</div>
</div>

<?php include('footer.php') ?>