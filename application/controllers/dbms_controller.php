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
		if($this->input->post())
		{
			$this->form_validation->set_rules('id_number', 'ID Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|xss_clean');
			$this->form_validation->set_rules('applicant', 'Applicant', 'trim|required|xss_clean');
			$this->form_validation->set_rules('update', 'Update', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_street_number', 'Street Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_street_name', 'Street Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_province', 'Province', 'trim|required|xss_clean');
			$this->form_validation->set_rules('current_region', 'Region', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_street_number', 'Street Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_street_name', 'Street Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_province', 'Province', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alternate_region', 'Region', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required|xss_clean');
			$this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('branch', 'Branch', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expected_year_of_graduation', 'Expected Year of Graduation', 'trim|required|xss_clean');
			$this->form_validation->set_rules('DOSTscholar', 'DOST Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('scholar', 'Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('scholarship', 'Scholarship', 'trim|required|xss_clean');
			$this->form_validation->set_rules('program[]', 'Programs', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work', 'Work', 'trim|required|xss_clean');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$this->load->view('header');
					$this->load->view('forms/form-student');
					$this->load->view('footer');
				}
				else
				{
					$data = array
					(
						/*'username' => $this->input->post('username'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'password' => $this->input->post('password'),
						'type' => $this->input->post('type'),
						'school' => $this->input->post('school')*/
					);

					//$this->user->addUser($data);

					$this->load->view('header');
					$this->load->view('forms/form-student');
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
			$this->load->view('forms/form-student');
			$this->load->view('footer');
		}
	}
}
?>