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
	
	function form_student_profile()
	{
		$this->load->view('header');
		$this->load->view('forms/form-student-profile');
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

							case 'best_ched':
								$project_id = 2;
								$subject_id = 1;
								break;

							case 'adept_ched':
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

						$this->student->addStudentApplication($student_application);
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
		if($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile_number', 'Mobile Numver', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position', 'position', 'trim|required|xss_clean');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$this->load->view('header');
					$this->load->view('forms/form-proctor-application');
					$this->load->view('footer');
				}
				else
				{
					$data_array = array
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

					//$this->student->addStudent($data_array);

					$this->load->view('header');
					$this->load->view('forms/form-proctor-application');
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-proctor-application');
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-proctor-application');
			$this->load->view('footer');
		}	
	}

	function form_mastertrainer_application()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile_number', 'Mobile Numver', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position', 'position', 'trim|required|xss_clean');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$this->load->view('header');
					$this->load->view('forms/form-proctor-application');
					$this->load->view('footer');
				}
				else
				{
					$data_array = array
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

					//$this->student->addStudent($data_array);

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-application');
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-mastertrainer-application');
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-mastertrainer-application');
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
			$this->form_validation->set_rules('current_department', 'Current Department', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_employer', 'Current Employer', 'trim|required|xss_clean'); //School ID
			$this->form_validation->set_rules('employer_address', 'Employer Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('name_of_supervisor', 'Name of Supervisor', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position_of_supervisor', 'Position of Supervisor', 'trim|required|xss_clean');
			$this->form_validation->set_rules('supervisor_contact_details', 'Supervisor Contact Details', 'trim|required|xss_clean');
			$this->form_validation->set_rules('other_positions_held', 'Other Positions Held', 'trim|required|xss_clean');
			$this->form_validation->set_rules('classes_handling', 'Classes Handling', 'trim|required|xss_clean');
			// subjs taught 2011-present

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

							case 'best_ched':
								$project_id = 2;
								$subject_id = 1;
								break;

							case 'adept_ched':
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

						$this->student->addStudentApplication($student_application);
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
		$this->load->view('header');
		$this->load->view('forms/form-program-gcat-tracker');
		$this->load->view('footer');
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

	function upload_student_profile()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_student_profile']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();

		$counter = 0;
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter == $highestRow - 1) break;

			foreach ($this->school->getSchoolIdByNameAndBranch($row['Y'], $row['Z']) as $school) //Get School_ID
			{
				$school_id = $school->School_ID;
			}
			
			$code = $school_id . $row['E']; //Get Code

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
				'Expected_Year_of_Graduation' => $row['AA'],
				'DOST_Scholar?' => $row['AB'],
				'Scholar?' => $row['AC'],
				'Interested_In_IT-BPO?' => $row['AD']
			);
			
			if ($row['F'] == 'Yes')
			{
				if (!$this->student->getStudentByCode($code))
				{
					$student['Code'] = $code;
				
					if (!$this->student->addStudent($student))
					{
						$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter);
						redirect('dbms');
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . '. Student already exists');
					redirect('dbms');
				}
			}
			else
			{
				if (!$this->student->updateStudentByCode($code, $student))
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter);
					redirect('dbms');
				}
			}
		}

		$this->session->set_flashdata('upload_success', 'Student Profile successfully uploaded.');
		redirect('dbms');
	}
}
?>