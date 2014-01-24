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

		$this->load->view('header');
		$this->load->view('dbms', $data);
		$this->load->view('footer');
	}

	function delete_student($id)
	{
		$this->student->deleteStudentById($id);
		redirect('dbms');
	}

	function delete_teacher($id)
	{
		$this->teacher->deleteTeacherById($id);
		redirect('dbms');
	}
	
	function form_student_profile($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['student'] = $this->student->getStudentById($id);

		$this->load->view('header');
		$this->load->view('forms/form-student-profile', $data);
		$this->load->view('footer');
	}
	
	
	function form_teacher_profile()
	{
		$this->load->view('header');
		$this->load->view('forms/form-teacher-profile');
		$this->load->view('footer');
	}
	
	function form_proctor_profile()
	{
		$this->load->view('header');
		$this->load->view('forms/form-proctor-profile');
		$this->load->view('footer');
	}
	
	function form_mastertrainer_profile()
	{
		$this->load->view('header');
		$this->load->view('forms/form-mastertrainer-profile');
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
						'DOST_Scholar?' => $this->input->post('DOSTscholar'),
						'Scholar?' => $this->input->post('scholar'),
						'Interested_In_IT-BPO?' => $this->input->post('work'),
						'Own_A_Computer?' => $this->input->post('computer'),
						'Internet_Access?' => $this->input->post('internet'),
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
							'Contract?' => $this->input->post('contract'),
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
		$this->load->view('header');
		$this->load->view('forms/form-teacher-best-attendance');
		$this->load->view('footer');
	}

	function form_student_best_adept_product()
	{
		$this->load->view('header');
		$this->load->view('forms/form-tracker-best-adept-encoder');
		$this->load->view('footer');
	}

	function form_teacher_best_adept_product()
	{
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
		$this->load->view('header');
		$this->load->view('forms/form-program-best-tracker');
		$this->load->view('footer');
	}
	
	function form_program_adept_tracker()
	{
		$this->load->view('header');
		$this->load->view('forms/form-program-adept-tracker');
		$this->load->view('footer');
	}
	
	function form_program_smp_tracker()
	{
		$this->load->view('header');
		$this->load->view('forms/form-program-smp-tracker');
		$this->load->view('footer');
	}
	
	
	function form_program_smp_internship_tracker()
	{
		$this->load->view('header');
		$this->load->view('forms/form-program-smp-internship-tracker');
		$this->load->view('footer');
	}
	
	
	function form_mastertrainer_classlist()
	{
		$this->load->view('header');
		$this->load->view('forms/form-mastertrainer-classlist');
		$this->load->view('footer');
	}
	function form_program_t3_best_tracker()
	{
		$this->load->view('header');
		$this->load->view('forms/form-program-t3-best-tracker');
		$this->load->view('footer');
	}
	
	function form_program_t3_adept_tracker()
	{
		$this->load->view('header');
		$this->load->view('forms/form-program-t3-adept-tracker');
		$this->load->view('footer');
	}
	

	function upload_student_profile()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_student_profile']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['Y']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}
			
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
				'Birthdate' => $row['H'],
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
				'DOST_Scholar?' => $row['AA'],
				'Scholar?' => $row['AB'],
				'Interested_In_IT-BPO?' => $row['AC']
			);
			
			if ($row['F'] == 'Yes')
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
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
					redirect('dbms');
				}
			}
			else if ($row['F'] == 'No')
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
				$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
				redirect('dbms');
			}
		}

		$this->session->set_flashdata('upload_success', 'Student Profile successfully uploaded. ' . ($counter - 3) . ' of ' . $highestRow . ' students added/updated.');
		redirect('dbms');
	}
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_adept_student_product_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}
			
			$code = $school_id . $row['E']; //Get Code

			$tracker = array
			(
				'Control_Number' => $row['G'],
				'Username' => $row['H']
			);

			$subject = $row['A'];
			
			if (!$this->student->getStudentByCode($code))
			{
				$student['Code'] = $code;

				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
				redirect('dbms');					
			}

			else if (!$this->student->updateStudentTracker($code,$subject,$tracker))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}

		$this->session->set_flashdata('upload_success', 'BEST/AdEPT Product Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_best_adept_student_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_adept_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}
			
			$code = $school_id . $row['E']; //Get Code

			$tracker = array
			(
				'Contract?' => $row['G'],
				'Status' => $row['H'],
				'Remarks' => $row['I'],
				'CD?' => $row['J']
			);

			$subject = $row['A'];
			
			if (!$this->student->getStudentByCode($code))
			{
				$student['Code'] = $code;
			
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
				redirect('dbms');					
			}

			else if (!$this->student->updateStudentTracker($code,$subject,$tracker))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Tracker upload failed. Invalid data at row ' . $counter);
				redirect('dbms');
			}

		$this->session->set_flashdata('upload_success', 'BEST/AdEPT Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_gcat_student_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_gcat_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['E']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}
			
			$code = $school_id . $row['D']; //Get Code

			$tracker = array
			(
				'Session_ID' => $row['F'],
				'Test_Date' => $row['G'],
				'Status' => $row['H']
			);

			$subject = 'GCAT';
			
				if (!$this->student->getStudentByCode($code))
				{
					$student['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->student->updateStudentTracker($code,$subject,$tracker))
				{
						$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
				}

		$this->session->set_flashdata('upload_success', 'GCAT Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_smp_student_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 
			
			$code = $school_id . $row['E']; //Get Code

			$tracker = array
			(
				'Contract?' => $row['G'],
				'Grade' => $row['I'],
				'Status' => $row['H'],
				'Remarks' => $row['J']
			);

			$subject = $row['A'];
			
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

		$this->session->set_flashdata('upload_success', 'SMP Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_internship()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_internship']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

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

		$this->session->set_flashdata('upload_success', 'Internship Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_class_list()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_class_list']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

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

			$subject = $row['A']
		
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

		$this->session->set_flashdata('upload_success', 'BEST/AdEPT Product Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_gcat_student_grades()
	{
	}

	function upload_best_student_grades()
	{
	}

	function upload_adept_student_grades()
	{
	}

//teacher//
	function upload_best_adept_product_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_adept_product_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . $row['E']; //Get Code

			$tracker = array
			(
				'Control_Number' => $row['G'],
				'Username' => $row['H']
			);

			$subject = $row['A'];
			
				if (!$this->teacher->getTeacherByCode($code))
				{
					$teacher['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->teacher->updateTeacherTracker($code,$subject,$tracker))
					{
						$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}

		$this->session->set_flashdata('upload_success', 'BEST/AdEPT Product Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_best_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['E']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 

			foreach ($this->status->getStatusIDByName($row['R']) as $status) //Get Status_ID
			{
				$status_id = $status->Status_ID;
			} 
			
			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . $row['D']; //Get Code

			$tracker = array
			(
				'Contract?' => $row['F'],
				'Interview_Form?' => $row['G'],
				'Site_Visit_Form?' => $row['H'],
				'BEST_E-Learning_Feedback' => $row['I'],
				'BEST_CD' => $row['J'],
				'Certificate_of_Attendance' => $row['K'],
				'Best_Certified_Trainers' => $row['L'],
				'Task_1' => $row['M'],
				'Task_2' => $row['O'],
				'Task_3' => $row['P'],
				'Task_4' => $row['Q'],
				'Status_ID' => $status_id,
				'Remarks' => $row['S'],
			);

			$subject = "BEST";
			
				if (!$this->teacher->getTeacherByCode($code))
				{
					$teacher['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->teacher->updateTeacherTracker($code,$subject,$tracker))
					{
						$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}

		$this->session->set_flashdata('upload_success', 'BEST Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_best_T3_attendance()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_t3_attendance']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['E']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 
			
			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . $row['D']; //Get Code

			$tracker = array
			(
				'Orientation_Day' => $row['H'],
				'Site_Visit' => $row['I'],
				'GCAT' => $row['J'],
				'Day_1' => $row['K'],
				'Day_2' => $row['L'],
				'Day_3' => $row['M']
			);

			$subject = "BEST";
			
				if (!$this->teacher->getTeacherByCode($code))
				{
					$teacher['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->teacher->updateBestTeacherAttendance($code,$subject,$tracker))
					{
						$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}

		$this->session->set_flashdata('upload_success', 'BEST Attendance Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_adept_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['E']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}

			foreach ($this->status->getStatusIDByName($row['R']) as $status) //Get Status_ID
			{
				$status_id = $status->Status_ID;
			} 

			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . $row['D']; //Get Code

			$tracker = array
			(
				'Contract?' => $row['F'],
				'Interview_Form?' => $row['G'],
				'Site_Visit_Form?' => $row['H'],
				'Adept_E-Learning_Feedback' => $row['I'],
				'Adept_T3_Feedback?' => $row['J'],
				'Manual_&_kit' => $row['K'],
				'Certificate_of_Attendance' => $row['L'],
				'Adept_Certified_Trainers' => $row['M'],
				'Lesson_Plan' => $row['N'],
				'Demo' => $row['O'],
				'Total_Weighted' => $row['P'],
				'Training_Portofolio' => $row['Q'],
				'Status_ID' => $status_id,
				'Remarks' => $row['S']
			);

			$subject = "AdEPT";
			
				if (!$this->teacher->getTeacherByCode($code))
				{
					$teacher['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->teacher->updateTeacherTracker($code,$subject,$tracker))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}

		$this->session->set_flashdata('upload_success', 'AdEPT Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_adept_T3_attendance()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_t3_attendance']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['E']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 
			
			$code = $school_id . substr($row['B'],0,1). substr($row['C'],0,1). substr($row['A'],0,1) . $row['D']; //Get Code

			$tracker = array
			(
				'Orientation_Day' => $row['H'],
				'Site_Visit' => $row['I'],
				'GCAT' => $row['J'],
				'Day_1' => $row['K'],
				'Day_2' => $row['L'],
				'Day_3' => $row['M'],
				'Day_4' => $row['N'],
				'Day_5' => $row['O'],
				'Day_6' => $row['P']
			);

			$subject = "AdEPT";
			
				if (!$this->teacher->getTeacherByCode($code))
				{
					$teacher['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->teacher->updateAdeptTeacherAttendance($code,$subject,$tracker))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}

		$this->session->set_flashdata('upload_success', 'AdEPT Attendance Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_smp_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 

			foreach ($this->status->getStatusIDByName($row['G']) as $status) //Get School_ID
			{
				$status_id = $status->Status_ID;
			} 
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . $row['E']; //Get Code

			$tracker = array
			(
				'Status_ID' => $status_id,
				'Remark' => $row['G']
			);

			$subject = $row['A'];
			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$teacher['Code'] = $code;

				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
			}

			else if (!$this->teacher->updateTeacherTracker($code,$subject,$tracker))
			{
				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
			}

		$this->session->set_flashdata('upload_success', 'SMP Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_smp_attendance()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_attendance']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			} 
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . $row['E']; //Get Code

			$tracker = array
			(
				'Time_In?' => $row['G'],
				'AM_Snack' => $row['H'],
				'Lunch?' => $row['I'],
				'PM_Snack?' => $row['J'],
				'Time_Out?' => $row['K'],
				'Date' => $row['L']
			);

			$event = array
			(
				'Event' => $row['M']
			);

			$subject = $row['A'];
			
				if (!$this->teacher->getTeacherByCode($code))
				{
					$teacher['Code'] = $code;

					$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');					
				}

				else if (!$this->teacher->addTeacherSMPAttendance($code,$subject,$tracker) && !$this->teacher->updateTeacherSMPAttendanceEvent($code,$subject,$event) )
					{
						$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}

		$this->session->set_flashdata('upload_success', 'SMP Attendance Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_stipend_process_tracker()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_stipend_process_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow) break;

			foreach ($this->school->getSchoolIdByCode($row['F']) as $school) //Get School_ID
			{ 
				$school_id = $school->School_ID;
			}
			
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . $row['E']; //Get Code

			$stipend = array
			(
				'Amount' => $row['G'],
				'Claimed?' => $row['H'],
				'Checked_By' => $row['I'],
				'Date' => $row['J']
			);

			$subject = $row['A']
		
		if($row['K'] == "Yes")
		{
			if ($this->student->getTeacherByCode($code))
			{
				$teacher['Code'] = $code;

				if (!$this->student->addStipendTracker($code, $subject, $stipend))
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipdend Tracker upload failed. Invalid data at row ' . $counter);
					redirect('dbms');
				}

				else
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');
				}
										
			}
		}
		else if ($this->student->getTeacherByCode($code))
			{
				$teacher['Code'] = $code;

				if (!$this->student->updateStipendTracker($code, $subject, $stipend))
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipdend Tracker upload failed. Invalid data at row ' . $counter);
					redirect('dbms');
				}

				else
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');
				}
										
			}

		$this->session->set_flashdata('upload_success', 'Teacher Stipend Tracker successfully uploaded.');
		redirect('dbms');
	}

	function upload_gcat_grades()
	{
	}

	function upload_best_grades()
	{
	}

	function upload_adept_grades()
	{
	}

}
}
?>