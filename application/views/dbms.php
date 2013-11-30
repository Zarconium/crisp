<?php include('header.php'); ?>

		<div class="col-md-10">
			<div class="area">
				<div class="header">
					<h1>DBMS</h1>
				</div>
				
				
				<ul class="nav nav-tabs" id="myTab">
				  <li class="active"><a href="#student" data-toggle="tab">Student</a></li>
				  <li><a href="#teacher" data-toggle="tab">Teacher</a></li>
				  <li><a href="#program" data-toggle="tab">Program</a></li>
				</ul>
				
				<div class="files">
				<div class="col-md-4">
					<button type="button" class="btn btn-primary">Add</button>
					<button type="button" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-info">Batching</button>
					<button type="button" class="btn btn-success">Refresh</button>

					<div class="searching">
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
								<div id="programs">
									 <input type="checkbox"> SMP<br />
									 <input type="checkbox"> eDept<br />
									 <input type="checkbox"> A-eDEPT<br />
									 <input type="checkbox"> GCAT<br />
								</div>
							</div>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-default">Search</button>
							</div>
						</form>
					</div>
				  </div>
				  
				  <div class="col-md-8">
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
								<td><a href="#">View</a> | <a href="#">Delete</a></td>
								<td>Simon, Dayanara</td>
								<td>Ateneo de Manila University</td>
								<td>GCAT, SMP, BEST </td>
							</tr>
						</table>
				  </div>
				
				</div>
				  <div class="tab-pane fade" id="teacher">Teachers</div>
				  <div class="tab-pane fade" id="program">Programs</div>
				</div>
				
			</div>
			</div>
		</div>
	

<?php include('footer.php'); ?>