<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	
	<h1>BEST Product Tracker Encoder</h1>
	
	<legend>General Information</legend>
	<form class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
						
		<div class="form-group">
			<label>Date</label><!-- This is the start where you put the label -->
			<input type="text" class="form-control" id="school"><!-- The input field. Don't forget the id -->
		</div>

		<div class="form-group">
			<label>School</label><!-- This is the start where you put the label -->
			<input type="text" class="form-control" id="school"><!-- The input field. Don't forget the id -->
		</div>
			
		<div class="form-group">
			<label>Branch</label><!-- This is the another label -->
			<input type="text" class="form-control" id="branch">
		</div>
			
	</form>
				
	<legend>Student List</legend>
	<div class="col-md-3">
			<div class="panel panel-info">
			<div class="panel-heading">Add or Edit Student</div>
			<div class="panel-body">
			<form class="form" role="form">
					<div class="form-group">		
						<label>Last Name</label>			
						<input class="form-control" type="text" id="lname">
					</div>
					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" id="fname">
					</div>
					
					<div class="form-group">
						<label>Middle Initial</label>
						<input type="text" class="form-control" id="mname">
					</div>
					
				</form>
				<form class="form" role="form">
					
					<div class="form-group">
						<label>Student Number</label><br/>
						<input type="text" class="form-control" id="snumber">
					</div>
					
					<div class="form-group">
						<label>Control Number</label><br/>
						<input type="text" class="form-control" id="cnumber"> 
					</div>		

					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" id="username">
					</div>

					<div class="submit-button">
						<button class="btn btn-primary" name="submit">Add to List</button>
					</div>
				</form>
		
			</div>
			</div>
		</div>
	
	<div class="col-md-9">
	
	<legend>List of Students</legend>
	
		<button class="btn btn-info">Batch Upload</button>
		<button class="btn btn-danger">Delete</button>
		<button class="btn btn-success">Refresh</button>
		<button class="btn btn-info">Print List</button>
		
		<table class="table table-area">
			<tr>
				<th></th>
				<th>Action</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Middle Initial</th>
				<th>Student Number</th>
				<th>Control Number</th>
				<th>Username</th>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
				<td>Simon</td>
				<td>Dayanara</td>
				<td>F</td>
				<td>103523</td>
				<td>DS1234</td>
				<td>asimon</td>
			</tr>
		</table>
		
	</div>
</div>	
