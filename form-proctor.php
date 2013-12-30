<?php include('header.php') ?>
<?php include('menu-save-draft.php'); ?>

<div class="info-form">

	<h1>Proctor Form</h1>
	<legend>Personal Information</legend>
			
		<form class="form-inline">
			
			<div class="form-group"><label>Name Suffix</label>
			<input type="text" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control">
			</div>

			<div class="form-group"><label>First Name</label>
			<input type="text" class="form-control">
			</div>

			<div class="form-group"><label>Middle Initial</label>
			<input type="text" class="form-control">
			</div>


		</form>
		
		<form class="form-inline">
			
			<div class="form-group"><label>Gender</label><br/>
				<input type="radio" name="gender" value="male"> Male
				<input type="radio" name="gender" value="female"> Female
			</div>
			
		</form>
		
		<form class="form-inline">
			
			<div class="form-group">
			<label>Birth Date</label>
			<input type="date" class="form-control">
			</div>
			
			<div class="form-group"><label>Email</label>
			<input type="email" class="form-control">
			</div>
			
		</form>
		
		<form class="form-inline">
			
			<div class="form-group"><label>Affiliation</label>
			<input type="text" class="form-control">
			</div>
			
			<div class="form-group"><label>How long have (in years) you been affiliated with your parent organization?</label>
			<input type="number" class="form-control">
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
<?php include('footer.php'); ?>