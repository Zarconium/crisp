<?php if ($this->session->flashdata('upload_success')) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Success!</strong> ' . $this->session->flashdata('upload_success') . '</div>';} ?>
<?php if ($this->session->flashdata('upload_error')) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error!</strong> ' . $this->session->flashdata('upload_error') . '</div>';} ?>

<div class="header">
	<h1>Manage Participants</h1>
</div>

<ul class="nav nav-tabs">
  <li class="active"><a href="#student" data-toggle="tab">Student</a></li>
  <li><a href="#teacher" data-toggle="tab">Teacher</a></li>
  <li><a href="#proctor" data-toggle="tab">Proctor</a></li>
  <li><a href="#trainer" data-toggle="tab">Master Trainer</a></li>
  <li><a href="#class" data-toggle="tab">Classes</a></li>
  <li><a href="#tracker" data-toggle="tab">Trackers</a></li>
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
					<?php if ($students): ?>
					<?php foreach ($students as $student): ?>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_student_profile/' . $student->Student_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_student/' . $student->Student_ID); ?>">Delete</a></td>
						<td><?php echo $student->Full_Name; ?></td>
						<td><?php echo $student->School_Name; ?></td>
						<td><?php echo $student->Subject_Codes; ?></td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>
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
					<?php if ($teachers): ?>
					<?php foreach ($teachers as $teacher): ?>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_teacher_profile'); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_teacher/' . $teacher->Teacher_ID); ?>">Delete</a></td>
						<td><?php echo $teacher->Full_Name; ?></td>
						<td><?php echo $teacher->School_Name; ?></td>
						<td><?php echo $teacher->Subject_Codes; ?></td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>
				</table>
		  </div>
		  
		  </div>
		  <div class="tab-pane fade" id="proctor">
		  
		  <div class="col-md-12">
			  <div class="button-groups">
					<a href="<?php echo base_url('dbms/form_proctor_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#batchProctor">
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
						<td><a href="<?php echo base_url('dbms/form_proctor_application'); ?>">View</a> | <a href="#">Delete</a></td>
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
  
  <div class="tab-pane fade" id="class">
  
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#class_student" data-toggle="tab">Student Classes</a></li>
		  <li><a href="#class_mastertrainer	" data-toggle="tab">Master Trainer's Classes</a></li>
		</ul>
		
		<div class="tab-content">
		
			<div class="tab-pane active" id="class_student">
				
			  <div class="button-groups">
					<a href="<?php echo base_url('dbms/form_class_add'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchClass">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
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
			
			
			
			<div class="tab-pane" id="class_mastertrainer">
				
			  <div class="button-groups">
					<a href="<?php echo base_url('dbms/form_mastertrainer_class_add'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchClassForMasterTrainer">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
			  </div>
				<table class="table table-area">
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>Trainer's Name</th>
						<th>Subject</th>
						<th>Teachers</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_class_add'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>Peralta, Philip</td>
						<td>BPO101</td>
						<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfTeachersForMasterTrainer">View List</button></td>
					</tr>
				</table>
			</div>

			

			
		</div>
	</div>

	<div class="tab-pane" id="tracker">	
	
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#smp" data-toggle="tab">SMP Tracker</a></li>
		  <li><a href="#gcat" data-toggle="tab">GCAT Tracker</a></li>
		  <li><a href="#best" data-toggle="tab">BEST Tracker</a></li>
		  <li><a href="#adept" data-toggle="tab">ADEPT Tracker</a></li>
		  <li><a href="#best_t3" data-toggle="tab">T3 BEST Tracker</a></li>
		  <li><a href="#adept_t3 " data-toggle="tab">T3 ADEPT Tracker</a></li>
		</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="smp">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_program_smp_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#batchSMP">
					  Batch Upload
					</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchSMP">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
				</div>
				<table class="table table-area">
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>ID Number</th>
						<th>Name</th>
						<th>Year</th>
						<th>Course</th>
						<th>Subjects</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_program_smp_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>103523</td>
						<td>Simon, Dayanara F.</td>
						<td>4</td>
						<td>BS Management Information Systems</td>
						<td><button class="btn btn-default" data-toggle="modal" data-target="#viewSMPSubjects">View List</button></td>
					</tr>
				</table>
				
			</div>
			
			<div class="tab-pane fade" id="gcat">
			
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_program_gcat_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchGCAT">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
				</div>
				<table class="table table-area">
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>Proctor</th>
						<th>School</th>
						<th>Campus</th>
						<th>Subject</th>
						<th>Semester</th>
						<th>Year</th>
						<th>Section</th>
						<th>List of Students</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_program_gcat_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>Pulan, Max</td>
						<td>Ateneo de Manila University</td>
						<td>Quezon City</td>
						<td>ITM</td>
						<td>1st</td>
						<td>2</td>
						<td>AA</td>
						<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>
					</tr>
				</table>
			
			</div>
			
			<div class="tab-pane fade" id="best">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_program_best_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
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
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_program_adept_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
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
						<td><a href="<?php echo base_url('dbms/form_program_adept_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>11/21/2013</td>
						<td>Ateneo de Manila University</td>
						<td>Quezon City</td>
						<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>
					</tr>
				</table>
			</div>
			
			<div class="tab-pane fade" id="best_t3">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_program_t3_best_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#batchBESTT3">
					  Batch Upload
					</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
				</div>
				<table class="table table-area">
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>Name</th>
						<th>School</th>
						<th>Birthday</th>
						<th>Status</th>
						<th>Unsubmitted Documents</th>
						<th>Grade of Tasks</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_program_t3_adept_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>Simon, Dayanara</td>
						<td>Ateneo de Manila University</td>
						<td>11/21/1993</td>
						<td>P</td>
						<td>Contract, Interview Form, Site Visit Form, </td>
						<td><button class="btn btn-default" data-toggle="modal" data-target="#viewT3BESTTasks">View List</button></td>
					</tr>
				</table>
			</div>
			
			<div class="tab-pane fade" id="adept_t3">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_program_t3_adept_tracker'); ?>"><button class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#batchBESTT3">
					  Batch Upload
					</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
					 
				</div>
				<table class="table table-area">
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>Name</th>
						<th>School</th>
						<th>Birthday</th>
						<th>Unsubmitted Documents</th>
						<th>Grade of Tasks</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="<?php echo base_url('dbms/form_program_t3_best_tracker'); ?>">View</a> | <a href="#">Delete</a></td>
						<td>Simon, Dayanara</td>
						<td>Ateneo de Manila University</td>
						<td>11/21/2013</td>
						<td>CD</td>
						<td><button class="btn btn-default" data-toggle="modal" data-target="#viewT3ADEPTTasks">View List</button></td>
					</tr>
				</table>
			</div>
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
	<?php $attributes = array('id' => 'upload_student_profile', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_student_profile', $attributes); ?>
		<input type="file" name="file_student_profile" accept=".xlsx" style="visibility:hidden" onchange="$('#upload_student_profile').submit();">
		<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_student_profile]').click();">Upload Students</button>
	<?php echo form_close(); ?>
	<?php $attributes = array('id' => 'upload_gcat_student_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_gcat_student_grades', $attributes); ?>
		<input type="file" name="file_gcat_student_grades" accept=".xlsx" style="visibility:hidden" onchange="$('#upload_gcat_student_grades').submit();">
		<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_gcat_student_grades]').click();">Upload GCAT Student Grades</button>
	<?php echo form_close(); ?>

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
<div class="student-button-groups">
	<button class="btn  btn-primary btn-lg">Print as Excel</button>
	<button class="btn btn-primary btn-lg">Print as PDF</button>
</div>
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
				<input type="text" class="form-control" id="sname">
			</div>
			<div class="form-group">
				<label for="school">School</label>
				<input type="text" class="form-control" id="sschool">
			</div>
			<div class="form-group">
				<label for="programs">Programs</label><br />
					 <input type="checkbox" name="sprogram" value="best"> BEST<br />	
					 <input type="checkbox" name="sprogram" value="smp"> SMP<br />	
					 <input type="checkbox" name="sprogram" value="adept"> ADEPT<br />
					 <input type="checkbox" name="sprogram" value="gcat"> GCAT<br />
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
				<input type="text" class="form-control" id="steachername">
			</div>
			<div class="form-group">
				<label for="name">School</label>
				<input type="text" class="form-control" id="school">
			</div>
			<div class="form-group">
				<label for="school">Campus</label>
				<input type="text" class="form-control" id="scampus">
			</div>
			<div class="form-group">
				<label for="school">Semester</label>
				<input type="number" class="form-control" id="semester">
			</div>
			<div class="form-group">
				<label for="school">Year</label>
				<input type="number" class="form-control" id="syear">
			</div>
			<div class="form-group">
				<label for="school">Section</label>
				<input type="text" class="form-control" id="ssection">
			</div>
			<div class="form-group">
				<label for="programs">Subjects</label><br />
					 <input type="checkbox" name="ssubjects" value="best"> BEST<br />	
					 <input type="checkbox" name="ssubjects" value="adept"> ADEPT<br />
					 <input type="checkbox" name="ssubjects" value="bpo101"> BPO101<br />	
					 <input type="checkbox" name="ssubjects" value="bpo102"> BPO102<br />	
					 <input type="checkbox" name="ssubjects" value="sc"> Service Culture<br />	
					 <input type="checkbox" name="ssubjects" value="st"> Systems Thinking<br />	
					 <input type="checkbox" name="ssubjects" value="gcat"> GCAT<br />
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

<div class="modal fade" id="searchClassForMasterTrainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<label for="name">Master Trainer's Name</label>
				<input type="text" class="form-control" id="steachername">
			</div>
			<div class="form-group">
				<label for="programs">Subjects</label><br />
					 <input type="checkbox" name="ssubjects" value="best"> BEST<br />	
					 <input type="checkbox" name="ssubjects" value="adept"> ADEPT<br />
					 <input type="checkbox" name="ssubjects" value="bpo101"> BPO101<br />	
					 <input type="checkbox" name="ssubjects" value="bpo102"> BPO102<br />	
					 <input type="checkbox" name="ssubjects" value="sc"> Service Culture<br />	
					 <input type="checkbox" name="ssubjects" value="st"> Systems Thinking<br />	
					 <input type="checkbox" name="ssubjects" value="gcat"> GCAT<br />
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

<div class="modal fade" id="searchBestAdept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<label for="name">Date</label>
				<input type="date" class="form-control" id="sdate">
			</div>
			<div class="form-group">
				<label for="name">School</label>
				<input type="text" class="form-control" id="sschool">
			</div>
			<div class="form-group">
				<label for="school">Campus</label>
				<input type="text" class="form-control" id="scampus">
			</div>
			<div class="form-group">
				<label for="school">Students <span class="help-block">separated by a comma</span></label>
				<input type="text" class="form-control" id="sstudents">
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

<div class="modal fade" id="viewListOfTeachersForMasterTrainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Print List</h4>
</div>
<div class="modal-body">
<div class="student-button-groups">
	This has the list of all the teachers in the class.
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="searchGCAT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<label for="name">Proctor</label>
				<input type="text" class="form-control" id="sproctor">
			</div>
			<div class="form-group">
				<label for="school">School</label>
				<input type="text" class="form-control" id="sschool">
			</div>
			<div class="form-group">
				<label for="school">Campus</label>
				<input type="text" class="form-control" id="scampus">
			</div>
			<div class="form-group">
				<label for="school">Subject</label>
				<input type="text" class="form-control" id="ssubject">
			</div>
			<div class="form-group">
				<label for="school">Semester</label>
				<input type="number" class="form-control" id="ssemester">
			</div>
			<div class="form-group">
				<label for="school">Year</label>
				<input type="number" class="form-control" id="syear">
			</div>
			<div class="form-group">
				<label for="school">Section</label>
				<input type="number" class="form-control" id="ssection">
			</div>
			<div class="form-group">
				<label for="school">Students <span class="help-block">separated by a comma</span></label>
				<input type="text" class="form-control" id="sstudents">
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

<div class="modal fade" id="searchSMP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<label for="name">ID Number</label>
				<input type="text" class="form-control" id="sid">
			</div>
			<div class="form-group">
				<label for="school">Name</label>
				<input type="text" class="form-control" id="sname">
			</div>
			<div class="form-group">
				<label for="school">School </label>
				<input type="text" class="form-control" id="sschool">
			</div>
			<div class="form-group">
				<label for="school">Year </label>
				<input type="text" class="form-control" id="syear">
			</div>
			<div class="form-group">
				<label for="school">Course</label>
				<input type="text" class="form-control" id="scourse">
			</div>
			<div class="form-group">
				<label for="school">Subjects Passed</label><br />
				<input type="checkbox" value="bc" name="ssubjects"> Business Communication<br />				
				<input type="checkbox" value="bpo101" name="ssubjects"> BPO101<br />	
				<input type="checkbox" value="bpo102" name="ssubjects"> BPO102<br />	
				<input type="checkbox" value="sc" name="ssubjects"> Service Culture<br />	
				<input type="checkbox" value="st" name="ssubjects"> Systems Thinking<br />	
				<input type="checkbox" value="st" name="ssubjects"> Internship<br />
			</div>
		</form>
				

</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Search</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="viewSMPSubjects" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">SMP Subjects</h4>
</div>
<div class="modal-body">
Taken by <span class="highlight">Dayanara Simon</span>.
<table class="table">
	<tr>
		<th>Subject</th>
		<th>Year Taken</th>
		<th>Semester</th>
		<th>Status</th>
		<th>Grade Received</th>
		<th>No. of Times Taken</th>
	</tr>
	<tr>
		<td>Business Communication</td>
		<td>1</td>
		<td>2</td>
		<td>Passed</td>
		<td>90</td>
		<td>1</td>
	</tr>
	<tr>
		<td>BPO101</td>
		<td>1</td>
		<td>2</td>
		<td>Passed</td>
		<td>90</td>
		<td>1</td>
	</tr>
	<tr>
		<td>BPO102</td>
		<td>1</td>
		<td>2</td>
		<td>Passed</td>
		<td>90</td>
		<td>1</td>
	</tr>
	<tr>
		<td>Service Culture</td>
		<td>1</td>
		<td>2</td>
		<td>Passed</td>
		<td>90</td>
		<td>1</td>
	</tr>
	<tr>
		<td>Systems Thinking</td>
		<td>1</td>
		<td>2</td>
		<td>Passed</td>
		<td>90</td>
		<td>1</td>
	</tr>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="viewT3BESTTasks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">BEST T3 Tasks</h4>
</div>
<div class="modal-body">
Taken by <span class="highlight">Dayanara Simon</span>.
<table class="table">
	<tr>
		<th>Task</th>
		<th>Grade</th>
	</tr>
	<tr>
		<td>Task 1</td>
		<td>90</td>
	</tr>
	<tr>
		<td>Task 2</td>
		<td>90</td>
	</tr>
	<tr>
		<td>Task 3</td>
		<td>90</td>
	</tr>
	<tr>
		<td>Task 4</td>
		<td>90</td>
	</tr>
	<tr>
		<td>Task 5</td>
		<td>90</td>
	</tr>
	
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="viewT3ADEPTTasks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">BEST T3 Tasks</h4>
</div>
<div class="modal-body">
Taken by <span class="highlight">Dayanara Simon</span>.
<table class="table">
	<tr>
		<th>Task</th>
		<th>Grade</th>
	</tr>
	<tr>
		<td>Lesson Plan Demo</td>
		<td>90</td>
	</tr>
	<tr>
		<td>Total Weighted</td>
		<td>90</td>
	</tr>
	<tr>
		<td>Training Portfolio</td>
		<td>90</td>
	</tr>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
