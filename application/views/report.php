<div class="header">
	<h1>Reports</h1>
</div>


<ul class="nav nav-tabs">
	<li class="active"><a href="#program" data-toggle="tab">Program</a></li>
	<li><a href="#SUC" data-toggle="tab">SUC</a></li>
	<li><a href="#MandE" data-toggle="tab">Monitoring and Evaluation</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="program">

		<div class="panel-group" id="accordion">
			<!-- Student Program Report GCAT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_gcat">&#x25BC; Student Program Report GCAT</a>
					</h4>
				</div>
				<div id="program_student_gcat" class="panel-collapse collapse">
					<div class="panel-body">
						<!-- CHANGE THIS --><form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportGCAT'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_gcat_start_date">
							</div>

							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_gcat_end_date">
							</div>

							<div class="button-groups">
								<!-- CHANGE THIS ALSO --><button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report BEST -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_best">&#x25BC; Student Program Report BEST</a>
					</h4>
				</div>
				<div id="program_student_best" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentBestProgramReport'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_best_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_best_end_date">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report ADEPT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_adept">&#x25BC; Student Program Report ADEPT</a>
					</h4>
				</div>
				<div id="program_student_adept" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentAdeptProgramReport'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_adept_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_adept_end_date">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report per Subject -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_subject">&#x25BC; Student Program Report Per Subject</a>
					</h4>
				</div>
				<div id="program_student_subject" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportPerSub'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_subject_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_subject_end_date">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_subject_subject">
									<?php foreach ($subjects as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- T3 Program Report GCAT
			NOT YET DONE
			-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3">&#x25BC; T3 Program Report GCAT</a>
					</h4>
				</div>
				<div id="program_t3" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/t3ProgramReportGCAT'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_t3_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_t3_end_date">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- T3 Program Report per Subject-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3_subject">&#x25BC; T3 Program Report Per Subject</a>
					</h4>
				</div>
				<div id="program_t3_subject" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/T3ProgramReportPerSub'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_t3_subject_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_t3_subject_end_date">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_t3_subject">
									<?php foreach ($subjects as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	

<!-- SUC Report-->
	<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_report">&#x25BC; SUC Report</a>
					</h4>
				</div>
				<div id="suc_report" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/sucReport'); ?>" method="post" target="_blank">
							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="program_suc_report_school_code">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_suc_report_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_suc_report_end_date">
							</div>
							
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="tab-pane" id="SUC">	
		
		<!-- SMP Class List DONE -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_smp_class_list">&#x25BC;</a> SMP Class List
					</h4>
				</div>
				<div id="suc_smp_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/smpclassesSUCReport'); ?>" method="post" target="_blank">
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_teacher_class">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_subject_class">
								<?php foreach ($subjects as $subject): ?>
									<option value="<?php echo $subject->Subject_Code ?>"><?php echo $subject->Subject_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_semester_class">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_school_class">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- BEST Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_best_class_list">&#x25BC;</a> BEST Class List
					</h4>
				</div>
				<div id="suc_best_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/BestStudentClassesSUCReport'); ?>" method="post" target="_blank">							
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_best_teacher_class">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_best_semester_class">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_best_school_class">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Adept Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_adept_class_list">&#x25BC;</a> AdEPT Class List
					</h4>
				</div>
				<div id="suc_adept_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/AdeptStudentClassesSUCReport'); ?>" method="post" target="_blank">							
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_adept_teacher_class">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_adept_semester_class">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_adept_school_class">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
					
					
	
	<!-- GCAT Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_gcat_class_list">&#x25BC;</a> GCAT Classes
					</h4>
				</div>
				<div id="suc_gcat_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/GCATStudentClassesSUCReport'); ?>" method="post" target="_blank">

							<div class="form-group">
								<label>Proctor</label>
								<select class="form-control" name="suc_gcat_proctor_class">
								<?php foreach ($proctors as $proctor): ?>
									<option value="<?php echo $proctor->Proctor_ID ?>"><?php echo $proctor->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_gcat_semester_class">
							</div>
							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_gcat_school_class">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
					
	<!-- Best Students List  -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_best_student_list">&#x25BC;</a> BEST Student List
					</h4>
				</div>
				<div id="suc_best_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/BestStudentsSUCReport'); ?>" method="post" target="_blank">							
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_best_teacher_students">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_best_semester_students">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_best_school_students">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Class</label>
								<select class="form-control" name="suc_best_class_students">
								<?php foreach ($best_classes as $class): ?>
									<option value="<?php echo $class->Name; ?>"><?php echo $class->Name?></option>
								<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

	<!-- AdEPT Students List  -->

		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_adept_student_list">&#x25BC;</a> AdEPT Student List
					</h4>
				</div>
				<div id="suc_adept_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/BestStudentsSUCReport'); ?>" method="post" target="_blank">							
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_adept_teacher_students">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_adept_semester_students">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_adept_school_students">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Class</label>
								<select class="form-control" name="suc_adept_class_students">
								<?php foreach ($adept_classes as $class): ?>
									<option value="<?php echo $class->Name; ?>"><?php echo $class->Name?></option>
								<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- GCAT Students List   -->

		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_gcat_student_list">&#x25BC;</a> GCAT Student List
					</h4>
				</div>
				<div id="suc_gcat_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/GCATStudentSUCReport'); ?>" method="post" target="_blank">							
							
						<div class="form-group">
								<label>Proctor</label>
								<select class="form-control" name="suc_gcat_proctor_students">
								<?php foreach ($proctors as $proctor): ?>
									<option value="<?php echo $proctor->Proctor_ID ?>"><?php echo $proctor->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_gcat_semester_students">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_gcat_school_students">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Class</label>
								<select class="form-control" name="suc_gcat_class_students">
								<?php foreach ($gcat_classes as $class): ?>
									<option value="<?php echo $class->Name; ?>"><?php echo $class->Name?></option>
								<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- SMP Students List here  -->

		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_smp_student_list">&#x25BC;</a> SMP Student List
					</h4>
				</div>
				<div id="suc_smp_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/SMPStudentSUCReport'); ?>" method="post" target="_blank">							
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_smp_teacher_students">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_smp_subject_students">
									<?php foreach ($smp_subjects as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_smp_semester_students">
							</div>

							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_smp_school_students">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Class</label>
								<select class="form-control" name="suc_smp_class_students">
								<?php foreach ($smp_classes as $class): ?>
									<option value="<?php echo $class->Name; ?>"><?php echo $class->Name?></option>
								<?php endforeach; ?>
								</select>
							</div>


							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>



					
					
		<!-- T3 BEST -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_t3_best_class_list">&#x25BC;</a> T3 BEST
					</h4>
				</div>
				<div id="suc_t3_best_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/T3BestSUCReport'); ?>" method="post" target="_blank">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_t3_best_class_list_school">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_t3_best_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_t3_best_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

	<!-- T3 ADEPT -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_t3_adept_class_list">&#x25BC;</a> T3 ADEPT
					</h4>
				</div>
				<div id="suc_t3_adept_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/T3AdeptSUCReport'); ?>" method="post" target="_blank">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_t3_adept_class_list_school">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_t3_adept_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_t3_adept_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

			
		

	<!-- T3 SMP -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_smp">&#x25BC;</a> T3 SMP
					</h4>
				</div>
				<div id="suc_smp" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/SMPTotalSUCReport'); ?>" method="post" target="_blank">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_t3_smp_school">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code; ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_t3_smp_subject">
									<?php foreach ($smp_subjects as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_t3_smp_semester">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="tab-pane" id="MandE">
		<div class="panel-group" id="accordion3">
		<!-- Quarterly Reports -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion3" href="#mande_quarter">&#x25BC; Quarterly Report</a>
					</h4>
				</div>
				<div id="mande_quarter" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/mneQuarterlyReport'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Year</label>
								<input class="form-control" type="number" name="mande_quarter_year" min="2011">
							</div>
							<div class="form-group">
								<label>Target</label>
								<input class="form-control" type="number" name="mande_quarter_target">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Monthly Report -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion3" href="#mande_month">&#x25BC; Monthly Report</a>
					</h4>
				</div>
				<div id="mande_month" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/mneMonthlyReport'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Year</label>
								<input class="form-control" type="number" name="mande_month_year" min="2011">
							</div>				
							<div class="form-group">
								<label>Target</label>
								<input class="form-control" type="number" name="mande_month_target">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
