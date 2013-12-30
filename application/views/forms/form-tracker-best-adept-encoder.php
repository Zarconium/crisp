
<div class="info-form">
	<h3>BEST Product Tracker Encoder</h3>
	
	<div class="col-md-3">
		
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
			<li><a href="#student" data-toggle="tab">Add or Edit Student</a></li>
		</ul>	
		
		<div class="tab-content">
			<div class="tab-pane fade in active" id="details">

				<form class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
									
					<div class="form-group">
						<label>Date</label><!-- This is the start where you put the label -->
						<input type="text" class="form-control" id="school" name="date" value="<?php echo set_value('date'); ?>">
						<?php echo form_error('date', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
					<label>School</label>
					<select class="form-control" name="school">
					<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>
			</div>
					
						
				</form>
			
			</div>
		

			<div class="tab-pane fade" id="student">
				<form class="form" role="form">
					<div class="form-group">		
						<label>Last Name</label>			
						<input class="form-control" type="text" id="lname" name="last_name" value="<?php echo set_value('last_name'); ?>">
						<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
					</div>
					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" id="fname" name="first_name" value="<?php echo set_value('first_name'); ?>">
						<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
					</div>
					
					<div class="form-group">
						<label>Middle Initial</label>
						<input type="text" class="form-control" id="mname" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>">
						<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>
					</div>
					
				</form>
				<form class="form" role="form">
					
					<div class="form-group">
						<label>Student Number</label><br/>
						<input type="text" class="form-control" id="snumber" name="student_number" value="<?php echo set_value('student_number'); ?>">
						<?php echo form_error('student_number', '<div class="text-danger">', '</div>'); ?>
					</div>
					
					<div class="form-group">
						<label>Control Number</label><br/>
						<input type="text" class="form-control" id="cnumber" name="control_number " value="<?php echo set_value('control_number'); ?>">
						<?php echo form_error('control_number', '<div class="text-danger">', '</div>'); ?>
					</div>		

					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
						<?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
					</div>

				</form>
		
				<div class="submit-button">
					<button class="btn btn-primary" name="submit">Submit</button>
				</div>

			</div>
			
			
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('#myTab').tab();
			});
		</script>
		
		</div>
	</div>
	
	<div class="col-md-9">
	
	<legend>List of Students</legend>
	
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

		<button class="btn btn-danger">Delete</button>
		<button class="btn btn-success">Refresh</button>
		<button class="btn btn-info">Print List</button>
	</div>
</div>	

<script type="text/javascript" src="js/bootstrap.js"></script>
