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

	function form_student()
	{
		$data['schools'] = $this->school->getAllSchools();

		if($this->input->post())
		{
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|xss_clean');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('id_number', 'ID Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_street_number', 'Street Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_street_name', 'Street Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_province', 'Province', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_region', 'Region', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required|xss_clean');
			$this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expected_year_of_graduation', 'Expected Year of Graduation', 'trim|required|xss_clean');
			$this->form_validation->set_rules('DOSTscholar', 'DOST Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('scholar', 'Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('previous_program[]', 'Previous Programs', 'trim|required|xss_clean');
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
					$data_array = array
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
						//'Previous_program[]' => $this->input->post('previous_program[]'),//Other table?
						'Interested_In_IT-BPO?' => $this->input->post('work'),
						'Own_A_Computer?' => $this->input->post('computer'),
						'Internet_Access?' => $this->input->post('internet'),
						//'Contract' => $this->input->post('contract'),//not in DB
						//'New_program[]' => $this->input->post('new_program[]'),//Other table?
						'Code' => $this->input->post('school') . $this->input->post('id_number')//concatenate school id and student id
					);

					$this->student->addStudent($data_array);

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
}
?>