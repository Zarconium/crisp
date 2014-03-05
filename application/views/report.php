<div class="header">
	<h1>Reports</h1>
</div>

<?php
$date = date('Y-m-d');
$year = date('Y');
?>


<ul class="nav nav-tabs">
	<li class="active"><a href="#program_ched" data-toggle="tab">CHED Program</a></li>
	<li><a href="#program_sei" data-toggle="tab">SEI Program</a></li>
	<li><a href="#SUC" data-toggle="tab">SUC</a></li>
	<?php if($this->session->userdata('logged_in')['type'] == 'admin' || $this->session->userdata('logged_in')['type'] == 'pdt'): ?>
	<li><a href="#MandE" data-toggle="tab">Monitoring and Evaluation</a></li>
	<?php endif; ?>	
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="program_ched">

		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_gcat">&#x25BC; Student Program Report GCAT - CHED</a>
					</h4>
				</div>
				<div id="program_student_gcat" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportGCAT'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_gcat_start_date">
							</div>

							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_gcat_end_date">
							</div>

							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report BEST -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_best">&#x25BC; Student Program Report BEST - CHED</a>
					</h4>
				</div>
				<div id="program_student_best" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentBestProgramReport'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_best_start_date">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_best_end_date">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report ADEPT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_adept">&#x25BC; Student Program Report ADEPT - CHED</a>
					</h4>
				</div>
				<div id="program_student_adept" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentAdeptProgramReport'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_adept_start_date">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_adept_end_date">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report per Subject -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_subject">&#x25BC; Student Program Report Per Subject - CHED</a>
					</h4>
				</div>
				<div id="program_student_subject" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportPerSub'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_subject_start_date">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_subject_end_date">
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
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- T3 Program Report GCAT
			
			-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3">&#x25BC; T3 Program Report GCAT - CHED</a>
					</h4>
				</div>
				<div id="program_t3" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/t3ProgramReportGCAT'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_t3_start_date">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_t3_end_date">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- T3 Program Report per Subject-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3_subject">&#x25BC; T3 Program Report Per Subject - CHED</a>
					</h4>
				</div>
				<div id="program_t3_subject" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/T3ProgramReportPerSub'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_t3_subject_start_date">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_t3_subject_end_date">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_t3_subject">
									<?php foreach ($subjects_except_gcat as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

	<!-- SUC CHED Report-->
	<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_report">&#x25BC; SUC Report - CHED</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_suc_report_start_date">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_suc_report_end_date">
							</div>
							
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<!--SEI Program -->
	<div class="tab-pane" id="program_sei">

		<div class="panel-group" id="accordion2">
			<!-- Student Program Report GCAT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#program_student_gcat_sei">&#x25BC; Student Program Report GCAT - SEI</a>
					</h4>
				</div>
				<div id="program_student_gcat_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<!-- CHANGE THIS --><form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportGCATSei'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_gcat_start_date_sei">
							</div>

							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_gcat_end_date_sei">
							</div>

							<div class="button-groups">
								<!-- CHANGE THIS ALSO --><button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report BEST -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#program_student_best_sei">&#x25BC; Student Program Report BEST - SEI</a>
					</h4>
				</div>
				<div id="program_student_best_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentBestProgramReportSei'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_best_start_date_sei">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_best_end_date_sei">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report ADEPT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#program_student_adept_sei">&#x25BC; Student Program Report ADEPT - SEI</a>
					</h4>
				</div>
				<div id="program_student_adept_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentAdeptProgramReportSei'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_adept_start_date_sei">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_adept_end_date_sei">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report per Subject -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#program_student_subject_sei">&#x25BC; Student Program Report Per Subject - SEI</a>
					</h4>
				</div>
				<div id="program_student_subject_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportPerSubSei'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_student_subject_start_date_sei">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_student_subject_end_date_sei">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_subject_subject_sei">
									<?php foreach ($subjects as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
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
						<a data-toggle="collapse" data-parent="#accordion2" href="#program_t3_sei">&#x25BC; T3 Program Report GCAT - SEI</a>
					</h4>
				</div>
				<div id="program_t3_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/t3ProgramReportGCATSei'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_t3_start_date_sei">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_t3_end_date_sei">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- T3 Program Report per Subject-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#program_t3_subject_sei">&#x25BC; T3 Program Report Per Subject - SEI</a>
					</h4>
				</div>
				<div id="program_t3_subject_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/T3ProgramReportPerSubSei'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_t3_subject_start_date_sei">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_t3_subject_end_date_sei">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_t3_subject_sei">
									<?php foreach ($subjects_except_gcat as $subject): ?>
										<option value="<?php echo $subject->Subject_ID; ?>"><?php echo $subject->Subject_Name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
	

	<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#suc_report_sei">&#x25BC; SUC Report - SEI</a>
					</h4>
				</div>
				<div id="suc_report_sei" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/sucReportSei'); ?>" method="post" target="_blank">
							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="program_suc_report_school_code_sei">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->Code ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="program_suc_report_start_date_sei">
							</div>
							
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="program_suc_report_end_date_sei">
							</div>
							
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- SUC Report-->
<div class="tab-pane" id="SUC">	
		
	<div class="panel-group" id="accordion4">
		<!-- SMP Class List DONE -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_smp_class_list">&#x25BC; SMP Class List</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_smp_class">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_smp_class">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_semester_class" min="0" value="1">
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
								
								
							</div>
						</form>
					</div>
				</div>
			</div>

		<!-- BEST Class List -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_best_class_list">&#x25BC; BEST Class List</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_best_class">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_best_class">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_best_semester_class" min="0" value="1">
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
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
		
		<!-- Adept Class List -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_adept_class_list">&#x25BC; AdEPT Class List</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_adept_class">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_adept_class">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_adept_semester_class" min="0" value="1">
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
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
					
	<!-- GCAT Class List -->
	
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_gcat_class_list">&#x25BC; GCAT Classes</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_gcat_class">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_gcat_class">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_gcat_semester_class" min="0" value="1">
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
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
					
	<!-- Best Students List  -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_best_student_list">&#x25BC; BEST Student List</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_best_students">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_best_students">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_best_semester_students" min="0" value="1">
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
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
		

	<!-- AdEPT Students List  -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_adept_student_list">&#x25BC; AdEPT Student List</a>
					</h4>
				</div>
				<div id="suc_adept_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form" action="<?php echo base_url('reports/AdeptStudentsSUCReport'); ?>" method="post" target="_blank">							
							
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_adept_teacher_students">
								<?php foreach ($teachers as $teacher): ?>
									<option value="<?php echo $teacher->Code ?>"><?php echo $teacher->Full_Name ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_adept_students">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_adept_students">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_adept_semester_students" min="0" value="1">
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
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
	

		<!-- GCAT Students List   -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_gcat_student_list">&#x25BC; GCAT Student List</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_gcat_students">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_gcat_students">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_gcat_semester_students" min="0" value="1">
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
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
	

		<!-- SMP Students List here  -->

			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_smp_student_list">&#x25BC; SMP Student List</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_start_date_smp_students">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_end_date_smp_students">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_smp_semester_students" min="0" value="1">
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
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>



					
					
		<!-- T3 BEST -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_t3_best_class_list">&#x25BC; T3 BEST</a>
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
								<input type="date" value="1990-01-01" class="form-control" name="suc_t3_best_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_t3_best_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>

	<!-- T3 ADEPT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_t3_adept_class_list">&#x25BC; T3 ADEPT</a>
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
								<input type="date" value="1990-01-01" class="form-control" name="suc_t3_adept_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_t3_adept_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>

	<!-- T3 SMP -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion4" href="#suc_smp">&#x25BC; T3 SMP</a>
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
								<label>Date Start</label>
								<input type="date" value="1990-01-01" class="form-control" name="suc_t3_smp_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" value="<?php echo $date; ?>" class="form-control" name="suc_t3_smp_date_end">
							</div>

							<div class="form-group">
								<label>Semester</label>
									<input type="number" class="form-control" name="suc_t3_smp_semester" min="0" value="1">
							</div>
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- MandE Report-->
	<div class="tab-pane" id="MandE">
		<?php if($this->session->userdata('logged_in')['type'] == 'admin'): ?>
		<div class="button-groups">
			<a href="<?php echo base_url('reports/reportTargetConfigurationQuarterlyAdd'); ?>"><button type="submit" class="btn btn-primary">Set New Targets</button></a>
		</div><br/>
		<?php endif; ?>
		
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
								<select class="form-control" name="mande_quarter_year">
								<?php foreach ($mne_years as $year): ?>
										<option value="<?php echo $year->Year; ?>"><?php echo $year->Year; ?></option>
								<?php endforeach; ?>
								</select>
							</div>
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
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
								<select class="form-control" name="mande_monthly_year">
								<?php foreach ($mne_years as $year): ?>
										<option value="<?php echo $year->Year; ?>"><?php echo $year->Year; ?></option>
								<?php endforeach; ?>
								</select>

							</div>		
							
							<div class="button-groups">
								<button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
