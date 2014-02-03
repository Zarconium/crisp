<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dbms_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in'))
		{
			if($this->session->userdata('logged_in')['type'] == 'guest')
			{
				redirect('home');
			}
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['students'] = $this->student->getAllStudentsFormatted();
		$data['teachers'] = $this->teacher->getAllTeachersFormatted();
		$data['proctors'] = $this->proctor->getAllProctorsFormatted();
		$data['mastertrainers'] = $this->mastertrainer->getAllMasterTrainersFormatted();

		$this->load->view('header');
		$this->load->view('dbms', $data);
		$this->load->view('footer');
	}

	function delete_student($id)
	{
		$this->student->deleteStudentById($id);
		$this->log->addLog('Deleted Student');
		redirect('dbms');
	}

	function delete_teacher($id)
	{
		$this->teacher->deleteTeacherById($id);
		$this->log->addLog('Deleted Teacher');
		redirect('dbms');
	}

	function delete_proctor($id)
	{
		$this->teacher->deleteProctorById($id);
		$this->log->addLog('Deleted Proctor');
		redirect('dbms');
	}
	
	function form_student_profile($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['statuses'] = $this->status->getAllStatuses();
		$data['student'] = $this->student->getStudentById($id);
		$data['gcat_tracker'] = $this->student->getGcatTrackerByStudentId($id);
		$data['best_tracker'] = $this->student->getBestTrackerByStudentId($id);
		$data['adept_tracker'] = $this->student->getAdeptTrackerByStudentId($id);
		$data['smp_tracker'] = $this->student->getSmpTrackerByStudentId($id);
		$data['internship'] = $this->student->getInternshipByStudentId($id);
		$data['bizcom'] = $this->student->getBizComByStudentId($id);
		$data['bpo101'] = $this->student->getBpo101ByStudentId($id);
		$data['bpo102'] = $this->student->getBpo102ByStudentId($id);
		$data['sc101'] = $this->student->getSc101ByStudentId($id);
		$data['systh101'] = $this->student->getSysth101ByStudentId($id);
		// $this->log->addLog('Updated Student Profile');

		$this->load->view('header');
		$this->load->view('forms/form-student-profile', $data);
		$this->load->view('footer');
	}
	
	
	function form_teacher_profile($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['teacher'] = $this->teacher->getTeacherById($id);
		$data['training_experiences'] = $this->teacher->getTrainingExperiencesByTeacherId($id);
		$data['certifications'] = $this->teacher->getCertificationsByTeacherId($id);
		$data['awards'] = $this->teacher->getAwardsByTeacherId($id);
		$data['relevant_experiences'] = $this->teacher->getRelevantExperiencesByTeacherId($id);
		$data['professional_references'] = $this->teacher->getProfessionalReferencesByTeacherId($id);
		$data['affiliation_to_organizations'] = $this->teacher->getAffiliationToOrganizationsByTeacherId($id);
		$data['best_t3_attendance'] = $this->teacher->getBestT3AttendanceByTeacherId($id);
		$data['adept_t3_attendance'] = $this->teacher->getAdeptT3AttendanceByTeacherId($id);
		$data['smp_t3_attendance'] = $this->teacher->getSmpT3AttendanceByTeacherId($id);

		// $this->log->addLog('Updated Teacher Profile');

		$this->load->view('header');
		$this->load->view('forms/form-teacher-profile', $data);
		$this->load->view('footer');
	}
	
	function form_proctor_profile($id)
	{
		$data['proctor'] = $this->proctor->getProctorById($id);

		//$this->log->addLog('Updated Proctor Profile');

		$this->load->view('header');
		$this->load->view('forms/form-proctor-profile', $data);
		$this->load->view('footer');
	}
	
	function form_mastertrainer_profile($id)
	{
		$data['mastertrainer'] = $this->mastertrainer->getMasterTrainerById($id);
		//$this->log->addLog('Updated Mastertrainer Profile');

		$this->load->view('header');
		$this->load->view('forms/form-mastertrainer-profile', $data);
		$this->load->view('footer');
	}

	function form_student_application()
	{
		$data['schools'] = $this->school->getAllSchools();

		if($this->input->post())
		{
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim||max_length[4]xss_clean');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|max_length[5]|xss_clean');
			$this->form_validation->set_rules('id_number', 'ID Number', 'trim|required|max_length[10]|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil', 'trim|required|max_length[9]|xss_clean');
			$this->form_validation->set_rules('birthday', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|exact_length[1]|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('current_street_number', 'Street Number', 'trim|required|max_length[5]|xss_clean');
			$this->form_validation->set_rules('current_street_name', 'Street Name', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('current_city', 'City', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('current_province', 'Province', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('current_region', 'Region', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[13]|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|max_length[9]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[45]|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|max_length[45]|xss_clean');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required|max_length[97]|xss_clean');
			$this->form_validation->set_rules('year', 'Year Level', 'trim|required|integer|xss_clean');
			$this->form_validation->set_rules('expected_year_of_graduation', 'Expected Year of Graduation', 'trim|required|integer|xss_clean');
			$this->form_validation->set_rules('DOSTscholar', 'DOST Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('scholar', 'Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work', 'Work', 'trim|required|xss_clean');
			$this->form_validation->set_rules('computer', 'Computer', 'trim|required|xss_clean');
			$this->form_validation->set_rules('internet', 'Internet', 'trim|required|xss_clean');
			$this->form_validation->set_rules('code', 'Code', 'trim|required|xss_clean|is_unique[student.Code]');
			$this->form_validation->set_rules('contract', 'Contract', 'trim|required|xss_clean');
			$this->form_validation->set_rules('program[]', 'Applied Programs', 'trim|required|xss_clean');

			$this->form_validation->set_message('is_unique', 'Student already exists.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-student', $data);
					$this->load->view('footer');
				}
				else
				{
					$student = array
					(
						'School_ID' => $this->input->post('school'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Student_ID_Number' => $this->input->post('id_number'),
						'Civil_Status' => $this->input->post('civil'),
						'Birthdate' => $this->input->post('birthday'),
						'Birthplace' => $this->input->post('birthplace'),
						'Gender' => $this->input->post('gender'),
						'Nationality' => $this->input->post('nationality'),
						'Street_Number' => $this->input->post('current_street_number'),
						'Street_Name' => $this->input->post('current_street_name'),
						'City' => $this->input->post('current_city'),
						'Province' => $this->input->post('current_province'),
						'Region' => $this->input->post('current_region'),
						'Alternate_Address' => $this->input->post('alternate_address'),
						'Mobile_Number' => $this->input->post('mobile'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Course' => $this->input->post('degree_type') . " " . $this->input->post('degree'), //concatenate degree type and degree
						'Year' => $this->input->post('year'),
						'Expected_Year_of_Graduation' => $this->input->post('expected_year_of_graduation'),
						'DOST_Scholar' => $this->input->post('DOSTscholar'),
						'Scholar' => $this->input->post('scholar'),
						'Interested_In_ITBPO' => $this->input->post('work'),
						'Own_A_Computer' => $this->input->post('computer'),
						'Internet_Access' => $this->input->post('internet'),
						'Code' => $this->input->post('code')
					);
					$student_id = $this->student->addStudent($student);

					foreach ($this->input->post('program') as $program)
					{
						switch ($program)
						{
							case 'smp_ched':
								$project_id = 1;
								$subject_id = 1;
								break;

							case 'gcat_ched':
								$project_id = 1;
								$subject_id = 2;
								break;

							case 'best_ched':
								$project_id = 1;
								$subject_id = 3;
								break;
							case 'adept_ched':
								$project_id = 1;
								$subject_id = 4;
								break;

							case 'best_sei':
								$project_id = 2;
								$subject_id = 1;
								break;

							case 'adept_sei':
								$project_id = 2;
								$subject_id = 2;
								break;

							default:
								break;
						}

						$student_application = array
						(
							'Contract' => $this->input->post('contract'),
							'Student_ID' => $student_id,
							'Project_ID' => $project_id,
							'Subject_ID' => $subject_id
						);
						$student_application_id = $this->student->addStudentApplication($student_application);

						$tracker = array
						(
							'Remarks' => NULL,
							'Status_ID' => 3,
							'Times_Taken' => 1,
							'Subject_ID' => $subject_id
						);
						$tracker_id = $this->student->addTracker($tracker);

						$student_tracker = array
						(
							'Tracker_ID' => $tracker_id,
							'Student_ID' => $student_id,
						);
						$student_tracker_id = $this->student->addStudentTracker($student_tracker);

						$subject_student = array('Tracker_ID' => $tracker_id);
						switch ($subject_id)
						{
							case 1:
								$this->student->addSmpStudent($subject_student);
								$this->student->addSmpStudentCoursesTaken($subject_student);
								break;

							case 2:
								$this->student->addGcatStudent($subject_student);
								break;

							case 3:
								$this->student->addBestStudent($subject_student);
								break;

							case 4:
								$this->student->addAdeptStudent($subject_student);
								break;
							
							default:
								break;
						}
					}

					$data['form_success'] = TRUE;
					$this->log->addLog('Added Student');

					$this->load->view('header');
					$this->load->view('forms/form-student', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-student', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-student', $data);
			$this->load->view('footer');
		}
	}

	function form_proctor_application()
	{
		$data = array();

		if($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');

			$this->form_validation->set_message('is_unique', 'Proctor already exists.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-proctor-application', $data);
					$this->load->view('footer');
				}
				else
				{
					$student = array
					(
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Gender' => $this->input->post('gender'),
						'Civil_Status' => $this->input->post('civil'),
						'Birthdate' => $this->input->post('birthday'),
						'Mobile_Number' => $this->input->post('mobile_number'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Company_Name' => $this->input->post('company_name'),
						'Company_Address' => $this->input->post('company_address'),
						'Position' => $this->input->post('position'),
					);

					//$this->student->addStudent($student);

					$data['form_success'] = TRUE;
					$this->log->addLog('Added Proctor');

					$this->load->view('header');
					$this->load->view('forms/form-proctor-application', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-proctor-application', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-proctor-application', $data);
			$this->load->view('footer');
		}
	}

	function form_mastertrainer_application()
	{
		$data = array();

		if($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');

			$this->form_validation->set_message('is_unique', 'Master Trainer already exists.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-application', $data);
					$this->load->view('footer');
				}
				else
				{
					$proctor = array
					(
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Gender' => $this->input->post('gender'),
						'Civil_Status' => $this->input->post('civil'),
						'Birthdate' => $this->input->post('birthday'),
						'Mobile_Number' => $this->input->post('mobile_number'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Company_Name' => $this->input->post('company_name'),
						'Company_Address' => $this->input->post('company_address'),
						'Position' => $this->input->post('position'),
					);

					// $this->student->addStudent($student);

					$data['form_success'] = TRUE;
					$this->log->addLog('Added Mastertrainer');

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-application', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-mastertrainer-application', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-mastertrainer-application', $data);
			$this->load->view('footer');
		}
	}


	function form_teacher_best_attendance()
	{
		$this->log->addLog('Updated Teacher Best Attendance');

		$this->load->view('header');
		$this->load->view('forms/form-teacher-best-attendance');
		$this->load->view('footer');
	}

	function form_student_best_adept_product()
	{
		$this->log->addLog('Added Student Best Adept Product');

		$this->load->view('header');
		$this->load->view('forms/form-tracker-best-adept-encoder');
		$this->load->view('footer');
	}

	function form_teacher_best_adept_product()
	{
		$this->log->addLog('Added Teacher Best Adept Product');

		$this->load->view('header');
		$this->load->view('forms/form-tracker-best-adept-teacher');
		$this->load->view('footer');
	}
	
	function form_teacher_application()
	{
		$data['schools'] = $this->school->getAllSchools();

		if($this->input->post())
		{
			$this->form_validation->set_rules('code', 'Code', 'trim|required|xss_clean|is_unique[teacher.Code]');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('total_year_teaching', 'Total Years of Teaching', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('desktop', 'Desktop', 'trim|required|xss_clean');
			$this->form_validation->set_rules('laptop', 'Laptop', 'trim|required|xss_clean');
			$this->form_validation->set_rules('access', 'Access', 'trim|required|xss_clean');
			$this->form_validation->set_rules('street_number', 'Street Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('street_name', 'Street Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('province', 'Province', 'trim|required|xss_clean');
			$this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required||xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('master_type', 'MA/MS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('master_degree', 'Masters Degree', 'trim|required|xss_clean');
			$this->form_validation->set_rules('master_school', 'Masters School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('doctorate_type', 'Doctor', 'trim|required|xss_clean');
			$this->form_validation->set_rules('doctorate_degree', 'Doctorate Degree', 'trim|required|xss_clean');
			$this->form_validation->set_rules('doctorate_school', 'Doctorate School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('employment_status', 'Employment Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_position', 'Current Position', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_department', 'Current Department', 'trim|xss_clean');
			$this->form_validation->set_rules('current_employer', 'Current Employer', 'trim|required|xss_clean'); //School ID
			$this->form_validation->set_rules('employer_address', 'Employer Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('name_of_supervisor', 'Name of Supervisor', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position_of_supervisor', 'Position of Supervisor', 'trim|xss_clean');
			$this->form_validation->set_rules('supervisor_contact_details', 'Supervisor Contact Details', 'trim|required|xss_clean');
			$this->form_validation->set_rules('other_positions_held', 'Other Positions Held', 'trim|required|xss_clean');
			$this->form_validation->set_rules('classes_handling', 'Classes Handling', 'trim|xss_clean');
			// Institutions
			$this->form_validation->set_rules('institutions_worked_institution[]', 'Institution', 'trim|xss_clean');
			$this->form_validation->set_rules('institutions_worked_position[]', 'Position', 'trim|xss_clean');
			$this->form_validation->set_rules('institutions_worked_year_started[]', 'Year Started', 'trim|xss_clean');
			$this->form_validation->set_rules('institutions_worked_level_taught[]', 'Level Taught', 'trim|xss_clean');
			$this->form_validation->set_rules('institutions_worked_courses_taught[]', 'Courses Taught', 'trim|xss_clean');
			$this->form_validation->set_rules('institutions_worked_number_of_years_in_institution[]', 'Number of Years in Institution', 'trim|xss_clean');
			// Certifications
			$this->form_validation->set_rules('certifications_certification[]', 'Certification', 'trim|xss_clean');
			$this->form_validation->set_rules('certifications_certifying_body[]', 'Certifying Body', 'trim|xss_clean');
			$this->form_validation->set_rules('certifications_date_received[]', 'Certification Date Received', 'trim|xss_clean');
			// Awards
			$this->form_validation->set_rules('awards_award[]', 'Award', 'trim|xss_clean');
			$this->form_validation->set_rules('awards_awarding_body[]', 'Awarding Body', 'trim|xss_clean');
			$this->form_validation->set_rules('awards_date_received[]', 'Award Date Received', 'trim|xss_clean');
			// Other Work
			$this->form_validation->set_rules('other_work_organization[]', 'Organization', 'trim|xss_clean');
			$this->form_validation->set_rules('other_work_position[]', 'Position', 'trim|xss_clean');
			$this->form_validation->set_rules('other_work_description[]', 'Work Description', 'trim|xss_clean');
			$this->form_validation->set_rules('other_work_date_started[]', 'Date Started', 'trim|xss_clean');

			$this->form_validation->set_rules('computer_proficient_skill', 'Computer Proficiency Skills', 'trim|required|xss_clean');
			$this->form_validation->set_rules('computer_familiar_skill', 'Computer Familiarity', 'trim|required|xss_clean');
			$this->form_validation->set_rules('skill', 'Other Skills', 'trim|required|xss_clean');
			// Reference
			$this->form_validation->set_rules('reference_name[]', 'Reference Name', 'trim|xss_clean');
			$this->form_validation->set_rules('reference_position[]', 'Reference Position', 'trim|xss_clean');
			$this->form_validation->set_rules('reference_company[]', 'Reference Company', 'trim|xss_clean');
			$this->form_validation->set_rules('reference_phone[]', 'Reference Phone', 'trim|xss_clean');
			$this->form_validation->set_rules('reference_email[]', 'Reference Email', 'trim|xss_clean');
			// Affiliations
			$this->form_validation->set_rules('affiliation_organization[]', 'Affiliation Organization', 'trim|xss_clean');
			$this->form_validation->set_rules('affiliation_description[]', 'Affiliation Description', 'trim|xss_clean');
			$this->form_validation->set_rules('affiliation_position[]', 'Affiliation Position', 'trim|xss_clean');
			$this->form_validation->set_rules('affiliation_years[]', 'Years of Affiliation', 'trim|xss_clean');

			$this->form_validation->set_rules('resume', 'Resume', 'trim|required|xss_clean');
			$this->form_validation->set_rules('photo', 'Photo', 'trim|required|xss_clean');
			$this->form_validation->set_rules('proof', 'Proof of Certification', 'trim|required|xss_clean');
			$this->form_validation->set_rules('diploma', 'Diploma/TOR', 'trim|required|xss_clean');

			$this->form_validation->set_message('is_unique', 'Teacher already exists.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-application', $data);
					$this->load->view('footer');
				}
				else
				{
					$teacher = array
					(
						'Code' => $this->input->post('code'),
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Birthdate' => $this->input->post('birthdate'),
						'Birthplace' => $this->input->post('birthplace'),
						'Nationality' => $this->input->post('nationality'),
						'Total_Year_of_Teaching' => $this->input->post('total_year_teaching'),
						'Civil_Status' => $this->input->post('civil'),
						'Gender' => $this->input->post('gender'),
						'Desktop?' => $this->input->post('desktop'),
						'Laptop?' => $this->input->post('laptop'),
						'Internet?' => $this->input->post('access'),
						'Street_Number' => $this->input->post('street_number'),
						'Street_Name' => $this->input->post('street_name'),
						'City' => $this->input->post('city'),
						'Province' => $this->input->post('province'),
						'Region' => $this->input->post('region'),
						'Alternate_Address' => $this->input->post('alternate_address'),
						'Mobile_Number' => $this->input->post('mobile'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Employment_Status' => $this->input->post('employment_status'),
						'Current_Position' => $this->input->post('current_position'),
						'Current_Department' => $this->input->post('current_department'),
						'School_ID' => $this->input->post('current_employer'),
						'Name_of_Supervisor' => $this->input->post('name_of_supervisor'),
						'Supervisor_Contact_Details' => $this->input->post('supervisor_contact_details'),
						'Position_of_Supervisor' => $this->input->post('position_of_supervisor'),
						'Classes_Handling' => $this->input->post('classes_handling'),
						'Resume?' => $this->input->post('resume'),
						'Photo?' => $this->input->post('photo'),
						'Proof_of_Certification?' => $this->input->post('proof'),
						'Diploma/TOR' => $this->input->post('diploma')
					);
					$teacher_id = $this->teacher->addTeacher($teacher);

					for ($i = 0; $i < count($this->input->post('institutions_worked_institution')); $i++)
					{ 
						$teacher_training_experience = array
						(
							'Teacher_ID' => $teacher_id,
							'Institution' => $this->input->post('institutions_worked_institution')[$i],
							'Position' => $this->input->post('institutions_worked_position')[$i],
							'Date' => $this->input->post('institutions_worked_year_started')[$i],
							'Level_Taught' => $this->input->post('institutions_worked_level_taught')[$i],
							'Courses_Taught' => $this->input->post('institutions_worked_courses_taught')[$i],
							'Number_of_Years_in_Institution' => $this->input->post('institutions_worked_number_of_years_in_institution')[$i]
						);
						$this->teacher->addTeacherTrainingExperience($teacher_training_experience);
					}

					for ($i = 0; $i < count($this->input->post('certifications_certification')); $i++)
					{ 
						$teacher_certification = array
						(
							'Teacher_ID' => $teacher_id,
							'Certification' => $this->input->post('certifications_certification')[$i],
							'Certifying_Body' => $this->input->post('certifications_certifying_body')[$i],
							'Date_Received' => $this->input->post('certifications_date_received')[$i]
						);
						$this->teacher->addTeacherCertification($teacher_certification);
					}

					for ($i = 0; $i < count($this->input->post('awards_award')); $i++)
					{ 
						$teacher_awards = array
						(
							'Teacher_ID' => $teacher_id,
							'Award' => $this->input->post('awards_award')[$i],
							'Awarding_Body' => $this->input->post('awards_awarding_body')[$i],
							'Date_Received' => $this->input->post('awards_date_received')[$i]
						);
						$this->teacher->addTeacherAwards($teacher_awards);
					}

					for ($i = 0; $i < count($this->input->post('other_work_organization')); $i++)
					{ 
						$teacher_relevant_experiences = array
						(
							'Teacher_ID' => $teacher_id,
							'Organization' => $this->input->post('other_work_organization')[$i],
							'Position' => $this->input->post('other_work_position')[$i],
							'Description' => $this->input->post('other_work_description')[$i],
							'Date' => $this->input->post('other_work_date_started')[$i]
						);
						$this->teacher->addTeacherRelevantExperiences($teacher_relevant_experiences);
					}

					for ($i = 0; $i < count($this->input->post('reference_name')); $i++)
					{ 
						$teacher_professional_reference = array
						(
							'Teacher_ID' => $teacher_id,
							'Name' => $this->input->post('reference_name')[$i],
							'Position' => $this->input->post('reference_position')[$i],
							'Company' => $this->input->post('reference_company')[$i],
							'Phone' => $this->input->post('reference_phone')[$i],
							'Email' => $this->input->post('reference_email')[$i]
						);
						$this->teacher->addTeacherProfessionalReference($teacher_professional_reference);
					}

					for ($i = 0; $i < count($this->input->post('affiliation_organization')); $i++)
					{ 
						$teacher_affiliation_to_organization = array
						(
							'Teacher_ID' => $teacher_id,
							'Organization' => $this->input->post('affiliation_organization')[$i],
							'Description' => $this->input->post('affiliation_description')[$i],
							'Positions' => $this->input->post('affiliation_position')[$i],
							'Years_Affiliated' => $this->input->post('affiliation_years')[$i]
						);
						$this->teacher->addTeacherAffiliationToOrganization($teacher_affiliation_to_organization);
					}

					$data['form_success'] = TRUE;
					$this->log->addLog('Added Teacher');

					$this->load->view('header');
					$this->load->view('forms/form-teacher-application', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-teacher-application', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-teacher-application', $data);
			$this->load->view('footer');
		}
	}
	
	function form_class_add()
	{
		$this->log->addLog('Added Class List');

		$this->load->view('header');
		$this->load->view('forms/form-class-add');
		$this->load->view('footer');
	}
	
	function form_program_gcat_tracker()
	{
		$data['proctors'] = $this->proctor->getAllProctorsFormatted();
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
		$data['statuses'] = $this->status->getAllStatuses();

		if($this->input->post())
		{
			$this->form_validation->set_rules('proctor', 'Proctor', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('semester', 'Semester', 'trim|required|xss_clean');
			$this->form_validation->set_rules('year', 'Year Level', 'trim|required|xss_clean');
			$this->form_validation->set_rules('section', 'Section', 'trim|required|xss_clean');
			// Student list
			$this->form_validation->set_rules('student_full_name[]', 'Student Full Name', 'trim|xss_clean');
			$this->form_validation->set_rules('student_student_number[]', 'Student Number', 'trim|xss_clean');
			$this->form_validation->set_rules('student_session_id[]', 'Session ID', 'trim|xss_clean');
			$this->form_validation->set_rules('student_test_date[]', 'Test Date', 'trim|xss_clean');
			$this->form_validation->set_rules('student_status[]', 'Status', 'trim|xss_clean');
			$this->form_validation->set_rules('student_remarks[]', 'Remarks', 'trim|xss_clean');

			// $this->form_validation->set_message('is_unique', 'Teacher already exists.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-program-gcat-tracker', $data);
					$this->load->view('footer');
				}
				else
				{
					/*$t3_tracker = array
					(
						'Status_ID' => $this->input->post('status'),
						'Contract?' => $this->input->post('contract'),
						'Remarks' => $this->input->post('remarks'),
						'Subject_ID' => $this->input->post('subject')
					);
					$t3_tracker_id = $this->teacher->addTeacher($t3_tracker);

					for ($i = 0; $i < count($this->input->post('institutions_worked_institution')); $i++)
					{ 
						$teacher_training_experience = array
						(
							'Teacher_ID' => $teacher_id,
							'Institution' => $this->input->post('institutions_worked_institution')[$i],
							'Position' => $this->input->post('institutions_worked_position')[$i],
							'Date' => $this->input->post('institutions_worked_year_started')[$i],
							'Level_Taught' => $this->input->post('institutions_worked_level_taught')[$i],
							'Courses_Taught' => $this->input->post('institutions_worked_courses_taught')[$i],
							'Number_of_Years_in_Institution' => $this->input->post('institutions_worked_number_of_years_in_institution')[$i]
						);
						$this->teacher->addTeacherTrainingExperience($teacher_training_experience);
					}*/

					$data['form_success'] = TRUE;
					$this->log->addLog('Program GCAT Tracker Added');

					$this->load->view('header');
					$this->load->view('forms/form-program-gcat-tracker', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-program-gcat-tracker', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-program-gcat-tracker', $data);
			$this->load->view('footer');
		}
	}
	
	function form_program_best_tracker()
	{

		$data['schools'] = $this->school->getAllSchools();
		

		if($this->input->post())
		{
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('student_number', 'Student Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('control_number', 'Control Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	
		
		
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-program-best-tracker', $data);
					$this->load->view('footer');
				}
				else
				{
					

					$data['form_success'] = TRUE;
					$this->log->addLog('Added BEST Tracker');

					$this->load->view('header');
					$this->load->view('forms/form-program-best-tracker', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-program-best-tracker', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-program-best-tracker', $data);
			$this->load->view('footer');
		}


	}
	
	function form_program_adept_tracker()
	{

		$data['schools'] = $this->school->getAllSchools();
		

		if($this->input->post())
		{
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('student_number', 'Student Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('control_number', 'Control Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	
		
		
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-program-adept-tracker', $data);
					$this->load->view('footer');
				}
				else
				{
					

					$data['form_success'] = TRUE;
					$this->log->addLog('Added AdEPT Tracker');

					$this->load->view('header');
					$this->load->view('forms/form-program-adept-tracker', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-program-adept-tracker', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-program-adept-tracker', $data);
			$this->load->view('footer');
		}


	}
	
	function form_program_smp_tracker()
	{
		$this->log->addLog('Updated SMP Tracker');

		$this->load->view('header');
		$this->load->view('forms/form-program-smp-tracker');
		$this->load->view('footer');
	}
	
	
	function form_program_smp_internship_tracker()
	{
		$this->log->addLog('Updated SMP Internship Tracker');

		$this->load->view('header');
		$this->load->view('forms/form-program-smp-internship-tracker');
		$this->load->view('footer');
	}
	
	
	function form_mastertrainer_classlist()
	{
		$this->log->addLog('Updated Mastertrainer Classlist');

		$this->load->view('header');
		$this->load->view('forms/form-mastertrainer-classlist');
		$this->load->view('footer');
	}
	function form_program_t3_best_tracker()
	{
		$this->log->addLog('Updated T3 BEST Tracker');

		$this->load->view('header');
		$this->load->view('forms/form-program-t3-best-tracker');
		$this->load->view('footer');
	}
	
	function form_program_t3_adept_tracker()
	{
		$this->log->addLog('Updated T3 AdEPT Tracker');

		$this->load->view('header');
		$this->load->view('forms/form-program-t3-adept-tracker');
		$this->load->view('footer');
	}

	function upload_student_profile()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_student_profile']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode(trim($row['Y']))->School_ID; //Get School ID
			$student_code = $school_id . $row['E']; //Get Code

			$student = array
			(
				'School_ID' => $school_id,
				'Last_Name' => $row['A'],
				'First_Name' => $row['B'],
				'Middle_Initial' => $row['C'],
				'Name_Suffix' => $row['D'],
				'Student_ID_Number' => $row['E'],
				'Civil_Status' => $row['G'],
				'Birthdate' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['H'], 'MM/DD/YYYY'))),
				'Birthplace' => $row['I'],
				'Gender' => $row['J'],
				'Nationality' => $row['K'],
				'Street_Number' => $row['L'],
				'Street_Name' => $row['M'],
				'City' => $row['N'],
				'Province' => $row['O'],
				'Region' => $row['P'],
				'Alternate_Address' => $row['Q'],
				'Mobile_Number' => $row['R'],
				'Landline' => $row['S'],
				'Email' => $row['T'],
				'Facebook' => $row['U'],
				'Course' => $row['V'] . ' ' . $row['W'],
				'Year' => $row['X'],
				'Expected_Year_of_Graduation' => $row['Z'],
				'DOST_Scholar' => (bool) strcasecmp($row['AA'], 'no'),
				'Scholar' => (bool) strcasecmp($row['AB'], 'no'),
				'Interested_In_ITBPO' => (bool) strcasecmp($row['AC'], 'no')
			);
			
			if (strcasecmp($row['F'], 'yes') == 0)
			{
				if (!$this->student->getStudentByCode($student_code))
				{
					$student['Code'] = $student_code;
				
					if (!$this->student->addStudent($student))
					{
						$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						redirect('dbms');
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student already exists.');
					redirect('dbms');
				}
			}
			else if (strcasecmp($row['F'], 'no') == 0)
			{
				if (!$this->student->getStudentByCode($student_code))
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student not found.');
					redirect('dbms');
				}
				$this->student->updateStudentByCode($student_code, $student);
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Column New_Applicant? invalid.');
				redirect('dbms');
			}
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'Student Profile successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' students added/updated.');
			$this->log->addLog('Student Profile Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_adept_student_product_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_adept_student_product_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode(trim($row['F']))->School_ID; //Get School_ID
			$code = $school_id . $row['E']; //Get Code
			$subject = $row['A'];

			$subject_student = array
			(
				'Control_Number' => trim($row['G']),
				'Username' => trim($row['H'])
			);
			
			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
			
			if ($subject == 'BEST')
			{
				if ($this->student->getBestStudentByStudentIdOrCode($code)) //BEST Student Tracker exists -> Update
				{
					if (!$this->student->updateBestStudent($code, $subject, $subject_student))
					{
						$this->session->set_flashdata('upload_error', 'BEST Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
				else //BEST Student Tracker does not exist -> Add
				{
					if ($this->student->getTrackerByStudentCodeAndSubjectId($code, 2)) //Tracker exists -> Get Tracker ID
					{
						$subject_student['Tracker_ID'] = $this->student->getBestTrackerByStudentIdOrCode($code);
					}
					else //Tracker does not exist -> Add Tracker and get ID
					{
						$tracker = array
						(
							'Status_ID' => 3,
							'Times_Taken' => 1,
							'Subject_ID' => 2
						);
						$tracker_id = $this->student->addTracker($tracker);

						$student_tracker = array
						(
							'Tracker_ID' => $tracker_id,
							'Student_ID' => $this->student->getStudentByCode($code)->Student_ID
						);
						$student_tracker_id = $this->student->addStudentTracker($student_tracker);

						$subject_student['Tracker_ID'] = $tracker_id;
					}

					if (!$this->student->addBestStudent($subject_student))
					{
						$this->session->set_flashdata('upload_error', 'BEST Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
			}
			elseif ($subject == 'AdEPT')
			{
				if ($this->student->getAdeptStudentByStudentIdOrCode($code)) //AdEPT Student Tracker exists -> Update
				{
					if (!$this->student->updateAdeptStudent($code, $subject, $subject_student))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
				else //AdEPT Student Tracker does not exist -> Add
				{
					if ($this->student->getTrackerByStudentCodeAndSubjectId($code, 3)) //Tracker exists -> Get Tracker ID
					{
						$subject_student['Tracker_ID'] = $this->student->getAdeptTrackerByStudentIdOrCode($code);
					}
					else //Tracker does not exist -> Add Tracker and get ID
					{
						$tracker = array
						(
							'Status_ID' => 3,
							'Times_Taken' => 1,
							'Subject_ID' => 3
						);
						$tracker_id = $this->student->addTracker($tracker);

						$student_tracker = array
						(
							'Tracker_ID' => $tracker_id,
							'Student_ID' => $this->student->getStudentByCode($code)->Student_ID
						);
						$student_tracker_id = $this->student->addStudentTracker($student_tracker);

						$subject_student['Tracker_ID'] = $tracker_id;
					}

					if (!$this->student->addAdeptStudent($subject_student))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Invalid subject.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'BEST/AdEPT Product Tracker successfully uploaded.' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' students updated.');
			$this->log->addLog('BEST AdEPT Student Product Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_adept_student_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_adept_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID
			$code = $school_id . $row['E']; //Get Code
			$subject = $row['A'];

			$tracker = array
			(
				'Contract' => $row['G'],
				'Status' => $row['H'],
				'Remarks' => $row['I'],
				'CD' => $row['J']
			);
			
			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				redirect('dbms');
			}

			if ($subject == 'BEST')
			{
				if (!$this->student->updateBestTracker($code, $subject, $tracker))
				{
					$this->session->set_flashdata('upload_error', 'BEST/AdEPT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
					redirect('dbms');
				}
			}
			elseif ($subject == 'AdEPT')
			{
				if (!$this->student->updateAdeptTracker($code, $subject, $tracker))
				{
					$this->session->set_flashdata('upload_error', 'BEST/AdEPT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
					redirect('dbms');
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Invalid subject.');
				redirect('dbms');
			}
		}

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'BEST/AdEPT Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' students added/updated.');
			$this->log->addLog('BEST AdEPT Student Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_gcat_student_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_gcat_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['E'])->School_ID; //Get School_ID
			$code = $school_id . $row['D']; //Get Code
			$subject = 'GCAT';

			$tracker = array
			(
				'Session_ID' => $row['F'],
				'Test_Date' => $row['G'],
				'Status' => $row['H']
			);

			
			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				redirect('dbms');
			}

			if (!$this->student->updateGcatStudent($code, $subject, $tracker))
			{
				$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
				redirect('dbms');
			}
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'GCAT Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' students added/updated.');
			$this->log->addLog('GCAT Student Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_smp_student_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID
			$code = $school_id . $row['E']; //Get Code
			$subject = $row['A'];

			$tracker = array
			(
				'Contract?' => $row['G'],
				'Grade' => $row['I'],
				'Status' => $row['H'],
				'Remarks' => $row['J']
			);
			
			if (!$this->student->getStudentByCode($code))
			{
				$student['Code'] = $code;

				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
				redirect('dbms');					
			}

			else if (!$this->student->updateStudentTracker($code,$subject,$tracker))
			{
				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'SMP Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 1) . ' students added/updated.');
			$this->log->addLog('SMP Student Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_internship()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_internship']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['E']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}
			
			$code = $school_id . $row['D']; //Get Code

			$intern = array
			(
				'Company_Information' => $row['G'],
				'Company_Address' => $row['H'],
				'Department' => $row['I'],
				'Supervisor_Name' => $row['J'],
				'Supervisor_Contact' => $row['K'],
				'Start_Date' => $row['L'],
				'End_Date' => $row['M'],
				'Total_Work_Hours' => $row['N'],
				'Status' => $row['P'],
				'Remarks' => $row['Q']
			);

			$subject = 'Intern';
		
			if (!$this->student->getStudentByCode($code))
			{
				$student['Code'] = $code;

				$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
				redirect('dbms');					
			}

			else if (!$this->student->updateStudentTracker	($code,$subject,$intern))
			{
				$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}
		}
		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'Internship Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 1) . ' students added/updated.');
			$this->log->addLog('SMP Internship Student Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_class_list()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_class_list']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['D']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}

			$code = $school_id . $row['D']; //Get Code

			$class = array
			(
				'Class_Name' => $row['B'],
				'Teacher' => $row['C']

			);

			$subject = $row['A'];
		
			if (!$this->student->getStudentByCode($code))
			{
				$student['Code'] = $code;

				$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
				redirect('dbms');					
			}
			else if (!$this->student->updateInternship($code,$subject,$intern))
			{
				$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'Class List successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 1) . ' students added/updated.');
			$this->log->addLog('Class List Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Class List upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_gcat_student_grades()
	{
		$this->log->addLog('GCAT Student Grades Batch Upload');
	}

	function upload_best_student_grades()// please test
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 4;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

			//-----getting the student code-------------------
			$this->db->select('Tracker_ID');
			$this->db->from('best_student');
			$this->db->where('Username', $row['D']);
			$trackerId = $this->db->get(); //to get tracker ID

			$this->db->select('Student_ID');
			$this->db->from('student_tracker');
			$this->db->where('Tracker_ID', $trackerId);
			$studentId = $this->db->get(); //to get student id 

			$this->db->select('Code');
			$this->db->from('student');
			$this->db->where('Student_ID', $studentId);
			$code = $this->db->get(); //to get student code
			//-------------------------------------------------
			
			$grades = array
			(
				'Oral' => $row['I'],
				'Retention' => $row['J'],
				'Typing' => $row['K'],
				'Grammar' => $row['L'],
				'Comprehension' => $row['M'],
				'Summary Scores' => $row['N'],
			);

			$subject = 'BEST';
			
			if (!$this->student->getStudentByCode($Code))
			{
				$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Invalid data at row ' . $counter . '. Student does not exists');
				redirect('dbms');					
			}
			else if (!$this->student->updateBestStudent($code, $subject, $trackerId))//tama bang trackerId = tracker?
			{
				$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}
		}

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'BEST Grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' teachers added/updated.');
			$this->log->addLog('BEST Grades Batch Upload');	
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_student_grades()// please test
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 4;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

			//-----getting the student code-------------------
			$this->db->select('Tracker_ID');
			$this->db->from('adept_student');
			$this->db->where('Username', $row['D']);
			$trackerId = $this->db->get(); //to get tracker ID

			$this->db->select('Student_ID');
			$this->db->from('student_tracker');
			$this->db->where('Tracker_ID', $trackerId);
			$studentId = $this->db->get(); //to get student id 

			$this->db->select('Code');
			$this->db->from('student');
			$this->db->where('Student_ID', $studentId);
			$code = $this->db->get(); //to get student code
			//-------------------------------------------------
			
			$grades = array
			(
				'Oral' => $row['I'],
				'Retention' => $row['J'],
				'Typing' => $row['K'],
				'Grammar' => $row['L'],
				'Comprehension' => $row['M'],
				'Summary Scores' => $row['N'],
			);

			$subject = 'AdEPT';
			
			if (!$this->student->getStudentByCode($Code))
			{
				$this->session->set_flashdata('upload_error', 'AdEPT Grades upload failed. Invalid data at row ' . $counter . '. Student does not exists');
				redirect('dbms');					
			}
			else if (!$this->student->updateAdeptStudent($code, $subject, $trackerId))//tama bang trackerId = tracker?
			{
				$this->session->set_flashdata('upload_error', 'AdEPT Grades upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}
		}

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' teachers added/updated.');
			$this->log->addLog('BEST Grades Batch Upload');	
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}

	//teacher//
	function upload_best_adept_product_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_adept_product_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code

			$tracker = array
			(
				'Control_Number' => $row['G'],
				'User_Name' => $row['H']
			);

			$subject = $row['A'];
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				redirect('dbms');					
			}
			$this->teacher->updateTeacherTracker($code,$subject,$tracker);
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'BEST/AdEPT Product Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher added/updated.');
			$this->log->addLog('BEST AdEPT Product Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['E'])->School_ID; //Get School_ID
	 
			$status_id = $this->status->getStatusIDByName($row['S'])->Status_ID; //Get Status_ID
			
			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['D'], 'MM/DD/YYYY'))); //Get Code

			$best_t3_tracker = array
			(
				//best tracker
				
				'Interview_Form' =>  (bool) strcasecmp($row['H'], 'no'),
				'Site_Visit_Form' =>  (bool) strcasecmp($row['I'], 'no'),
				'BEST_T3_Feedback' =>  (bool) strcasecmp($row['K'], 'no'),
				'BEST_ELearning_Feedback' =>  (bool) strcasecmp($row['J'], 'no'),
				'Best_CD' =>  (bool) strcasecmp($row['L'], 'no'),
				'Certificate_Of_Attendance' =>  (bool) strcasecmp($row['M'], 'no'),
				'Best_Certified_Trainers' =>  (bool) strcasecmp($row['N'], 'no'),
				'Task_1' => $row['O'],
				'Task_2' => $row['P'],
				'Task_3' => $row['Q'],
				'Task_4' => $row['R']
			);

			$teacher = array
			(
				//hiwalay teacher
				'teacher.Civil_Status' => $row['F']
			);		

			$t3_tracker = array
			(
				//break t3_tracker
				't3_tracker.Contract' => (bool) strcasecmp($row['G'], 'no'),
				't3_tracker.Remarks' => $row['T'],
				'Status_ID' => $status_id
			);

			$subject = "BEST";
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exists.');
				redirect('dbms');					
			}

		/*	if (!$this->teacher->updateTeacherTracker($code,$subject,$t3_tracker))
			{
				$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}*/
			$this->teacher->updateBestT3Tracker($code,$subject,$best_t3_tracker);
			$this->teacher->updateTeacherByCode($code, $teacher);
			$this->teacher->updateT3Tracker($code,$subject,$t3_tracker);
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'BEST Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher added/updated.');
			$this->log->addLog('BEST Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_T3_attendance()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_T3_attendance']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['E'])->School_ID; //Get School_ID
			
			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['D'], 'MM/DD/YYYY'))); //Get Code

			$best_t3_attendance = array
			(
				'Orientation_Day' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['H'], 'MM/DD/YYYY'))),
				'Site_Visit' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['I'], 'MM/DD/YYYY'))),
				'Day_1' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['J'], 'MM/DD/YYYY'))),
				'Day_2' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['K'], 'MM/DD/YYYY'))),
				'Day_3' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['L'], 'MM/DD/YYYY')))
			);
			
			$teacher_professional_reference = array //make this show in the update method...
			(
				'teacher_professional_reference.Phone' => $row['F'],
				'teacher_professional_reference.Email' => $row['G']
			);
			
		
			$subject = "BEST";
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Invalid data at row ' . $code . '. Teacher does not exist');
				redirect('dbms');					
			}
			$this->teacher->updateTeacherBestAttendance($code,$subject,$best_t3_attendance);
			$this->teacher->updateTeacherProfessionalReference($code,$subject,$teacher_professional_reference);
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'BEST Attendance Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher added/updated.');
			$this->log->addLog('BEST T3 Attendance Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;


			$school_id = $this->school->getSchoolIdByCode($row['D'])->School_ID; //Get School_ID
	 
			$status_id = $this->status->getStatusIDByName($row['S'])->Status_ID; //Get Status_ID

			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) .date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code

			$teacher = array
			(	
				'teacher.Civil_Status' => $row['F'], //teacher tab
				
			);

			$t3_tracker = array
			(
				't3_tracker.Remarks' => $row['T'],//t3_tracker
				't3_tracker.Contract' =>  (bool) strcasecmp($row['G'], 'no'), //t3_tracker *
				'Status_ID' => $status_id
			);
			
			$adept_t3_tracker = array
			(
				'adept_t3_tracker.Interview_Form' =>  (bool) strcasecmp($row['H'], 'no'),
				'adept_t3_tracker.Site_Visit_Form' =>  (bool) strcasecmp($row['I'], 'no'),
				'adept_t3_tracker.Adept_ELearning_Feedback' =>  (bool) strcasecmp($row['J'], 'no'),
				'adept_t3_tracker.Adept_T3_Feedback' =>  (bool) strcasecmp($row['K'], 'no'),
				'adept_t3_tracker.Manual_&_kit' =>  (bool) strcasecmp($row['L'], 'no'),
				'adept_t3_tracker.Certificate_Of_Attendance' =>  (bool) strcasecmp($row['M'], 'no'),
				'adept_t3_tracker.Adept_Certified_Trainers' =>  (bool) strcasecmp($row['N'], 'no'), //*
				'adept_t3_tracker.Lesson_Plan' => $row['O'],
				'adept_t3_tracker.Demo' => $row['P'],
				'adept_t3_tracker.Total_Weighted' => $row['Q'],
				'adept_t3_tracker.Training_Portfolio' => $row['R']//adept_t3_tracker till here
				
			);
				


			$subject = "AdEPT";
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $code . '. Teacher does not exist');
				redirect('dbms');					
			}

			$this->teacher->updateAdeptT3Tracker($code,$subject,$adept_t3_tracker);
			$this->teacher->updateTeacherByCode($code, $teacher);
			$this->teacher->updateT3Tracker($code,$subject,$t3_tracker);
			
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' students added/updated.');
			$this->log->addLog('AdEPT Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}
	function upload_adept_T3_attendance()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_T3_attendance']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['E'])->School_ID; //Get School_ID 
			
			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['D'], 'MM/DD/YYYY'))); //Get Code

			$adept_t3_attendance = array
			(
				'Orientation_Day' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['H'], 'MM/DD/YYYY'))),
				'Site_Visit' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['I'], 'MM/DD/YYYY'))),
				'GCAT' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['J'], 'MM/DD/YYYY'))),
				'Day_1' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['K'], 'MM/DD/YYYY'))),
				'Day_2' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['L'], 'MM/DD/YYYY'))),
				'Day_3' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['M'], 'MM/DD/YYYY'))),
				'Day_4' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['N'], 'MM/DD/YYYY'))),
				'Day_5' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['O'], 'MM/DD/YYYY'))),
				'Day_6' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['P'], 'MM/DD/YYYY')))
			);
			$teacher_professional_reference = array //make this show in the update method...
			(
				'teacher_professional_reference.Phone' => $row['F'],
				'teacher_professional_reference.Email' => $row['G']
			);

			$subject = "AdEPT";
			
			if (!$this->teacher->getTeacherByCode($code))
			{	
				$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				redirect('dbms');					
			}
			$this->teacher->updateTeacherAdeptAttendance($code,$subject,$adept_t3_attendance);
		}

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Attendance Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' students added/updated.');
			$this->log->addLog('AdEPT T3 Attendance Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Empty file.');
		}
		redirect('dbms');		
	}

	function upload_smp_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;
			
			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID 
			
			$status_id = $this->status->getStatusIDByName($row['G'])->Status_ID; //Get Status_ID
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code

			$t3_tracker = array
			(
				'Status_ID' => $status_id,
				't3_tracker.Remarks' => $row['H']
			);

			$subject = $row['A'];
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $code . '. Teacher does not exist');
					redirect('dbms');					
			}
			$this->teacher->updateT3Tracker($code,$subject,$t3_tracker);
		}

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'SMP Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' students added/updated.');
			$this->log->addLog('SMP Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_smp_attendance()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_attendance']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID 
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code

			$smp_t3_attendance = array
			(
				'Time_In' => (bool) strcasecmp($row['G'], 'no'),
				'AM_Snack' => (bool) strcasecmp($row['H'], 'no'),
				'Lunch' => (bool) strcasecmp($row['I'], 'no'),
				'PM_Snack' => (bool) strcasecmp($row['J'], 'no'),
				'Time_Out' => (bool) strcasecmp($row['K'], 'no'),
				'Date' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['L'], 'MM/DD/YYYY'))),
			);

			$smp_t3_attendance_tracking = array
			(
				'Event' => $row['M']
			);

			$subject = $row['A'];
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
				redirect('dbms');					
			}
			
			$this->teacher->updateTeacherSMPAttendance($code,$subject,$smp_t3_attendance);
			$this->teacher->updateTeacherSMPAttendanceTracking($code,$subject,$smp_t3_attendance_tracking);

		}

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'SMP Attendance Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' students added/updated.');
			$this->log->addLog('SMP Attendance Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_stipend_process_tracker()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_stipend_process_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID 
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1). date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code

			$stipend_tracking_list = array
			(
				'Checked_By' => $row['I'],
				'Date' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['J'], 'MM/DD/YYYY')))
			);
			$stipend_tracking = array
			(
				'Amount' => $row['G'],
				'Claimed' => (bool) strcasecmp($row['H'], 'no')
			);

			$subject = $row['A'];
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $code . '. Teacher does not exist');
				redirect('dbms');					
			}
			
			$this->teacher->updateStipendTrackingList($code, $subject, $stipend_tracking_list);
			
			$this->teacher->updateStipendTracking($code, $subject, $stipend_tracking);
		}

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'Teacher Stipend Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' Teacher added/updated.');
			$this->log->addLog('Stipend Process Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}


	function upload_gcat_grades()//parang sakto na yung logic pero di pa tested  
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_gcat_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['H']); //Get School_ID
			
			$code = $school_id . substr($row['E'],0,1). substr($row['F'],0,1). substr($row['D'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['P'], 'MM/DD/YYYY'))); //Get Code

			$grades = array
			(
				'GCAT_Basic_Skills_Test_Overall_score' => $row['X'],
				'GCAT_Total_Cognitive' => $row['Y'],
				'GCAT_English_Proficiency' => $row['Z'],
				'GCAT_Computer_Literacy' => $row['AA'],
				'GCAT_Perceptual_Speed_&_Accuracy' => $row['AB'],
				'GCAT_Behavioral_Component_Overall_Score' => $row['AC'],
				'GCAT_Communication' => $row['AD'],
				'GCAT_Learning_Orientation' => $row['AE'],
				'GCAT_Courtesy' => $row['AF'],
				'GCAT_Empathy' => $row['AG'],
				'GCAT_Reliability' => $row['AH'],
				'GCAT_Responsiveness' => $row['AI']
			);

			$subject = $row['J'];

			$tracker = $row['A'];
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Invalid data at row ' . $counter . '. Teacher does not exists');
				redirect('dbms');					
			}
			else if (!$this->teacher->updateTeacherTracker($code,$subject,$tracker))
			{
				$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}
		}

		if ($counter > 1)
		{
			$this->session->set_flashdata('upload_success', 'GCAT Grades successfully uploaded. ' . ($counter - 1) . ' of ' . ($highestRow - 1) . ' teachers added/updated.');
			$this->log->addLog('GCAT Grades Batch Upload');	
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_grades()//please test 
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

			/*//-----getting the teacher code------------------- //  username lang. yung login  id
			$this->db->select('T3_Tracker_ID');
			$this->db->from('best_t3_tracker');
			$this->db->where('User_Name', $row['D']);
			$trackerId = $this->db->get(); //to get t3 tracker ID

			$this->db->select('Teacher_ID');
			$this->db->from('teacher_t3_tracker');
			$this->db->where('T3_Tracker_ID', $trackerId);
			$teacherId = $this->db->get(); //to get teacher id 

			$this->db->select('Code');
			$this->db->from('teacher');
			$this->db->where('Teacher_ID', $teacherId);
			$code = $this->db->get(); //to get teacher code
			//-------------------------------------------------*/

			$Best_T3_Grades = array
			(
				'Oral' => $row['I'],
				'Retention' => $row['J'],
				'Typing' => $row['K'],
				'Grammar' => $row['L'],
				'Comprehension' => $row['M'],
				'Summary_Scores' => $row['N']
			);
				
			$Best_T3_Tracker = $row['D'];
			

			//$subject = 'BEST';
			
			if (!$this->teacher->getTeacherByUsernameBest($Best_T3_Tracker))
			{
				$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				redirect('dbms');
			}
			$this->teacher->uploadBestGrade($Best_T3_Tracker, $Best_T3_Grades);
		}

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'BEST Grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' teachers added/updated.');
			$this->log->addLog('GCAT Grades Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_grades()//please test
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

			/*//-----getting the teacher code-------------------
			$this->db->select('T3_Tracker_ID');
			$this->db->from('adept_t3_tracker');
			$this->db->where('User_Name', $row['D']);
			$trackerId = $this->db->get(); //to get t3 tracker ID

			$this->db->select('Teacher_ID');
			$this->db->from('teacher_t3_tracker');
			$this->db->where('T3_Tracker_ID', $trackerId);
			$teacherId = $this->db->get(); //to get teacher id 

			$this->db->select('Code');
			$this->db->from('teacher');
			$this->db->where('Teacher_ID', $teacherId);
			$code = $this->db->get(); //to get teacher code
			//-------------------------------------------------*/
			
			$Adept_T3_Grades = array
			(
				'Oral' => $row['I'],
				'Retention' => $row['J'],
				'Typing' => $row['K'],
				'Grammar' => $row['L'],
				'Comprehension' => $row['M'],
				'Summary_Scores' => $row['N']
			);
			
			$Adept_T3_Tracker = $row['D'];

			//$subject = 'AdEPT';
			
			if (!$this->teacher->getTeacherByUsernameAdept($Adept_T3_Tracker))
			{
				$this->session->set_flashdata('upload_error', 'Adept Grades upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				redirect('dbms');					
			}
			$this->teacher->uploadAdeptGrade($Adept_T3_Tracker, $Adept_T3_Grades);
		}

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' teachers added/updated.');
			$this->log->addLog('AdEPT Grades Batch Upload');	
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}
}
?>