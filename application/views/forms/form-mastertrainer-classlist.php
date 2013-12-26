<?php include('header.php') ?>
<div class="info-form">

	<?php include('menu-save-draft.php') ?>
	
	<h1>Class List</h1>
	
	
		<form class="form" role="form"> 
				
			<div class="form-group">
				<label>Trainer</label>
				<input type="text" class="form-control" id="trainer">
			</div>
				
			<div class="form-group">
				<label>Subject</label>
				<input type="text" class="form-control" id="subject">
			</div>
			
		</form>
	
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<form class="form">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="name">
						</div>
						<div class="form-group">
							<label>School</label>
							<input type="text" class="form-control" id="school">
						</div>
						<div class="form-group">
							<label>Branch</label>
							<input type="text" class="form-control" id="branch">
						</div>
						<div class="form-group">
							<label>Contact Details</label>
							<input type="text" class="form-control" id="contact">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="email">
						</div>
							
						<div class="submit-button">
							<button class="btn btn-primary" name="submit">Add to List</button>
						</div>
					
					</form>
				</div>
			</div>
		</div>
			
		<div class="col-md-9">
			<h3>List of Students</h3>	
			<div class="customize-btn-group">
				<button type="button" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-success">Refresh</button>
			</div>
			<table class="table">
				<tr>
					<th></th>
					<th>Action</th>
					<th>Name</th>
					<th>School</th>
					<th>Branch</th>
					<th>Contact Details</th>
					<th>Email</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					<td>Simon, Dayanara F.</td>
					<td>Ateneo de Manila University</td>
					<td>Quezon City</td>
					<td>09053633495</td>
					<td>dayanarasimono@yahoo.com</td>
				</tr>
			</table>
		</div>
	</div>

<?php include('footer.php') ?>