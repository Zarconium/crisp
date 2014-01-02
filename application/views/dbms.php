		<div class="header">
			<h1>Manage Participants</h1>
		</div>
		
		
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#student" data-toggle="tab">Student</a></li>
		  <li><a href="#teacher" data-toggle="tab">Teacher</a></li>
		  <li><a href="#proctor" data-toggle="tab">Proctor</a></li>
		  <li><a href="#trainer" data-toggle="tab">Master Trainer</a></li>
		  <li><a href="#program" data-toggle="tab">Programs</a></li>
		</ul>
		
	
		<div class="tab-content">
		  <div class="tab-pane active" id="student">
						  
				  <div class="col-md-12">
					  <div class="button-groups">
							<a href="<?php echo base_url('dbms/form_student_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#batchStudent">
							  Batch Upload
							</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#search">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
					  </div>
						<table class="table table-area">
							<tr>
								<th>Check</th>
								<th>Action</th>
								<th>Name</th>
								<th>School</th>
								<th>Programs</th>
							</tr>
<<<<<<< HEAD
						<?php foreach ($students as $student): ?>
						<tr>
							<td><input type="checkbox"></td>
							<td><a href="form-student-edit.php">View</a> | <a href="#">Delete</a></td>
							<td><?php echo $student->Full_Name; ?></td>
							<td><?php echo $student->School_Name; ?></td>
							<td>GCAT, SMP, BEST</td>
						</tr>
						<?php endforeach; ?>
=======
							<tr>
								<td><input type="checkbox"></td>
								<td><a href="<?php echo base_url('dbms/form_student_profile'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>Simon, Dayanara</td>
								<td>Ateneo de Manila University</td>
								<td>GCAT, SMP, BEST </td>
							</tr>
>>>>>>> 96ad1a94cc752ac856fdb43eeaf93bbbb1d323b0
						</table>
				  </div>
				  
				
			</div>
				  <div class="tab-pane fade" id="teacher">
				  
				  <div class="col-md-12">
					  <div class="button-groups">
							<a href="<?php echo base_url('dbms/form_teacher_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#batchTeacher">
							  Batch Upload
							</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#search">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
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
								<td><a href="<?php echo base_url('dbms/form_teacher_profile'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>Raymond, Cruz</td>
								<td>Ateneo de Manila University</td>
								<td>ADEPT</td>
							</tr>
						</table>
				  </div>
				  
				  </div>
				  <div class="tab-pane fade" id="proctor">
				  
				  <div class="col-md-12">
					  <div class="button-groups">
							<a href="<?php echo base_url('dbms/form_proctor_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#batchStudent">
							  Batch Upload
							</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#search">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
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
								<td><a href="<?php echo base_url('dbms/form_proctor_profile'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>Uygongco, Glu</td>
								<td>Ateneo de Manila University</td>
								<td>BEST</td>
							</tr>
						</table>
				  </div>
				  
				  </div>
			
			
		  <div class="tab-pane fade" id="trainer">
			  <div class="button-groups">
					<a href="<?php echo base_url('dbms/form_mastertrainer_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#batchTrainer">
					  Batch Upload
					</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#search">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					<button class="btn btn-success">Refresh</button>
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
								<td><a href="<?php echo base_url('dbms/form_mastertrainer_profile'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>Peralta, Philip</td>
						<td>Ateneo de Manila University</td>
						<td>GCAT</td>
					</tr>
				</table>
		  </div>
		  
		  <div class="tab-pane fade" id="program">
		  
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#class" data-toggle="tab">Classes</a></li>
				  <li><a href="#smp" data-toggle="tab">SMP Tracker</a></li>
				  <li><a href="#gcat" data-toggle="tab">GCAT Tracker</a></li>
				  <li><a href="#best" data-toggle="tab">BEST Tracker</a></li>
				  <li><a href="#adept" data-toggle="tab">ADEPT Tracker</a></li>
				</ul>
				
				<div class="tab-content">
				
					<div class="tab-pane active" id="class">
						
					  <div class="button-groups">
							<a href="<?php echo base_url('dbms/form_class_add'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#searchClass">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
					  </div>
						<table class="table table-area">
							<tr>
								<th>Check</th>
								<th>Action</th>
								<th>Teacher's Name</th>
								<th>School</th>
								<th>Campus</th>
								<th>Subject</th>
								<th>Semester</th>
								<th>Year</th>
								<th>Section</th>
								<th>Students</th>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td><a href="<?php echo base_url('dbms/form_class_add'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>Peralta, Philip</td>
								<td>Ateneo de Manila University</td>
								<td>Quezon City</td>
								<td>ITM</td>
								<td>1st Semester</td>
								<td>2</td>
								<td>A</td>
								<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>
							</tr>
						</table>
					</div>
					
					<div class="tab-pane fade" id="smp">
						<div class="button-groups">
							<a href="<?php echo base_url('dbms/form_program_smp_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#batchSMP">
							  Batch Upload
							</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#searchSMP">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
						</div>
						<table class="table table-area">
							<tr>
								<th>Check</th>
								<th>Action</th>
								<th>Date</th>
								<th>School</th>
								<th>Campus</th>
								<th>List of Students</th>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td><a href="<?php echo base_url('dbms/form_program_best_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>11/21/2013</td>
								<td>Ateneo de Manila University</td>
								<td>Quezon City</td>
								<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>
							</tr>
						</table>
						
					</div>
					
					<div class="tab-pane fade" id="gcat">
					
						<div class="button-groups">
							<a href="<?php echo base_url('dbms/form_program_gcat_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#searchSMP">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
						</div>
						<table class="table table-area">
							<tr>
								<th>Check</th>
								<th>Action</th>
								<th>Date</th>
								<th>School</th>
								<th>Campus</th>
								<th>Subject</th>
								<th>Proctor</th>
								<th>List of Students</th>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td><a href="<?php echo base_url('dbms/form_program_gcat_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>11/21/2013</td>
								<td>Ateneo de Manila University</td>
								<td>Quezon City</td>
								<td>ITM</td>
								<td>Pulan, Max</td>
								<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>
							</tr>
						</table>
					
					</div>
					
					<div class="tab-pane fade" id="best">
						<div class="button-groups">
							<a href="<?php echo base_url('dbms/form_program_best_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
							<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
							<button class="btn btn-warning" data-toggle="modal" data-target="#searchSMP">Search</button>
							<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
							<button class="btn btn-success">Refresh</button>
						</div>
						<table class="table table-area">
							<tr>
								<th>Check</th>
								<th>Action</th>
								<th>Date</th>
								<th>School</th>
								<th>Campus</th>
								<th>List of Students</th>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td><a href="<?php echo base_url('dbms/form_program_best_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
								<td>11/21/2013</td>
								<td>Ateneo de Manila University</td>
								<td>Quezon City</td>
								<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>
							</tr>
						</table>
					</div>
					
					<div class="tab-pane fade" id="adept">
					</div>
					
					
				</div>
		
		  </div>
		  
		

<!-- Dialogs and Stuff -->

<div class="modal fade" id="batchStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<div class="modal fade" id="batchTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Batch Upload</h4>
      </div>
      <div class="modal-body">
		<div class="student-button-groups">
			<button class="btn btn-primary btn-lg">Upload Teachers</button>
			<button class="btn btn-primary btn-lg">Upload BEST Teacher Attendance</button>
			<button class="btn btn-primary btn-lg">Upload ADEPT Teacher Attendance</button>
			<button class="btn btn-primary btn-lg">Upload SMP Teacher Attendance</button>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="printList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Print List</h4>
      </div>
      <div class="modal-body">
		<div class="student-button-groups">
			This generates a student / teacher / proctor / whatever sheet containing the student's control number, username, name, sex, and current status with regards to the BEST program.
			<p>Insert view here.</p>
			<p><button class="btn  btn-primary">Print as Excel</button></p>
			<p><button class="btn btn-primary">Print as PDF</button></p>
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
			Are you sure you want to delete the selected participants?
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
		
						
				<form class="form" role="form">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="school">School</label>
						<input type="text" class="form-control" id="school">
					</div>
					<div class="form-group">
						<label for="programs">Programs</label><br />
							 <input type="checkbox"> BEST<br />	
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

<div class="modal fade" id="searchClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Filter Search</h4>
      </div>
      <div class="modal-body">
		<div class="student-button-groups">
		
						
				<form class="form" role="form">
					<div class="form-group">
						<label for="name">Teacher's Name</label>
						<input type="text" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="name">School</label>
						<input type="text" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="school">Campus</label>
						<input type="text" class="form-control" id="school">
					</div>
					<div class="form-group">
						<label for="school">Semester</label>
						<input type="number" class="form-control" id="school">
					</div>
					<div class="form-group">
						<label for="school">Year</label>
						<input type="number" class="form-control" id="school">
					</div>
					<div class="form-group">
						<label for="school">Section</label>
						<input type="text" class="form-control" id="school">
					</div>
					<div class="form-group">
						<label for="programs">Subjects</label><br />
							 <input type="checkbox"> BEST<br />	
							 <input type="checkbox"> ADEPT<br />
							 <input type="checkbox"> BPO101<br />	
							 <input type="checkbox"> BPO102<br />	
							 <input type="checkbox"> Service Culture<br />	
							 <input type="checkbox"> Systems Thinking<br />	
							 <input type="checkbox"> GCAT<br />
					</div>
					<div class="form-group">
						<label for="school">Students <span class="help-block">separated by a comma</span></label>
						<input type="text" class="form-control" id="school">
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

<div class="modal fade" id="viewListOfStudents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Print List</h4>
      </div>
      <div class="modal-body">
		<div class="student-button-groups">
			This has the list of all the students in the class.
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
	