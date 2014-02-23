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
				<button class="btn btn-success" data-toggle="modal" data-target="#batchStudent">Batch Upload</button>
				<button class="btn btn-warning" data-toggle="modal" data-target="#search">Search</button>
				<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
			</div>
				<!-- CUT THIS OFF
				<?php
					foreach ($students as $student)
					{
						// Build the custom actions links.
						// Adding a new table row.
						//$this->table->add_row($key['title'], $key['slug'], $actions);
						$this->table->add_row('action', 'action', $student->Full_Name, $student->School_Name, $student->Subject_Codes);
					}
		
				echo $this->table->generate(); 	
				echo $this->pagination->create_links();
				?>
				-->
				
			<table class="table table-striped table-area">
				<thead>
				<tr>
					<th>Check</th>
					<th>Action</th>
					<th>Name</th>
					<th>School</th>
					<th>Programs</th>
				</tr>
				</thead>
				<?php if ($students) foreach ($students as $student){ ?>
				<tr>
					<td><input type="checkbox"></td>
					<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_student_profile/' . $student->Student_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_student/' . $student->Student_ID); ?>" onClick="return confirm('Delete record?');">Delete</a></td>
					<td><?php echo $student->Full_Name; ?></td>
					<td><?php echo $student->School_Name; ?></td>
					<td><?php echo $student->Subject_Codes; ?></td>
				</tr>
				<?php } ?>
			</table>
			
		</div>
	</div>
		  
	<div class="tab-pane fade" id="teacher">
		<div class="col-md-12">
			<div class="button-groups">
				<a href="<?php echo base_url('dbms/form_teacher_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
				<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
				<button class="btn btn-success" data-toggle="modal" data-target="#batchTeacher">Batch Upload</button>
				<button class="btn btn-warning" data-toggle="modal" data-target="#searchTeacher">Search</button>
				<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
			</div>
			<table class="table table-striped table-area">
				<thead>
				<tr>
					<th>Check</th>
					<th>Action</th>
					<th>Name</th>
					<th>School</th>
					<th>Programs</th>
				</tr>
				</thead>
				<?php if ($teachers) foreach ($teachers as $teacher): ?>
				<tr>
					<td><input type="checkbox"></td>
					<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_teacher_profile/' . $teacher->Teacher_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_teacher/' . $teacher->Teacher_ID); ?>" onClick="return confirm('Delete record?');">Delete</a></td>
					<td><?php echo $teacher->Full_Name; ?></td>
					<td><?php echo $teacher->School_Name; ?></td>
					<td><?php echo $teacher->Subject_Codes; ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>

	<div class="tab-pane fade" id="proctor">
		<div class="col-md-12">
			<div class="button-groups">
				<a href="<?php echo base_url('dbms/form_proctor_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
				<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
				<button class="btn btn-success disabled" data-toggle="modal" data-target="#batchProctor">Batch Upload</button>
				<button class="btn btn-warning" data-toggle="modal" data-target="#searchProctor">Search</button>
				<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
			</div>
			<table class="table table-striped table-area">
				<thead>
				<tr>
					<th>Check</th>
					<th>Action</th>
					<th>Name</th>
					<th>School</th>
					<th>Programs</th>
				</tr>
				</thead>
				<?php if ($proctors) foreach ($proctors as $proctor): ?>
				<tr>
					<td><input type="checkbox"></td>
					<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_proctor_profile/' . $proctor->Proctor_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_proctor/' . $proctor->Proctor_ID); ?>" onClick="return confirm('Delete record?');">Delete</a></td>
					<td><?php echo $proctor->Full_Name; ?></td>
					<td><?php echo $proctor->School_Name; ?></td>
					<td><?php echo $proctor->Subject_Code; ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	
	
	<div class="tab-pane fade" id="trainer">
		<div class="col-md-12">
			<div class="button-groups">
				<a href="<?php echo base_url('dbms/form_mastertrainer_application'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
				<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
				<button class="btn btn-success disabled" data-toggle="modal" data-target="#batchTrainer">Batch Upload</button>
				<button class="btn btn-warning" data-toggle="modal" data-target="#searchMasterTrainer">Search</button>
				<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
		 	</div>
			<table class="table table-striped table-area">
				<thead>
				<tr>
					<th>Check</th>
					<th>Action</th>
					<th>Name</th>
					<th>School</th>
					<th>Programs</th>
				</tr>
				</thead>
				<?php if ($mastertrainers) foreach ($mastertrainers as $mastertrainer): ?>
				<tr>
					<td><input type="checkbox"></td>
					<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_mastertrainer_profile/' . $mastertrainer->Master_Trainer_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_mastertrainer/' . $mastertrainer->Master_Trainer_ID); ?>" onClick="return confirm('Delete record?');">Delete</a></td>
					<td><?php echo $mastertrainer->Full_Name; ?></td>
					<td><?php echo $mastertrainer->School_Name; ?></td>
					<td><?php echo $mastertrainer->Subject_Codes; ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
  
	<div class="tab-pane fade" id="class">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#class_student" data-toggle="tab">Student Classes</a></li>
			<li><a href="#class_mastertrainer" data-toggle="tab">Teacher Classes</a></li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="class_student">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_class_add'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchClass">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
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
						<!--<th>Students</th>-->
					</tr>
					</thead>
					<?php if ($student_classes) foreach ($student_classes as $student_class): ?>
					<tr>
						<td><input type="checkbox"></td>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_class/' . $student_class->Class_ID); ?>">View</a> | <a href="<?php echo base_url('dbms/delete_class/' . $student_class->Class_ID); ?>" onClick="return confirm('Delete record?');">Delete</a></td>
						<td><?php echo $student_class->Full_Name; ?></td>
						<td><?php echo $student_class->School_Name; ?></td>
						<td><?php echo $student_class->School_Branch; ?></td>
						<td><?php echo $student_class->Subject_Code; ?></td>
						<td><?php echo $student_class->Semester; ?></td>
						<td><?php echo $student_class->School_Year; ?></td>
						<td><?php echo $student_class->Section; ?></td>
						<!--<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>-->
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			
			<div class="tab-pane" id="class_mastertrainer">
				<div class="button-groups">
					<a href="<?php echo base_url('dbms/form_mastertrainer_classlist_add'); ?>"><button type="submit" class="btn btn-primary">Add</button></a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchClassForMasterTrainer">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Check</th>
						<th>Action</th>
						<th>Trainer's Name</th>
						<th>Subject</th>
						<!--<th>Teachers</th>-->
					</thead>
					</tr>
					<?php if ($t3_classes) foreach ($t3_classes as $t3_class): ?>
					<tr>
						<td><input type="checkbox"></td>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_mastertrainer_classlist/' . $t3_class->T3_Class_ID); ?>">View</a>
						<td><?php echo $t3_class->Full_Name; ?></td>
						<td><?php echo $t3_class->Subject_Code; ?></td>
						<!--<td><button class="btn btn-default" data-toggle="modal" data-target="#viewListOfStudents">View List</button></td>-->
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="tracker">	
		<ul class="nav nav-tabs">
			<li class="active"><a href="#smp" data-toggle="tab">SMP Tracker</a></li>
			<li><a href="#internship" data-toggle="tab">Internship Tracker</a></li>
			<li><a href="#gcat" data-toggle="tab">GCAT Tracker</a></li>
			<li><a href="#best" data-toggle="tab">BEST Tracker</a></li>
			<li><a href="#adept" data-toggle="tab">ADEPT Tracker</a></li>
			<li><a href="#best_t3" data-toggle="tab">T3 BEST Tracker</a></li>
			<li><a href="#adept_t3 " data-toggle="tab">T3 ADEPT Tracker</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="smp">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchSMP">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchSMP">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>ID Number</th>
						<th>Name</th>
						<th>Year</th>
						<th>Course</th>
					</tr>
					</thead>
					<?php if ($smp_students) foreach ($smp_students as $smp_student): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_smp_tracker/' . $smp_student->Student_ID); ?>">View</a></td>
						<td><?php echo $smp_student->Student_ID_Number; ?></td>
						<td><?php echo $smp_student->Full_Name; ?></td>
						<td><?php echo $smp_student->Year; ?></td>
						<td><?php echo $smp_student->Course; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			
			<div class="tab-pane fade" id="internship">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchSMP">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchSMP">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>ID Number</th>
						<th>Name</th>
						<th>Year</th>
						<th>Course</th>
					</tr>
					</thead>
					<?php if ($internship_students) foreach ($internship_students as $internship_student): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_smp_internship_tracker/' . $internship_student->Student_ID); ?>">View</a></td>
						<td><?php echo $internship_student->Student_ID_Number; ?></td>
						<td><?php echo $internship_student->Full_Name; ?></td>
						<td><?php echo $internship_student->Year; ?></td>
						<td><?php echo $internship_student->Course; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			
			<div class="tab-pane fade" id="gcat">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchgcat">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchGCAT">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>ID Number</th>
						<th>Name</th>
						<th>Year</th>
						<th>Course</th>
					</tr>
					</thead>
					<?php if ($gcat_students) foreach ($gcat_students as $gcat_student): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_gcat_tracker/' . $gcat_student->Student_ID); ?>">View</a></td>
						<td><?php echo $gcat_student->Student_ID_Number; ?></td>
						<td><?php echo $gcat_student->Full_Name; ?></td>
						<td><?php echo $gcat_student->Year; ?></td>
						<td><?php echo $gcat_student->Course; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				<!-- <table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>Proctor</th>
						<th>School</th>
						<th>Semester</th>
						<th>Year</th>
						<th>Section</th>
					</tr>
					</thead>
					<?//php if ($gcat_classes) foreach ($gcat_classes as $gcat_class): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?//php echo base_url('dbms/form_program_gcat_tracker/' . $gcat_class->Class_ID); ?>">View</a></td>
						<td><?//php echo $gcat_class->Full_Name; ?></td>
						<td><?//php echo $gcat_class->School_Name; ?></td>
						<td><?//php echo $gcat_class->Semester; ?></td>
						<td><?//php echo $gcat_class->School_Year; ?></td>
						<td><?//php echo $gcat_class->Section; ?></td>
					</tr>
					<?//php endforeach; ?>
				</table> -->
			</div>
			
			<div class="tab-pane fade" id="best">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchbest" onclick="$('[name=file_best_adept_student_tracker]').click();">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>ID Number</th>
						<th>Name</th>
						<th>Year</th>
						<th>Course</th>
					</tr>
					</thead>
					<?php if ($best_students) foreach ($best_students as $best_student): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_best_tracker/' . $best_student->Student_ID); ?>">View</a></td>
						<td><?php echo $best_student->Student_ID_Number; ?></td>
						<td><?php echo $best_student->Full_Name; ?></td>
						<td><?php echo $best_student->Year; ?></td>
						<td><?php echo $best_student->Course; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			
			<div class="tab-pane fade" id="adept">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchadept" onclick="$('[name=file_best_adept_student_tracker]').click();">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>ID Number</th>
						<th>Name</th>
						<th>Year</th>
						<th>Course</th>
					</tr>
					</thead>
					<?php if ($adept_students) foreach ($adept_students as $adept_student): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_adept_tracker/' . $adept_student->Student_ID); ?>">View</a></td>
						<td><?php echo $adept_student->Student_ID_Number; ?></td>
						<td><?php echo $adept_student->Full_Name; ?></td>
						<td><?php echo $adept_student->Year; ?></td>
						<td><?php echo $adept_student->Course; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			
			<div class="tab-pane fade" id="best_t3">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchBESTT3" onclick="$('[name=file_best_tracker]').click();">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>Name</th>
						<th>School</th>
						<th>Status</th>
						<th>Unsubmitted Documents</th>
					</tr>
					</thead>
					<?php if ($best_t3_trackers) foreach ($best_t3_trackers as $best_t3_tracker): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_t3_best_tracker/' . $best_t3_tracker->Teacher_ID); ?>">View</a></td>
						<td><?php echo $best_t3_tracker->Full_Name; ?></td>
						<td><?php echo $best_t3_tracker->School_Name; ?></td>
						<td><?php echo $best_t3_tracker->Status; ?></td>
						<td>
							<?php 
								if (!$best_t3_tracker->Interview_Form) { echo "Interview Form, "; }
								if (!$best_t3_tracker->Site_Visit_Form) { echo "Site Visit Form, "; }
								if (!$best_t3_tracker->Best_T3_Feedback) { echo "Best T3 Feedback, "; }
								if (!$best_t3_tracker->Best_ELearning_Feedback) { echo "Best E-Learning Feedback, "; }
								if (!$best_t3_tracker->Best_CD) { echo "Best CD, "; }
								if (!$best_t3_tracker->Certificate_Of_Attendance) { echo "Certificate of Attendance, "; }
								if (!$best_t3_tracker->Best_Certified_Trainers) { echo "Best Certified Trainers"; }
							?>
						</td>
						<!--<td><button class="btn btn-default" data-toggle="modal" data-target="#viewT3BESTTasks">View List</button></td>-->
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			
			<div class="tab-pane fade" id="adept_t3">
				<div class="button-groups">
					<button class="btn btn-success" data-toggle="modal" data-target="#batchBESTT3" onclick="$('[name=file_adept_tracker]').click();">Batch Upload</button>
					<button class="btn btn-warning" data-toggle="modal" data-target="#searchBestAdept">Search</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#printList">Print List</button>
				</div>
				<table class="table table-striped table-area">
					<thead>
					<tr>
						<th>Action</th>
						<th>Name</th>
						<th>School</th>
						<th>Status</th>
						<th>Unsubmitted Documents</th>
					</tr>
					</thead>
					<?php if ($adept_t3_trackers) foreach ($adept_t3_trackers as $adept_t3_tracker): ?>
					<tr>
						<td nowrap="nowrap"><a href="<?php echo base_url('dbms/form_program_t3_adept_tracker/' . $adept_t3_tracker->Teacher_ID); ?>">View</a></td>
						<td><?php echo $adept_t3_tracker->Full_Name; ?></td>
						<td><?php echo $adept_t3_tracker->School_Name; ?></td>
						<td><?php echo $adept_t3_tracker->Status; ?></td>
						<td>
							<?php 
								if (!$adept_t3_tracker->Interview_Form) { echo "Interview Form, "; }
								if (!$adept_t3_tracker->Site_Visit_Form) { echo "Site Visit Form, "; }
								if (!$adept_t3_tracker->Adept_T3_Feedback) { echo "Adept T3 Feedback, "; }
								if (!$adept_t3_tracker->Adept_ELearning_Feedback) { echo "Adept E-Learning Feedback, "; }
								if (!$adept_t3_tracker->Manual_and_Kit) { echo "Manual & Kit, "; }
								if (!$adept_t3_tracker->Certificate_Of_Attendance) { echo "Certificate of Attendance, "; }
								if (!$adept_t3_tracker->Adept_Certified_Trainers) { echo "Adept Certified Trainers"; }
							?>
						</td>
						<!--<td><button class="btn btn-default" data-toggle="modal" data-target="#viewT3BESTTasks">View List</button></td>-->
					</tr>
					<?php endforeach; ?>
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
				<h4 class="modal-title" id="myModalLabel">Batch Upload - Student</h4>
			</div>
			<div class="modal-body">
				<div class="student-button-groups">
					<?php $attributes = array('id' => 'upload_student_profile', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_student_profile', $attributes); ?>
						<input type="file" name="file_student_profile" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_student_profile').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_student_profile]').click();">Upload Students</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_best_adept_student_product_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_adept_student_product_tracker', $attributes); ?>
						<input type="file" name="file_best_adept_student_product_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_adept_student_product_tracker').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_adept_student_product_tracker]').click();">Upload BEST/AdEPT Student Product Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_best_adept_student_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_adept_student_tracker', $attributes); ?>
						<input type="file" name="file_best_adept_student_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_adept_student_tracker').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_adept_student_tracker]').click();">Upload BEST/AdEPT Student Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_gcat_student_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_gcat_student_tracker', $attributes); ?>
						<input type="file" name="file_gcat_student_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_gcat_student_tracker').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_gcat_student_tracker]').click();">Upload GCAT Student Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_smp_student_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_smp_student_tracker', $attributes); ?>
						<input type="file" name="file_smp_student_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_smp_student_tracker').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_smp_student_tracker]').click();">Upload SMP Student Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_internship', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_internship', $attributes); ?>
						<input type="file" name="file_internship" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_internship').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_internship]').click();">Upload Student Internship Form</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_gcat_student_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_gcat_student_grades', $attributes); ?>
						<input type="file" name="file_gcat_student_grades" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_gcat_student_grades').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_gcat_student_grades]').click();">Upload GCAT Student Grades</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_best_student_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_student_grades', $attributes); ?>
						<input type="file" name="file_best_student_grades" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_student_grades').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_student_grades]').click();">Upload BEST Student Grades</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_adept_student_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_adept_student_grades', $attributes); ?>
						<input type="file" name="file_adept_student_grades" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_adept_student_grades').submit(); $('#batchStudent').modal('hide'); $('#progressbar').modal('show');">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_adept_student_grades]').click();">Upload AdEPT Student Grades</button>
					<?php echo form_close(); ?>
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
				<h4 class="modal-title" id="myModalLabel">Batch Upload - Teacher</h4>
			</div>
			<div class="modal-body">
				<div class="student-button-groups">
					<?php $attributes = array('id' => 'upload_best_adept_product_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_adept_product_tracker', $attributes); ?>
						<input type="file" name="file_best_adept_product_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_adept_product_tracker').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_adept_product_tracker]').click();">Upload T3 BEST/AdEPT Product Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_best_T3_attendance', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_T3_attendance', $attributes); ?>
						<input type="file" name="file_best_T3_attendance" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_T3_attendance').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_T3_attendance]').click();">Upload BEST T3 Attendance</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_best_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_tracker', $attributes); ?>
						<input type="file" name="file_best_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_tracker').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_tracker]').click();">Upload T3 BEST Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_adept_T3_attendance', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_adept_T3_attendance', $attributes); ?>
						<input type="file" name="file_adept_T3_attendance" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_adept_T3_attendance').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_adept_T3_attendance]').click();">Upload AdEPT T3 Attendance</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_adept_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_adept_tracker', $attributes); ?>
						<input type="file" name="file_adept_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_adept_tracker').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_adept_tracker]').click();">Upload T3 AdEPT Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_smp_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_smp_tracker', $attributes); ?>
						<input type="file" name="file_smp_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_smp_tracker').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_smp_tracker]').click();">Upload T3 SMP Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_smp_attendance', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_smp_attendance', $attributes); ?>
						<input type="file" name="file_smp_attendance" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_smp_attendance').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_smp_attendance]').click();">Upload T3 SMP Attendance</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_stipend_process_tracker', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_stipend_process_tracker', $attributes); ?>
						<input type="file" name="file_stipend_process_tracker" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_stipend_process_tracker').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_stipend_process_tracker]').click();">Upload Stipend Process Tracker</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_gcat_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_gcat_grades', $attributes); ?>
						<input type="file" name="file_gcat_grades" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_gcat_grades').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_gcat_grades]').click();">Upload GCAT Grades</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_best_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_best_grades', $attributes); ?>
						<input type="file" name="file_best_grades" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_best_grades').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_best_grades]').click();">Upload BEST Grades</button>
					<?php echo form_close(); ?>

					<?php $attributes = array('id' => 'upload_adept_grades', 'class' => 'student-button-groups'); echo form_open_multipart('dbms/upload_adept_grades', $attributes); ?>
						<input type="file" name="file_adept_grades" accept=".xlsx" style="visibility:hidden;position:absolute" onchange="$('#upload_adept_grades').submit();">
						<button type="button" class="btn btn-primary btn-lg" onclick="$('[name=file_adept_grades]').click();">Upload AdEPT Grades</button>
					<?php echo form_close(); ?>
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
				<h4 class="modal-title" id="myModalLabel">Search Students</h4>
			</div>
			<form class="form" role="form" action="<?php echo base_url('dbms'); ?>" method="post">
				<div class="modal-body">
					<div class="student-button-groups">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="student_name" value="<?php echo set_value('student_name'); ?>">
							</div>
							<div class="form-group">
								<label for="school">School</label>
								<select class="form-control" name="student_school">
									<option></option>
									<?php if ($schools) foreach ($schools as $school): ?>
									<option value="<?php echo $school->School_ID;?>" <?php echo set_select('student_school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="programs">Programs</label><br />
								<input type="checkbox" name="student_program[]" value="gcat" <?php echo set_checkbox('student_program[]', 'gcat'); ?>> GCAT<br />
								<input type="checkbox" name="student_program[]" value="best" <?php echo set_checkbox('student_program[]', 'best'); ?>> BEST<br />	
								<input type="checkbox" name="student_program[]" value="adept" <?php echo set_checkbox('student_program[]', 'adept'); ?>> ADEPT<br />
								<input type="checkbox" name="student_program[]" value="smp" <?php echo set_checkbox('student_program[]', 'smp'); ?>> SMP<br />	
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="search_student" value="search_student">Search</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="searchTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Search Teachers</h4>
			</div>
			<form class="form" role="form" action="<?php echo base_url('dbms'); ?>" method="post">
				<div class="modal-body">
					<div class="student-button-groups">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="teacher_name" <?php echo set_value('teacher_name'); ?>>
							</div>
							<div class="form-group">
								<label for="school">School</label>
								<select class="form-control" name="teacher_school">
									<option></option>
									<?php if ($schools) foreach ($schools as $school): ?>
									<option value="<?php echo $school->School_ID;?>" <?php echo set_select('teacher_school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="programs">Programs</label><br />
								<input type="checkbox" name="teacher_program[]" value="gcat" <?php echo set_checkbox('teacher_program[]', 'gcat'); ?>> GCAT<br />
								<input type="checkbox" name="teacher_program[]" value="best" <?php echo set_checkbox('teacher_program[]', 'best'); ?>> BEST<br />	
								<input type="checkbox" name="teacher_program[]" value="adept" <?php echo set_checkbox('teacher_program[]', 'adept'); ?>> ADEPT<br />
								<input type="checkbox" name="teacher_program[]" value="smp" <?php echo set_checkbox('teacher_program[]', 'smp'); ?>> SMP<br />	
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="search_teacher" value="search_teacher">Search</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="searchProctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Search Proctors</h4>
			</div>
			<form class="form" role="form" action="<?php echo base_url('dbms'); ?>" method="post">
				<div class="modal-body">
					<div class="student-button-groups">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="proctor_name" <?php echo set_value('proctor_name'); ?>>
							</div>
							<div class="form-group">
								<label for="school">School</label>
								<select class="form-control" name="proctor_school">
									<option></option>
									<?php if ($schools) foreach ($schools as $school): ?>
									<option value="<?php echo $school->School_ID;?>" <?php echo set_select('proctor_school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="programs">Programs</label><br />
								<input type="checkbox" name="proctor_program[]" value="gcat" <?php echo set_checkbox('proctor_program[]', 'gcat'); ?>> GCAT<br />
								<input type="checkbox" name="proctor_program[]" value="best" <?php echo set_checkbox('proctor_program[]', 'best'); ?>> BEST<br />	
								<input type="checkbox" name="proctor_program[]" value="adept" <?php echo set_checkbox('proctor_program[]', 'adept'); ?>> ADEPT<br />
								<input type="checkbox" name="proctor_program[]" value="smp" <?php echo set_checkbox('proctor_program[]', 'smp'); ?>> SMP<br />	
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="search_proctor" value="search_proctor">Search</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="searchMasterTrainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Search Master Trainers</h4>
			</div>
			<form class="form" role="form" action="<?php echo base_url('dbms'); ?>" method="post">
				<div class="modal-body">
					<div class="student-button-groups">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="mastertrainer_name" <?php echo set_value('mastertrainer_name'); ?>>
							</div>
							<div class="form-group">
								<label for="school">School</label>
								<select class="form-control" name="mastertrainer_school">
									<option></option>
									<?php if ($schools) foreach ($schools as $school): ?>
									<option value="<?php echo $school->School_ID;?>" <?php echo set_select('mastertrainer_school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="programs">Programs</label><br />
								<input type="checkbox" name="mastertrainer_program[]" value="gcat" <?php echo set_checkbox('mastertrainer_program[]', 'gcat'); ?>> GCAT<br />
								<input type="checkbox" name="mastertrainer_program[]" value="best" <?php echo set_checkbox('mastertrainer_program[]', 'best'); ?>> BEST<br />	
								<input type="checkbox" name="mastertrainer_program[]" value="adept" <?php echo set_checkbox('mastertrainer_program[]', 'adept'); ?>> ADEPT<br />
								<input type="checkbox" name="mastertrainer_program[]" value="smp" <?php echo set_checkbox('mastertrainer_program[]', 'smp'); ?>> SMP<br />	
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="search_mastertrainer" value="search_mastertrainer">Search</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="searchClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Search Student Classes</h4>
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
				<h4 class="modal-title" id="myModalLabel">Search Teacher Classes</h4>
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

<div class="modal fade" id="progressbar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Processing...</h4>
			</div>
			<div class="modal-body">
				<div class="progress progress-striped active">
					<div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>