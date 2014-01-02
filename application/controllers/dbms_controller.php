<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dbms_Controller extends CI_Controller {

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

		$this->load->view('header');
		$this->load->view('dbms', $data);
		$this->load->view('footer');
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
			$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|xss_clean');
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
			$this->form_validation->set_rules('year', 'Year', 'trim|required|integer|xss_clean');
			$this->form_validation->set_rules('expected_year_of_graduation', 'Expected Year of Graduation', 'trim|required|integer|xss_clean');
			$this->form_validation->set_rules('DOSTscholar', 'DOST Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('scholar', 'Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work', 'Work', 'trim|required|xss_clean');
			$this->form_validation->set_rules('computer', 'Computer', 'trim|required|xss_clean');
			$this->form_validation->set_rules('internet', 'Internet', 'trim|required|xss_clean');
			$this->form_validation->set_rules('contract', 'Contract', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_program[]', 'Applied Programs', 'trim|required|xss_clean');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
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
						'Course' => $this->input->post('degree_type') . " " . $this->input->post('degree'),
						'Year' => $this->input->post('year'),
						'Expected_Year_of_Graduation' => $this->input->post('expected_year_of_graduation'),
						'DOST_Scholar?' => $this->input->post('DOSTscholar'),
						'Scholar?' => $this->input->post('scholar'),
						'Interested_In_IT-BPO?' => $this->input->post('work'),
						'Own_A_Computer?' => $this->input->post('computer'),
						'Internet_Access?' => $this->input->post('internet'),
						//'Contract' => $this->input->post('contract'),//not in DB
						//'New_program[]' => $this->input->post('new_program[]'),//Other table?
						'Code' => $this->input->post('school') . $this->input->post('id_number')//concatenate school id and student id
					);

					$this->student->addStudent($student);

					$student_application = array
					(
						'Answer_1' => $this->input->post(''),
						'Answer_2' => $this->input->post(''),
						'Contract?' => $this->input->post(''),
						'Student_ID' => $this->input->post(''),
						'Project_ID' => $this->input->post(''),
						'Subject_ID' => $this->input->post('')
					);

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
		$this->load->view('header');
		$this->load->view('forms/form-teacher');
		$this->load->view('footer');
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
	
	
	

}
?>