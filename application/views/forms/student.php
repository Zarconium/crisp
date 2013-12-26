<HTML>
<head>
	<title>Forms</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="customize.css">

</head>
<BODY>
<div class="wrapper info-form">

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
			<input type="radio" name="update" value="no" >No
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
			<label>Birth Month</label>
			<input type="text" class="form-control">
		</div>
			
		<div class="form-group">
			<label>Birth Day</label>
			<input type="text" class="form-control">
		</div>
			
		<div class="form-group">
			<label>Birth Year</label>
			<input type="text" class="form-control">
		</div>
	</form>
	
	<form class="form-inline role="form">
		
		<div class="form-group">
			<label>Nationality</label>
			<input type="text" placeholder="this is actually a dropdown">
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
			<input type="text" placeholder="this is actually a dropdown">
		</div>
			
		<div class="form-group">
			<label>Region</label>
			<input type="text" placeholder="this is actually a dropdown">
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
			<div class="form-group"><label>Province</label>
			<input type="text" placeholder="this is actually a dropdown">
		</div>
			
			<div class="form-group"><label>Region</label>
			<input type="text" placeholder="this is actually a dropdown">
		</div>
			
	</form>
		
	<legend>Contact Detailss</legend>
		
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
			<input type="text" class="form-control">
		</div>
		<div class="form-group">
			<label>Course</label>
			<input type="text" class="form-control">
		</div>
		<div class="form-group">
			<label>Year</label>
			<input type="text" class="form-control">
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
</BODY>

</HTML>