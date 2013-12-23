<div class="area">
	<div class="header">
		<h1>Manage Participants</h1>
	</div>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#student" data-toggle="tab">Student</a></li>
		<li><a href="#teacher" data-toggle="tab">Teacher</a></li>
		<li><a href="#proctor" data-toggle="tab">Proctor</a></li>
	</ul>
	
	<div class="tab-content">
		<div class="tab-pane active" id="student">
			<div class="col-md-12">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_student'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#batch">Batch Upload</button>
					<button class="btn btn-success" onclick="location.reload();">Refresh</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#search">Search</button>
				</div>
				<table class="table table-area">
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>Name</th>
						<th>School</th>
						<th>Programs</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="form-student-edit.php">View</a> | <a href="#">Delete</a></td>
						<td>Simon, Dayanara</td>
						<td>Ateneo de Manila University</td>
						<td>GCAT, SMP, BEST</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="tab-pane fade" id="teacher">Teachers</div>
		<div class="tab-pane fade" id="proctor">Proctor</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="batch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Batch Upload</h4>
			</div>
			<div class="modal-body">
				<div class="student-button-groups">
					<button class="btn btn-primary btn-lg">Upload Students</button>
					<button class="btn btn-primary btn-lg">Upload GCAT Student Grades</button>
					<button class="btn btn-primary btn-lg">Upload BEST Student Grades</button>
					<button class="btn btn-primary btn-lg">Upload ADEPT Student Grades</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Delete</h4>
			</div>
			<div class="modal-body">
				<div class="student-button-groups">
					Are you sure you want to delete the selected students?
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Filter Search</h4>
			</div>
			<div class="modal-body">
				<div class="student-button-groups">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group">
							<label for="school" class="col-sm-3 control-label">School</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="school">
							</div>
						</div>
						<div class="form-group">
							<label for="programs" class="col-sm-3 control-label">Programs</label><br /><br />
							<input type="checkbox"> SMP<br />	
							<input type="checkbox"> ADEPT<br />
							<input type="checkbox"> GCAT<br />
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Search</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>