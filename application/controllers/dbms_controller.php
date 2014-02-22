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
		$this->load->library('pagination');
		$this->load->library('table');
		
		
		$offset = $this->uri->segment(3);
		$config['total_rows'] = 30;
		$config['base_url'] =  base_url() . ('dbms/students/page/');
		$config['per_page'] = 10;
		
			

		//$this->db->limit($config['per_page'], $this->uri->segment(3, 0));
		//$this->pagination->initialize($config);
		//$data['students'] = $this->post->limit($limit, $offset)->student->getAllStudentsFormatted();	
		//$data['students'] = $this->db->get('student', $config['per_page'], $this->uri->segment(3));
		//$data['students'] = $this->student->getAllStudentsFormattedLimit($config['per_page'], $this->uri->segment(3));
		
		$data['students'] = $this->student->getAllStudentsFormatted();
		
		$data['links'] = $this->pagination->create_links();
		
		$data['schools'] = $this->school->getAllSchools();
		$data['students'] = $this->student->getAllStudentsFormatted();
		$data['teachers'] = $this->teacher->getAllTeachersFormatted();
		$data['proctors'] = $this->proctor->getAllProctorsFormatted();
		$data['mastertrainers'] = $this->mastertrainer->getAllMasterTrainersFormatted();
		$data['student_classes'] = $this->classes->getAllStudentClasses();
		$data['t3_classes'] = $this->classes->getAllT3Classes();
		$data['smp_students'] = $this->student->getAllSmpStudents();
		$data['internship_students'] = $this->student->getAllInternshipStudents();
		$data['gcat_classes'] = $this->classes->getAllGcatClassesFormatted();
		$data['best_students'] = $this->student->getAllBestStudents();
		$data['adept_students'] = $this->student->getAllAdeptStudents();
		$data['best_t3_trackers'] = $this->teacher->getAllBestT3Trackers();
		$data['adept_t3_trackers'] = $this->teacher->getAllAdeptT3Trackers();

		if ($this->input->post())
		{
			if ($this->input->post('search_student') || $this->input->post('search_teacher'))
			{
				$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
				$this->form_validation->set_rules('school', 'School', 'trim|xss_clean');
				$this->form_validation->set_rules('program[]', 'Programs', 'trim|xss_clean');

				if ($this->form_validation->run())
				{
					$params = FALSE;

					if ($this->input->post('name'))
					{
						$params['name'] = $this->input->post('name');
					}
					if ($this->input->post('school'))
					{
						$params['school'] = $this->input->post('school');
					}
					if ($this->input->post('program'))
					{
						foreach ($this->input->post('program') as $program)
						{
							switch ($program)
							{
								case 'gcat':
									$params['gcat'] = TRUE;
									break;

								case 'best':
								$params['best'] = TRUE;
								break;

								case 'adept':
								$params['adept'] = TRUE;
								break;

								case 'smp':
								$params['smp'] = TRUE;
								break;
								
								default:
									break;
							}
						}
					}

					if ($this->input->post('search_student'))
					{
						$data['students'] = $this->student->getStudentSearchResults($params);
					}
					elseif ($this->input->post('search_teacher'))
					{
						$data['teachers'] = $this->teacher->getTeacherSearchResults($params);
					}
				}
			}
		}

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

	function form_student_application()
	{
		$data['schools'] = $this->school->getAllSchools();

		if($this->input->post())
		{
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[45]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[45]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|max_length[4]|alpha|xss_clean');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|max_length[5]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('id_number', 'ID Number', 'trim|required|max_length[10]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil', 'trim|required|max_length[9]|xss_clean');
			$this->form_validation->set_rules('birthday', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|max_length[45]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|exact_length[1]|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|max_length[45]|alpha|xss_clean');
			$this->form_validation->set_rules('current_street_number', 'Street Number', 'trim|required|max_length[5]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('current_street_name', 'Street Name', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('current_city', 'City', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('current_province', 'Province', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('current_region', 'Region', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[13]|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|max_length[9]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[45]|valid_email|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required|max_length[97]|alpha_dash|xss_clean');
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
					$this->db->trans_begin();

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

					if ($this->db->_error_message())
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-student', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['form_success'] = TRUE;
						$this->log->addLog('Added Student');

						$this->load->view('header');
						$this->load->view('forms/form-student', $data);
						$this->load->view('footer');
					}
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

	function form_student_profile($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['statuses'] = $this->status->getAllStatuses();
		$data['student'] = $this->student->getStudentById($id);
		$data['gcat_tracker'] = $this->student->getGcatStudentByStudentIdOrCode($id);
		$data['best_tracker'] = $this->student->getBestStudentByStudentIdOrCode($id);
		$data['adept_tracker'] = $this->student->getAdeptStudentByStudentIdOrCode($id);
		$data['smp_tracker'] = $this->student->getSmpStudentByStudentIdOrCode($id);
		$data['internship'] = $this->student->getInternshipByStudentIdOrCode($id);
		$data['bizcom'] = $this->student->getBizComByStudentId($id);
		$data['bpo101'] = $this->student->getBpo101ByStudentId($id);
		$data['bpo102'] = $this->student->getBpo102ByStudentId($id);
		$data['sc101'] = $this->student->getSc101ByStudentId($id);
		$data['systh101'] = $this->student->getSysth101ByStudentId($id);

		if($this->input->post()) //trim at xss clean dapat meron, 
		{
			$this->form_validation->set_rules('id_number', 'ID Number', 'trim|required|max_length[10]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[45]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[45]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|max_length[4]|alpha|xss_clean');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|max_length[5]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil', 'trim|required|max_length[9]|xss_clean');
			$this->form_validation->set_rules('birthday', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|max_length[45]|alpha_numeric|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|exact_length[1]|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|max_length[45]|alpha|xss_clean');
			$this->form_validation->set_rules('street_number', 'Street Number', 'trim|required|max_length[5]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('street_name', 'Street Name', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('province', 'Province', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('region', 'Region', 'trim|required|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[13]|xss_clean');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|max_length[9]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[45]|valid_email|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|max_length[45]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|required|xss_clean');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required|max_length[97]|alpha_dash|xss_clean');
			$this->form_validation->set_rules('year', 'Year Level', 'trim|required|integer|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('expected_year_of_graduation', 'Expected Year of Graduation', 'trim|required|integer|xss_clean');
			$this->form_validation->set_rules('DOSTscholar', 'DOST Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('scholar', 'Scholar', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work', 'Work', 'trim|required|xss_clean');
			$this->form_validation->set_rules('code', 'Code', 'trim|required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-student-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

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
						'Course' => $this->input->post('degree_type') . " " . $this->input->post('degree'),
						'Year' => $this->input->post('year'),
						'Expected_Year_of_Graduation' => $this->input->post('expected_year_of_graduation'),
						'DOST_Scholar' => $this->input->post('DOSTscholar'),
						'Scholar' => $this->input->post('scholar'),
						'Interested_In_ITBPO' => $this->input->post('work'),
						'Own_A_Computer' => $this->input->post('computer'),
						'Internet_Access' => $this->input->post('internet'),
						'Code' => $this->input->post('code')
					);
					
					if ($this->student->updateStudentById($id, $student))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-student-profile', $data);
						$this->load->view('footer');
						return;
					}

					$this->db->trans_commit();

					$data['student'] = $this->student->getStudentById($id);
					$data['form_success'] = TRUE;
					$this->log->addLog('Updated Student Profile');

					$this->load->view('header');
					$this->load->view('forms/form-student-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-student-profile', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-student-profile', $data);
			$this->load->view('footer');
		}
	}

	function form_teacher_application()
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();

		if($this->input->post())
		{
			$this->form_validation->set_rules('code', 'Code', 'trim|required|xss_clean|is_unique[teacher.Code]');
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean|max_length[5]|alpha_dash');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean|max_length[1]|alpha');
			$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('total_year_teaching', 'Total Years of Teaching', 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('desktop', 'Desktop', 'trim|required|xss_clean');
			$this->form_validation->set_rules('laptop', 'Laptop', 'trim|required|xss_clean');
			$this->form_validation->set_rules('access', 'Access', 'trim|required|xss_clean');
			$this->form_validation->set_rules('street_number', 'Street Number', 'trim|required|xss_clean|max_length[5]|alpha_dash');
			$this->form_validation->set_rules('street_name', 'Street Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('province', 'Province', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|max_length[13]|alpha_dash');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required||xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|max_length[45]|valid_email');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('degree', 'Degree', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('school', 'School', 'trim|xss_clean');
			$this->form_validation->set_rules('master_type', 'MA/MS', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('master_degree', 'Masters Degree', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('master_school', 'Masters School', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('doctorate_type', 'Doctor', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('doctorate_degree', 'Doctorate Degree', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('doctorate_school', 'Doctorate School', 'trim|xss_clean');//wala po ulit sa db itong mga ito--- //
			$this->form_validation->set_rules('employment_status', 'Employment Status', 'trim|required|xss_clean|max_length[4]|alpha_dash');
			$this->form_validation->set_rules('current_position', 'Current Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('current_department', 'Current Department', 'trim|xss_clean|max_length[250]|alpha_dash');
			$this->form_validation->set_rules('current_employer', 'Current Employer', 'trim|required|xss_clean'); //School ID
			$this->form_validation->set_rules('employer_address', 'Employer Address', 'trim|xss_clean');//wala po ulit sa db itong mga to--- //
			$this->form_validation->set_rules('name_of_supervisor', 'Name of Supervisor', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('position_of_supervisor', 'Position of Supervisor', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('supervisor_contact_details', 'Supervisor Contact Details', 'trim|required|xss_clean|max_length[11]|alpha_dash');
			$this->form_validation->set_rules('other_positions_held', 'Other Positions Held', 'trim|xss_clean');//wala ata rin ito
			$this->form_validation->set_rules('classes_handling', 'Classes Handling', 'trim|xss_clean|alpha_dash');
			// Institutions
			$this->form_validation->set_rules('institutions_worked_institution[]', 'Institution', 'trim|xss_clean|max_length[250]|alpha_dash');
			$this->form_validation->set_rules('institutions_worked_position[]', 'Position', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('institutions_worked_year_started[]', 'Year Started', 'trim|xss_clean');//date siya sa db
			$this->form_validation->set_rules('institutions_worked_level_taught[]', 'Level Taught', 'trim|xss_clean|max_length[250]|alpha_dash');
			$this->form_validation->set_rules('institutions_worked_courses_taught[]', 'Courses Taught', 'trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('institutions_worked_number_of_years_in_institution[]', 'Number of Years in Institution', 'trim|xss_clean|integer');
			// Certifications
			$this->form_validation->set_rules('certifications_certification[]', 'Certification', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('certifications_certifying_body[]', 'Certifying Body', 'trim|xss_clean|max_length[250]|alpha_dash');
			$this->form_validation->set_rules('certifications_date_received[]', 'Certification Date Received', 'trim|xss_clean');
			// Awards
			$this->form_validation->set_rules('awards_award[]', 'Award', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('awards_awarding_body[]', 'Awarding Body', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('awards_date_received[]', 'Award Date Received', 'trim|xss_clean');
			// Other Work
			$this->form_validation->set_rules('other_work_organization[]', 'Organization', 'trim|xss_clean|max_length[250]|alpha_dash');
			$this->form_validation->set_rules('other_work_position[]', 'Position', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('other_work_description[]', 'Work Description', 'trim|xss_clean|max_length[250]|alpha_dash');
			$this->form_validation->set_rules('other_work_date_started[]', 'Date Started', 'trim|xss_clean');
			// Skills
			$this->form_validation->set_rules('computer_proficient_skill', 'Computer Proficiency Skills', 'trim|xss_clean');
			$this->form_validation->set_rules('computer_familiar_skill', 'Computer Familiarity', 'trim|xss_clean');
			$this->form_validation->set_rules('skill', 'Other Skills', 'trim|xss_clean');
			// Reference
			$this->form_validation->set_rules('reference_name[]', 'Reference Name', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('reference_position[]', 'Reference Position', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('reference_company[]', 'Reference Company', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('reference_phone[]', 'Reference Phone', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('reference_email[]', 'Reference Email', 'trim|xss_clean|valid_email');
			// Affiliations
			$this->form_validation->set_rules('affiliation_organization[]', 'Affiliation Organization', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('affiliation_description[]', 'Affiliation Description', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('affiliation_position[]', 'Affiliation Position', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('affiliation_years[]', 'Years of Affiliation', 'trim|xss_clean|integer');
			// Documents
			$this->form_validation->set_rules('resume', 'Resume', 'trim|required|xss_clean');
			$this->form_validation->set_rules('photo', 'Photo', 'trim|required|xss_clean');
			$this->form_validation->set_rules('proof', 'Proof of Certification', 'trim|required|xss_clean');
			$this->form_validation->set_rules('diploma', 'Diploma/TOR', 'trim|required|xss_clean');

			$this->form_validation->set_rules('program[]', 'Programs Applied For', 'trim|xss_clean');
			if ($this->input->post('program'))
			{
				foreach ($this->input->post('program') as $program)
				{
					if ($program == 'best_adept')// BEST/AdEPT Application
					{
						$this->form_validation->set_rules('best_adept_application_date', 'BEST/AdEPT Application Date', 'trim|required|xss_clean');
						$this->form_validation->set_rules('best_adept_subject', 'BEST/AdEPT Subject', 'trim|required|xss_clean|is_unique[t3_application.Subject_ID]');
						$this->form_validation->set_rules('best_adept_answer_1', 'BEST/AdEPT Answer 1', 'trim|required|xss_clean|alpha_dash');
						$this->form_validation->set_rules('best_adept_answer_2', 'BEST/AdEPT Answer 2', 'trim|required|xss_clean|alpha_dash');
						$this->form_validation->set_rules('best_adept_answer_3', 'BEST/AdEPT Answer 3', 'trim|required|xss_clean|alpha_dash');
					}
					elseif ($program == 'smp')// SMP Application
					{
						$this->form_validation->set_rules('smp_application_date', 'SMP Application Date', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_subject', 'SMP Subject', 'trim|required|xss_clean|is_unique[t3_application.Subject_ID');
						$this->form_validation->set_rules('smp_answer_1', 'SMP Answer 1', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_answer_2', 'SMP Answer 2', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_subjects_handled', 'SMP Subjects Handled', 'trim|required|xss_clean|integer');
						$this->form_validation->set_rules('smp_years_teaching', 'SMP Years Teaching', 'trim|required|xss_clean|integer');
						$this->form_validation->set_rules('smp_years_teaching_current', 'SMP Years Teaching in Current Institution', 'trim|required|xss_clean|integer');
						$this->form_validation->set_rules('smp_students_per_class', 'SMP Average Students per Class', 'trim|required|xss_clean|integer');
						$this->form_validation->set_rules('smp_support_offices', 'SMP Support Offices', 'trim|required|xss_clean|alpha_dash');
						$this->form_validation->set_rules('smp_materials_support', 'SMP Materials Support', 'trim|required|xss_clean|alpha_dash');
						$this->form_validation->set_rules('smp_technology_support', 'SMP Technology Supprt', 'trim|required|xss_clean|alpha_dash');
						$this->form_validation->set_rules('smp_laboratory', 'SMP Laboratory', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_internet', 'SMP Internet Access', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_contract', 'SMP Contract', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_self_assessment_bizcom', 'SMP BizCom Self Assessment Form', 'trim|required|xss_clean');
						$this->form_validation->set_rules('smp_self_assessment_sc', 'SMP SC101 Self Assessment Form', 'trim|required|xss_clean');
						$this->form_validation->set_rules('training[]', 'Related Training', 'trim|xss_clean|max_length[45]|alpha_dash');
						$this->form_validation->set_rules('training_body[]', 'Related Training Body', 'trim|xss_clean|max_length[250]|alpha_dash');
						$this->form_validation->set_rules('training_date[]', 'Related Training Date', 'trim|xss_clean');
					}
				}
			}

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
					$this->db->trans_begin();

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
						'Desktop' => $this->input->post('desktop'),
						'Laptop' => $this->input->post('laptop'),
						'Internet' => $this->input->post('access'),
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
						'Resume' => $this->input->post('resume'),
						'Photo' => $this->input->post('photo'),
						'Proof_of_Certification' => $this->input->post('proof'),
						'Diploma_TOR' => $this->input->post('diploma')
					);
					$teacher_id = $this->teacher->addTeacher($teacher);

					if ($this->input->post('institutions_worked_institution')) for ($i = 0; $i < count($this->input->post('institutions_worked_institution')); $i++)
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

					if ($this->input->post('certifications_certification')) for ($i = 0; $i < count($this->input->post('certifications_certification')); $i++)
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

					if ($this->input->post('awards_award')) for ($i = 0; $i < count($this->input->post('awards_award')); $i++)
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

					if ($this->input->post('other_work_organization')) for ($i = 0; $i < count($this->input->post('other_work_organization')); $i++)
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

					if ($this->input->post('reference_name')) for ($i = 0; $i < count($this->input->post('reference_name')); $i++)
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

					if ($this->input->post('affiliation_organization')) for ($i = 0; $i < count($this->input->post('affiliation_organization')); $i++)
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

					if ($this->input->post('program'))
					{
						foreach ($this->input->post('program') as $program)
						{
							if ($program == 'best_adept')
							{
								switch ($this->input->post('best_adept_subject'))
								{
									case 'best':
										$subject_id = 2;
										break;
									
									case 'adept':
										$subject_id = 3;
										break;

									case 'both':
										$subject_id = 8;
										break;

									default:
										break;
								}

								$t3_application = array
								(
									'Date' => $this->input->post('best_adept_application_date'),
									'Subject_ID' => $subject_id
								);
								$t3_application_id = $this->teacher->addT3Application($t3_application);

								$teacher_t3_application = array
								(
									'Teacher_ID' => $teacher_id,
									'T3_Application_ID' => $t3_application_id
								);
								$this->teacher->addTeacherT3Application($teacher_t3_application);

								$best_adept_t3_application = array
								(
									'T3_Application_ID' => $t3_application_id,
									'Answer_1' => $this->input->post('best_adept_answer_1'),
									'Answer_2' => $this->input->post('best_adept_answer_2'),
									'Answer_3' => $this->input->post('best_adept_answer_3')
									// 'Contract' => $this->input->post('best_adept_contract')
								);
								$this->teacher->addBestAdeptT3Application($best_adept_t3_application);

								$t3_tracker = array
								(
									'Status_ID' => 3,
									// 'Contract' => $this->input->post('best_adept_contract'),
									'Subject_ID' => $subject_id
								);
								$t3_tracker_id = $this->teacher->addT3Tracker($t3_tracker);

								$teacher_t3_tracker = array
								(
									'T3_Tracker_ID' => $t3_tracker_id,
									'Teacher_ID' => $teacher_id
								);
								$this->teacher->addTeacherT3Tracker($teacher_t3_tracker);

								if ($subject_id == 2 || $subject_id == 8)
								{
									$best_t3_tracker = array
									(
										'T3_Tracker_ID' => $t3_tracker_id,
										'Best_T3_Attendance_ID' => $this->teacher->addBestT3Attendance(),
										'Best_T3_Grades_ID' => $this->teacher->addBestT3Grades()
									);
									$this->teacher->addBestT3Tracker($best_t3_tracker);
								}

								if ($subject_id == 3 || $subject_id == 8)
								{
									$adept_t3_tracker = array
									(
										'T3_Tracker_ID' => $t3_tracker_id,
										'Adept_T3_Attendance_ID' => $this->teacher->addAdeptT3Attendance(),
										'Adept_T3_Grades_ID' => $this->teacher->addAdeptT3Grades()
									);
									$this->teacher->addAdeptT3Tracker($adept_t3_tracker);
								}
							}
							elseif ($program == 'smp')
							{
								$t3_application = array
								(
									'Date' => $this->input->post('smp_application_date'),
									'Subject_ID' => $this->input->post('smp_subject')
								);
								$t3_application_id = $this->teacher->addT3Application($t3_application);

								$teacher_t3_application = array
								(
									'Teacher_ID' => $teacher_id,
									'T3_Application_ID' => $t3_application_id
								);
								$this->teacher->addTeacherT3Application($teacher_t3_application);

								$smp_t3_application = array
								(
									'T3_Application_ID' => $t3_application_id,
									'Answer_1' => $this->input->post('smp_answer_1'),
									'Answer_2' => $this->input->post('smp_answer_2'),
									'Total_Number_Of_Subjects_Handled' => $this->input->post('smp_subjects_handled'),
									'Years_Teaching' => $this->input->post('smp_years_teaching'),
									'Years_Teaching_In_Current_Institution' => $this->input->post('smp_years_teaching_current'),
									'Avg_Student_Per_Class' => $this->input->post('smp_students_per_class'),
									'Support_Offices_Available' => $this->input->post('smp_support_offices'),
									'Instructional_Materials_Support' => $this->input->post('smp_materials_support'),
									'Technology_Support' => $this->input->post('smp_technology_support'),
									'Readily_Use_Lab' => $this->input->post('smp_laboratory'),
									'Internet_Services' => $this->input->post('smp_internet'),
									'Self_Assessment_Form_Business_Communication' => $this->input->post('smp_self_assessment_bizcom'),
									'Self_Assessment_Form_Service_Culture' => $this->input->post('smp_self_assessment_sc'),
									'Contract' => $this->input->post('smp_contract'),
								);
								$this->teacher->addSmpT3Application($smp_t3_application);

								$t3_tracker = array
								(
									'Status_ID' => 3,
									// 'Contract' => $this->input->post('smp_contract'),
									'Subject_ID' => $this->input->post('smp_subject')
								);
								$t3_tracker_id = $this->teacher->addT3Tracker($t3_tracker);

								$teacher_t3_tracker = array
								(
									'T3_Tracker_ID' => $t3_tracker_id,
									'Teacher_ID' => $teacher_id
								);
								$this->teacher->addTeacherT3Tracker($teacher_t3_tracker);

								/*$smp_t3_attendance_tracking = array
								(
									'SMP_T3_Attendance_ID' => $this->teacher->addSmpT3Application($smp_t3_application),
									'T3_Tracker_ID' => $t3_tracker_id
								);
								$this->teacher->addSmpT3AttendanceTracking($smp_t3_attendance_tracking);*/

								if ($this->input->post('training')) for ($i = 0; $i < count($this->input->post('training')); $i++)
								{ 
									$related_training_attended = array
									(
										'Teacher_ID' => $teacher_id,
										'Training' => $this->input->post('training')[$i],
										'Training_Body' => $this->input->post('training_body')[$i],
										'Training_Date' => $this->input->post('training_date')[$i]
									);
									$this->teacher->addRelatedTrainingsAttended($related_training_attended);
								}
							}
						}
					}

					if ($this->db->_error_message())
					{
						$this->db->trans_rollback();

						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-application', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();

						$data['form_success'] = TRUE;
						$this->log->addLog('Added Teacher');

						$this->load->view('header');
						$this->load->view('forms/form-teacher-application', $data);
						$this->load->view('footer');
					}
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

	function form_teacher_profile($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
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
		$data['stipends'] = $this->teacher->getStipendsByTeacherIdOrCode($id);
		$data['best_adept_application'] = $this->teacher->getBestAdeptT3ApplicationByTeacherIdOrCode($id);
		$data['smp_application'] = $this->teacher->getSmpT3ApplicationByTeacherIdOrCode($id);
		$data['related_trainings'] = $this->teacher->getRelatedTrainingsByTeacherId($id);

		if($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('code', 'Code', 'trim|required|max_length[45]|xss_clean|alpha_dash');
				$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean|max_length[5]|alpha_dash');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean|max_length[1]|alpha_dash');
				$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|xss_clean');
				$this->form_validation->set_rules('birthplace', 'Birthplace', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('total_year_teaching', 'Total Years of Teaching', 'trim|required|xss_clean|integer');
				$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean|max_length[9]|alpha_dash');
				$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('desktop', 'Desktop', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('laptop', 'Laptop', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('access', 'Access', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('street_number', 'Street Number', 'trim|required|xss_clean|max_length[5]|alpha_dash');
				$this->form_validation->set_rules('street_name', 'Street Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('province', 'Province', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('region', 'Region', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('alternate_address', 'Alternate Address', 'trim|xss_clean');
				$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|max_length[13]|alpha_dash');
				$this->form_validation->set_rules('landline', 'Landline', 'trim|required||xss_clean|max_length[9]|alpha_dash');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|max_length[45]|valid_email');
				$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('degree_type', 'AB/BS', 'trim|xss_clean|max_length[45]');//nawawala sa db pakshit
				$this->form_validation->set_rules('degree', 'Degree', 'trim|xss_clean|max_length[250]');//nawawala sa db pakshit
				$this->form_validation->set_rules('school', 'School', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('master_type', 'MA/MS', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('master_degree', 'Masters Degree', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('master_school', 'Masters School', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('doctorate_type', 'Doctor', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('doctorate_degree', 'Doctorate Degree', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('doctorate_school', 'Doctorate School', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('employment_status', 'Employment Status', 'trim|required|xss_clean|max_length[4]');
				$this->form_validation->set_rules('current_position', 'Current Position', 'trim|required|xss_clean|max_length[45]');
				$this->form_validation->set_rules('current_department', 'Current Department', 'trim|xss_clean|max_length[250]');
				$this->form_validation->set_rules('current_employer', 'Current Employer', 'trim|required|xss_clean'); //nawawala sa db pakshit
				$this->form_validation->set_rules('employer_address', 'Employer Address', 'trim|xss_clean'); //nawawala sa db pakshit
				$this->form_validation->set_rules('name_of_supervisor', 'Name of Supervisor', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('position_of_supervisor', 'Position of Supervisor', 'trim|xss_clean|max_length[250]|alpha_dash');
				$this->form_validation->set_rules('supervisor_contact_details', 'Supervisor Contact Details', 'trim|required|xss_clean|max_length[11]');
				$this->form_validation->set_rules('other_positions_held', 'Other Positions Held', 'trim|xss_clean');//nawawala sa db pakshit
				$this->form_validation->set_rules('classes_handling', 'Classes Handling', 'trim|xss_clean');

				$this->form_validation->set_rules('computer_proficient_skill', 'Computer Proficiency Skills', 'trim|xss_clean|max_length[11]|alpha_dash');
				$this->form_validation->set_rules('computer_familiar_skill', 'Computer Familiarity', 'trim|xss_clean|max_length[11]|alpha_dash');
				$this->form_validation->set_rules('skill', 'Other Skills', 'trim|xss_clean|max_length[11]|alpha_dash');

				$this->form_validation->set_rules('resume', 'Resume', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('photo', 'Photo', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('proof', 'Proof of Certification', 'trim|required|xss_clean|max_length[1]');
				$this->form_validation->set_rules('diploma', 'Diploma/TOR', 'trim|required|xss_clean|max_length[1]');

				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

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
						'Desktop' => $this->input->post('desktop'),
						'Laptop' => $this->input->post('laptop'),
						'Internet' => $this->input->post('access'),
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
						'Resume' => $this->input->post('resume'),
						'Photo' => $this->input->post('photo'),
						'Proof_of_Certification' => $this->input->post('proof'),
						'Diploma_TOR' => $this->input->post('diploma')
					);

					if ($this->teacher->updateTeacherById($id, $teacher))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
						return;
					}

					$this->db->trans_commit();

					$data['teacher'] = $this->teacher->getTeacherById($id);
					$data['form_success'] = TRUE;
					$this->log->addLog('Updated Teacher Profile');

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('institutions_worked_add'))
			{
				$this->form_validation->set_rules('institutions_worked_institution_input', 'Institution', 'trim|required|xss_clean|max_length[250]|alpha_dash');
				$this->form_validation->set_rules('institutions_worked_position_input', 'Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('institutions_worked_year_started_input', 'Year Started', 'trim|required|numeric|xss_clean');//-----//
				$this->form_validation->set_rules('institutions_worked_level_taught_input', 'Level Taught', 'trim|required|xss_clean|max_length[250]|alpha_dash');
				$this->form_validation->set_rules('institutions_worked_courses_taught_input', 'Courses Taught', 'trim|required|xss_clean');
				$this->form_validation->set_rules('institutions_worked_number_of_years_in_institution_input', 'Number of Years in Institution', 'trim|required|numeric|xss_clean|integer');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_training_experience = array
					(
						'Teacher_ID' => $id,
						'Institution' => $this->input->post('institutions_worked_institution_input'),
						'Position' => $this->input->post('institutions_worked_position_input'),
						'Date' => $this->input->post('institutions_worked_year_started_input'),
						'Level_Taught' => $this->input->post('institutions_worked_level_taught_input'),
						'Courses_Taught' => $this->input->post('institutions_worked_courses_taught_input'),
						'Number_of_Years_in_Institution' => $this->input->post('institutions_worked_number_of_years_in_institution_input')
					);

					if (!$this->teacher->addTeacherTrainingExperience($teacher_training_experience))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['training_experiences'] = $this->teacher->getTrainingExperiencesByTeacherId($id);
						$data['form_success'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('institutions_worked_delete'))
			{
				$this->form_validation->set_rules('institutions_worked_id[]', 'Institutions Worked', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('institutions_worked_id') as $key)
					{
						$this->teacher->deleteTeacherTrainingExperienceById($key);
					}

					$data['training_experiences'] = $this->teacher->getTrainingExperiencesByTeacherId($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('certification_add'))
			{
				$this->form_validation->set_rules('certifications_certification_input', 'Certification', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('certifications_certifying_body_input', 'Certifying Body', 'trim|required|xss_clean|max_length[250]|alpha_dash');
				$this->form_validation->set_rules('certifications_date_received_input', 'Certification Date Received', 'trim|required|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_certification = array
					(
						'Teacher_ID' => $id,
						'Certification' => $this->input->post('certifications_certification_input'),
						'Certifying_Body' => $this->input->post('certifications_certifying_body_input'),
						'Date_Received' => $this->input->post('certifications_date_received_input')
					);

					if (!$this->teacher->addTeacherCertification($teacher_certification))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['certifications'] = $this->teacher->getCertificationsByTeacherId($id);
						$data['form_success'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('certification_delete'))
			{
				$this->form_validation->set_rules('certification_id[]', 'Certifications', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('certification_id') as $key)
					{
						$this->teacher->deleteTeacherCertificationById($key);
					}

					$data['certifications'] = $this->teacher->getCertificationsByTeacherId($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('award_add'))
			{
				$this->form_validation->set_rules('awards_award_input', 'Award', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('awards_awarding_body_input', 'Awarding Body', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('awards_date_received_input', 'Award Date Received', 'trim|required|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_awards = array
					(
						'Teacher_ID' => $id,
						'Award' => $this->input->post('awards_award_input'),
						'Awarding_Body' => $this->input->post('awards_awarding_body_input'),
						'Date_Received' => $this->input->post('awards_date_received_input')
					);

					if (!$this->teacher->addTeacherAwards($teacher_awards))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['awards'] = $this->teacher->getAwardsByTeacherId($id);
						$data['form_success'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('award_delete'))
			{
				$this->form_validation->set_rules('award_id[]', 'Awards', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('award_id') as $key)
					{
						$this->teacher->deleteTeacherAwardsById($key);
					}

					$data['awards'] = $this->teacher->getAwardsByTeacherId($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('other_work_add'))
			{
				$this->form_validation->set_rules('other_work_organization_input', 'Organization', 'trim|required|xss_clean|max_length[250]|alpha_dash');
				$this->form_validation->set_rules('other_work_position_input', 'Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('other_work_description_input', 'Work Description', 'trim|required|xss_clean|max_length[250]|alpha_dash');
				$this->form_validation->set_rules('other_work_date_started_input', 'Date Started', 'trim|required|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_relevant_experiences = array
					(
						'Teacher_ID' => $id,
						'Organization' => $this->input->post('other_work_organization_input'),
						'Position' => $this->input->post('other_work_position_input'),
						'Description' => $this->input->post('other_work_description_input'),
						'Date' => $this->input->post('other_work_date_started_input')
					);

					if (!$this->teacher->addTeacherRelevantExperiences($teacher_relevant_experiences))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['relevant_experiences'] = $this->teacher->getRelevantExperiencesByTeacherId($id);
						$data['form_success'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('other_work_delete'))
			{
				$this->form_validation->set_rules('other_work_id[]', 'Other Work', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('other_work_id') as $key)
					{
						$this->teacher->deleteTeacherRelevantExperiencesById($key);
					}

					$data['relevant_experiences'] = $this->teacher->getRelevantExperiencesByTeacherId($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('reference_add'))
			{
				$this->form_validation->set_rules('reference_name_input', 'Reference Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('reference_position_input', 'Reference Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('reference_company_input', 'Reference Company', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('reference_phone_input', 'Reference Phone', 'trim|required|xss_clean|max_length[11]|alpha_dash');
				$this->form_validation->set_rules('reference_email_input', 'Reference Email', 'trim|required|xss_clean|max_length[45]|valid_email');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_professional_reference = array
					(
						'Teacher_ID' => $id,
						'Name' => $this->input->post('reference_name_input'),
						'Position' => $this->input->post('reference_position_input'),
						'Company' => $this->input->post('reference_company_input'),
						'Phone' => $this->input->post('reference_phone_input'),
						'Email' => $this->input->post('reference_email_input')
					);

					if (!$this->teacher->addTeacherProfessionalReference($teacher_professional_reference))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['professional_references'] = $this->teacher->getProfessionalReferencesByTeacherId($id);
						$data['form_success'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('reference_delete'))
			{
				$this->form_validation->set_rules('reference_id[]', 'Professional References', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('reference_id') as $key)
					{
						$this->teacher->deleteTeacherProfessionalReferenceById($key);
					}

					$data['professional_references'] = $this->teacher->getProfessionalReferencesByTeacherId($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('affiliation_to_organization_add'))
			{
				$this->form_validation->set_rules('affiliation_organization_input', 'Affiliation Organization', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('affiliation_description_input', 'Affiliation Description', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('affiliation_position_input', 'Affiliation Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('affiliation_years_input', 'Years of Affiliation', 'trim|required|numeric|xss_clean|integer');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_affiliation_to_organization = array
					(
						'Teacher_ID' => $id,
						'Organization' => $this->input->post('affiliation_organization_input'),
						'Description' => $this->input->post('affiliation_description_input'),
						'Positions' => $this->input->post('affiliation_position_input'),
						'Years_Affiliated' => $this->input->post('affiliation_years_input')
					);
					if (!$this->teacher->addTeacherAffiliationToOrganization($teacher_affiliation_to_organization))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['affiliation_to_organizations'] = $this->teacher->getAffiliationToOrganizationsByTeacherId($id);
						$data['form_success'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-teacher-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('affiliation_to_organization_delete'))
			{
				$this->form_validation->set_rules('affiliation_to_organization_id[]', 'Affiliation to Organization', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('affiliation_to_organization_id') as $key)
					{
						$this->teacher->deleteTeacherAffiliationToOrganizationById($key);
					}

					$data['affiliation_to_organizations'] = $this->teacher->getAffiliationToOrganizationsByTeacherId($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-teacher-profile', $data);
					$this->load->view('footer');
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-teacher-profile', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-teacher-profile', $data);
			$this->load->view('footer');
		}
	}

	function form_proctor_application()
	{
		$data = array();

		if($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean|max_length[4]|alpha_dash');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean|max_length[5]|alpha_dash');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|xss_clean|max_length[13]|alpha_dash');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean|max_length[255]');
			$this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');

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
					$this->db->trans_begin();

					$proctor = array
					(
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Gender' => $this->input->post('gender'),
						'Civil_Status' => $this->input->post('civil'),
						'Mobile_Number' => $this->input->post('mobile_number'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Company_Name' => $this->input->post('company_name'),
						'Company_Address' => $this->input->post('company_address'),
						'Position' => $this->input->post('position'),
					);

					if (!$this->proctor->addProctor($proctor))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-proctor-application', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['form_success'] = TRUE;
						$this->log->addLog('Added Proctor');

						$this->load->view('header');
						$this->load->view('forms/form-proctor-application', $data);
						$this->load->view('footer');
					}
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

	function form_proctor_profile($id)
	{
		$data['proctor'] = $this->proctor->getProctorById($id);

		if ($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|max_length[4]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|max_length[5]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|max_length[13]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|max_length[9]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[45]|valid_email|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|max_length[255]|xss_clean');
			$this->form_validation->set_rules('position', 'Position', 'trim|required|max_length[45]|xss_clean|alpha_dash');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-proctor-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$proctor = array
					(
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Gender' => $this->input->post('gender'),
						'Civil_Status' => $this->input->post('civil'),
						'Mobile_Number' => $this->input->post('mobile_number'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Company_Name' => $this->input->post('company_name'),
						'Company_Address' => $this->input->post('company_address'),
						'Position' => $this->input->post('position'),
					);

					if($this->proctor->updateProctorById($id, $proctor))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-proctor-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['proctor'] = $this->proctor->getProctorById($id);
						$data['form_success'] = TRUE;
						$this->log->addLog('Updated Proctor');

						$this->load->view('header');
						$this->load->view('forms/form-proctor-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-proctor-profile', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-proctor-profile', $data);
			$this->load->view('footer');
		}
	}

	function form_mastertrainer_application()
	{
		$data = array();

		if($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|xss_clean|max_length[4]|alpha_dash');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|xss_clean|max_length[3]|alpha');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|xss_clean|max_length[13]|alpha_dash');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean|max_length[100]|alpha_dash');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean|max_length[45]|alpha_dash');

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
					$this->db->trans_begin();

					$mastertrainer = array
					(
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Gender' => $this->input->post('gender'),
						'Civil_Status' => $this->input->post('civil'),
						'Mobile_Number' => $this->input->post('mobile_number'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Company_Name' => $this->input->post('company_name'),
						'Company_Address' => $this->input->post('company_address'),
						'Position' => $this->input->post('position'),
					);

					if (!$this->mastertrainer->addMasterTrainer($mastertrainer))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-application', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['form_success'] = TRUE;
						$this->log->addLog('Added Master Trainer');

						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-application', $data);
						$this->load->view('footer');
					}
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

	function form_mastertrainer_profile($id)
	{
		$data['mastertrainer'] = $this->mastertrainer->getMasterTrainerById($id);

		if ($this->input->post())
		{
			$this->form_validation->set_rules('name_suffix', 'Name Suffix', 'trim|max_length[4]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial', 'trim|required|max_length[3]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('civil', 'Civil Status', 'trim|required|xss_clean|max_length[9]|alpha_dash');
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|max_length[13]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required|max_length[9]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[45]|valid_email|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|max_length[45]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|max_length[100]|xss_clean|alpha_dash');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('position', 'Position', 'trim|required|max_length[45]|xss_clean|alpha_dash');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-profile', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$mastertrainer = array
					(
						'Name_Suffix' => $this->input->post('name_suffix'),
						'Last_Name' => $this->input->post('last_name'),
						'First_Name' => $this->input->post('first_name'),
						'Middle_Initial' => $this->input->post('middle_initial'),
						'Gender' => $this->input->post('gender'),
						'Civil_Status' => $this->input->post('civil'),
						// 'Birthdate' => $this->input->post('birthday'),
						'Mobile_Number' => $this->input->post('mobile_number'),
						'Landline' => $this->input->post('landline'),
						'Email' => $this->input->post('email'),
						'Facebook' => $this->input->post('facebook'),
						'Company_Name' => $this->input->post('company_name'),
						'Company_Address' => $this->input->post('company_address'),
						'Position' => $this->input->post('position'),
					);

					if($this->mastertrainer->updateMasterTrainerById($id, $mastertrainer))
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-profile', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['mastertrainer'] = $this->mastertrainer->getMasterTrainerById($id);
						$data['form_success'] = TRUE;
						$this->log->addLog('Updated Proctor');

						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-profile', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-mastertrainer-profile', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-mastertrainer-profile', $data);
			$this->load->view('footer');
		}
	}

	function form_class_add()
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
		if (!empty($_FILES['file_student_class_list']['tmp_name'])) $data['class_list'] = $this->upload_student_class_list();

		if ($this->input->post())
		{
			$this->form_validation->set_rules('code', 'Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('teacher_last_name', 'Teacher\'s Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('teacher_first_name', 'Teacher\'s First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('teacher_middle_initial', 'Teacher\'s Middle Initial', 'trim|required|xss_clean|max_length[1]|alpha');
			$this->form_validation->set_rules('teacher_email', 'Teacher\'s Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('teacher_birthdate', 'Teacher\'s Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('semester', 'Semester', 'trim|required|xss_clean|integer');
			$this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean|max_length[10]|alpha_dash');
			$this->form_validation->set_rules('section', 'Section', 'trim|required|xss_clean|max_length[45]|alpha_dash');

			$this->form_validation->set_rules('last_name[]', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('first_name[]', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
			$this->form_validation->set_rules('middle_initial[]', 'Middlte Initial', 'trim|required|xss_clean|max_length[1]|alpha');
			$this->form_validation->set_rules('student_number[]', 'Student Number', 'trim|required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			
			if ($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-class-add', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$school_id = $this->input->post('school');
					$teacher = $this->teacher->getTeacherByCode($this->input->post('code'));

					if (!$teacher)
					{
						$data['teacher_not_found'] = TRUE;
						$this->db->trans_rollback();
						$this->load->view('header');
						$this->load->view('forms/form-class-add', $data);
						$this->load->view('footer');
						return;
					}

					$class = array
					(
						'Name' => $this->input->post('section'),
						'School_Year' => $this->input->post('year'),
						'Semester' => $this->input->post('semester'),
						'School_ID' => $school_id,
						'Subject_ID' => $this->input->post('subject')
					);
					$class_id = $this->classes->addClass($class);

					$other_class = array
					(
						'Class_ID' => $class_id,
						'Teacher_ID' => $teacher->Teacher_ID
					);
					$this->classes->addOtherClass($other_class);

					for ($i = 0; $i < count($this->input->post('student_number')); $i++)
					{
						$student_code = $school_id . $this->input->post('student_number')[$i];
						$student = $this->student->getStudentByCode($student_code);

						if (!$student)
						{
							$data['student_not_found'] = TRUE;
							$this->db->trans_rollback();
							$this->load->view('header');
							$this->load->view('forms/form-class-add', $data);
							$this->load->view('footer');
							return;
						}

						$student_class = array
						(
							'Class_ID' => $class_id,
							'Student_ID' => $student->Student_ID
						);
						$this->classes->addStudentClass($student_class);

						if ($this->db->_error_message())
						{
							$data['student_not_found'] = TRUE;
							$this->db->trans_rollback();
							$this->load->view('header');
							$this->load->view('forms/form-class-add', $data);
							$this->load->view('footer');
							return;
						}
					}

					$this->db->trans_commit();

					$data['form_success'] = TRUE;
					$this->log->addLog('Added Class List');

					$this->load->view('header');
					$this->load->view('forms/form-class-add', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-class-add', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-class-add', $data);
			$this->load->view('footer');
		}
	}

	function form_class($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
		$data['class'] = $this->classes->getOtherClassById($id);
		$data['students'] = $this->classes->getOtherClassStudentsById($id);

		if ($this->input->post())
		{
			if ($this->input->post('add_student'))
			{
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('middle_initial', 'Middlte Initial', 'trim|required|xss_clean|max_length[1]|alpha');
				$this->form_validation->set_rules('student_number', 'Student Number', 'trim|required|xss_clean');

				$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
				
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-class', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$school_id = $data['class']->School_ID;

					$student_code = $school_id . $this->input->post('student_number');
					$student = $this->student->getStudentByCode($student_code);

					if (!$student)
					{
						$data['student_not_found'] = TRUE;
						$this->db->trans_rollback();
						$this->load->view('header');
						$this->load->view('forms/form-class', $data);
						$this->load->view('footer');
						return;
					}

					$student_class = array
					(
						'Class_ID' => $id,
						'Student_ID' => $student->Student_ID
					);
					$this->classes->addStudentClass($student_class);

					if ($this->db->_error_message())
					{
						$data['student_not_found'] = TRUE;
						$this->db->trans_rollback();
						$this->load->view('header');
						$this->load->view('forms/form-class', $data);
						$this->load->view('footer');
						return;
					}

					$this->db->trans_commit();

					$data['students'] = $this->classes->getOtherClassStudentsById($id);
					$data['form_success'] = TRUE;
					$this->log->addLog('Updated Class List');

					$this->load->view('header');
					$this->load->view('forms/form-class', $data);
					$this->load->view('footer');
				}
				
			}
			elseif ($this->input->post('delete_student'))
			{
				$this->form_validation->set_rules('student_id[]', 'Student', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-class', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('student_id') as $key)
					{
						$this->classes->deleteStudentClassById($key);
					}

					$data['students'] = $this->classes->getOtherClassStudentsById($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-class', $data);
					$this->load->view('footer');
				}
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-class', $data);
			$this->load->view('footer');
		}
	}

	function form_mastertrainer_classlist_add()
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
		if (!empty($_FILES['file_student_class_list']['tmp_name'])) $data['class_list'] = $this->upload_student_class_list();

		if ($this->input->post())
		{
			$this->form_validation->set_rules('trainer_email', 'Trainer Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('section', 'Section', 'trim|required|xss_clean');

			$this->form_validation->set_rules('last_name[]', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name[]', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_initial[]', 'Middlte Initial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school[]', 'School', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthdate[]', 'Birthdate', 'trim|required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			
			if ($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-classlist-add', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$mastertrainer = $this->mastertrainer->getMasterTrainerByEmail($this->input->post('trainer_email'));
					$school = $this->school->getSchoolById($this->input->post('school'));

					if (!$mastertrainer)
					{
						$data['mastertrainer_not_found'] = TRUE;
						$this->db->trans_rollback();
						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-classlist-add', $data);
						$this->load->view('footer');
						return;
					}

					$t3_class = array
					(
						'Name' => $this->input->post('section'),
						'School_Year' => $this->input->post('year'),
						'Semester' => $this->input->post('semester'),
						'School_ID' => $school,
						'Subject_ID' => $this->input->post('subject')
					);
					$t3_class_id = $this->classes->addT3Class($t3_class);

					for ($i = 0; $i < count($this->input->post('student_number')); $i++)
					{
						$teacher_code = $school->School_ID . substr($this->input->post('first_name')[$i], 0, 1) . substr($this->input->post('middle_initial')[$i], 0, 1) . substr($this->input->post('last_name')[$i], 0, 1) . $this->input->post('birthdate')[$i];
						$teacher = $this->teacher->getTeacherByCode($teacher_code);

						if (!$teacher)
						{
							$data['teacher_not_found'] = TRUE;
							$this->db->trans_rollback();
							$this->load->view('header');
							$this->load->view('forms/form-mastertrainer-classlist-add', $data);
							$this->load->view('footer');
							return;
						}

						$teacher_class = array
						(
							'T3_Class_ID' => $class_id,
							'Teacher_ID' => $teacher->Teacher_ID
						);
						$this->classes->addTeacherClass($teacher_class);

						if ($this->db->_error_message())
						{
							$data['teacher_not_found'] = TRUE;
							$this->db->trans_rollback();
							$this->load->view('header');
							$this->load->view('forms/form-mastertrainer-classlist-add', $data);
							$this->load->view('footer');
							return;
						}
					}

					$this->db->trans_commit();

					$data['form_success'] = TRUE;
					$this->log->addLog('Added Class List');

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-classlist-add', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-mastertrainer-classlist-add', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-mastertrainer-classlist-add', $data);
			$this->load->view('footer');
		}
	}

	function form_mastertrainer_classlist($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
		$data['t3_class'] = $this->classes->getT3ClassById($id);
		$data['teachers'] = $this->classes->getT3ClassTeachersById($id);

		if ($this->input->post())
		{
			if ($this->input->post('add_teacher'))
			{
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean|max_length[45]|alpha_dash');
				$this->form_validation->set_rules('middle_initial', 'Middlte Initial', 'trim|required|xss_clean|max_length[1]|alpha');
				$this->form_validation->set_rules('school', 'School', 'trim|required|xss_clean');
				$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|xss_clean');

				$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
				
				if($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-classlist', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$school_id = $data['t3_class']->School_ID;

					$teacher_code = $school_id . substr($this->input->post('first_name'), 0, 1) . substr($this->input->post('middle_initial'), 0, 1) . substr($this->input->post('last_name'), 0, 1) . date("Ymd", strtotime($this->input->post('birthdate')));
					$teacher = $this->teacher->getTeacherByCode($teacher_code);

					if (!$student)
					{
						$data['teacher_not_found'] = TRUE;
						$this->db->trans_rollback();
						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-classlist', $data);
						$this->load->view('footer');
						return;
					}

					$teacher_class = array
					(
						'T3_Class_ID' => $id,
						'Teacher_ID' => $teacher->Teacher_ID
					);
					$this->classes->addT3Class($teacher_class);

					if ($this->db->_error_message())
					{
						$data['teacher_not_found'] = TRUE;
						$this->db->trans_rollback();
						$this->load->view('header');
						$this->load->view('forms/form-mastertrainer-classlist', $data);
						$this->load->view('footer');
						return;
					}

					$this->db->trans_commit();

					$data['teachers'] = $this->classes->getT3ClassTeachersById($id);
					$data['form_success'] = TRUE;
					$this->log->addLog('Updated Class List');

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-classlist', $data);
					$this->load->view('footer');
				}
				
			}
			elseif ($this->input->post('delete_teacher'))
			{
				$this->form_validation->set_rules('teacher_id[]', 'Teacher', 'trim|required|numeric|xss_clean');

				if ($this->form_validation->run() == FALSE)
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-classlist', $data);
					$this->load->view('footer');
				}
				else
				{
					foreach ($this->input->post('teacher_id') as $key)
					{
						$this->classes->deleteT3ClassById($key);
					}

					$data['teachers'] = $this->classes->getT3ClassTeachersById($id);
					$data['form_success'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-mastertrainer-classlist', $data);
					$this->load->view('footer');
				}
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-mastertrainer-classlist', $data);
			$this->load->view('footer');
		}
	}

	function form_program_smp_tracker($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['statuses'] = $this->status->getAllStatuses();
		$data['smp_tracker'] = $this->student->getSmpStudentByStudentIdOrCode($id);
		$data['bizcom'] = $this->student->getBizComByStudentId($id);
		$data['bpo101'] = $this->student->getBpo101ByStudentId($id);
		$data['bpo102'] = $this->student->getBpo102ByStudentId($id);
		$data['sc101'] = $this->student->getSc101ByStudentId($id);
		$data['systh101'] = $this->student->getSysth101ByStudentId($id);

		if ($this->input->post())
		{
			$this->form_validation->set_rules('code', 'Code', 'trim|required|alpha_dash|xss_clean');
			$this->form_validation->set_rules('bizcom_status', 'BizCom Status', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('bizcom_grade', 'BizCom Grade', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('bpo101_status', 'BPO101 Status', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('bpo101_grade', 'BPO101 Grade', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('bpo102_status', 'BPO102 Status', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('bpo102_grade', 'BPO102 Grade', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('sc101_status', 'SC101 Status', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('sc101_grade', 'SC101 Grade', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('systh101_status', 'SYSTH101 Status', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('systh101_grade', 'SYSTH101 Grade', 'trim|required|numeric|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->input->post('submit'))
			{
				if ($this->form_validation->run())
				{
					$this->db->trans_begin();

					$student_code = $this->input->post('code');

					$bizcom = array
					(
						'tracker.Status_ID' => $this->input->post('bizcom_status'),
						'smp_student.Grade' => $this->input->post('bizcom_grade')
					);
					$this->student->updateSmpStudent($student_code, 'BizCom', $bizcom);

					$bpo101 = array
					(
						'tracker.Status_ID' => $this->input->post('bpo101_status'),
						'smp_student.Grade' => $this->input->post('bpo101_grade')
					);
					$this->student->updateSmpStudent($student_code, 'BPO101', $bpo101);

					$bpo102 = array
					(
						'tracker.Status_ID' => $this->input->post('bpo102_status'),
						'smp_student.Grade' => $this->input->post('bpo102_grade')
					);
					$this->student->updateSmpStudent($student_code, 'BPO102', $bpo102);

					$sc101 = array
					(
						'tracker.Status_ID' => $this->input->post('sc101_status'),
						'smp_student.Grade' => $this->input->post('sc101_grade')
					);
					$this->student->updateSmpStudent($student_code, 'SC101', $sc101);

					$systh101 = array
					(
						'tracker.Status_ID' => $this->input->post('systh101_status'),
						'smp_student.Grade' => $this->input->post('systh101_grade')
					);
					$this->student->updateSmpStudent($student_code, 'SYSTH101', $systh101);

					if ($this->db->_error_message())
					{
						$this->db->trans_rollback();

						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-program-smp-tracker', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();

						$data['bizcom'] = $this->student->getBizComByStudentId($id);
						$data['bpo101'] = $this->student->getBpo101ByStudentId($id);
						$data['bpo102'] = $this->student->getBpo102ByStudentId($id);
						$data['sc101'] = $this->student->getSc101ByStudentId($id);
						$data['systh101'] = $this->student->getSysth101ByStudentId($id);
						$data['form_success'] = TRUE;
						$this->log->addLog('Updated SMP Tracker');

						$this->load->view('header');
						$this->load->view('forms/form-program-smp-tracker', $data);
						$this->load->view('footer');
					}
				}
				else
				{
					$this->form_validation->run();

					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-program-smp-tracker', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-program-smp-tracker', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-program-smp-tracker', $data);
			$this->load->view('footer');
		}
	}

	function form_program_smp_internship_tracker($id)
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['statuses'] = $this->status->getAllStatuses();
		$data['internship'] = $this->student->getInternshipByStudentIdOrCode($id);

		if ($this->input->post())
		{
			$this->form_validation->set_rules('code', 'Code', 'trim|required|alpha_dash|xss_clean');
			$this->form_validation->set_rules('status', 'Status', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('remarks', 'Remarks', 'trim|required|alpha_dash|xss_clean');
			$this->form_validation->set_rules('company_information', 'Company Information', 'trim|required|alpha_dash|xss_clean');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('department', 'Department', 'trim|required|alpha_dash|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->input->post('submit'))
			{
				if ($this->form_validation->run())
				{
					$this->db->trans_begin();

					$student_code = $this->input->post('code');

					$internship = array
					(
						'tracker.Status_ID' => $this->input->post('bizcom_status'),
						'smp_student.Grade' => $this->input->post('bizcom_grade')
					);
					$this->student->updateInternshipStudent($student_code, 'BizCom', $internship);

					if ($this->db->_error_message())
					{
						$this->db->trans_rollback();

						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-program-smp-tracker', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();

						$data['bizcom'] = $this->student->getBizComByStudentId($id);
						$data['bpo101'] = $this->student->getBpo101ByStudentId($id);
						$data['bpo102'] = $this->student->getBpo102ByStudentId($id);
						$data['sc101'] = $this->student->getSc101ByStudentId($id);
						$data['systh101'] = $this->student->getSysth101ByStudentId($id);
						$data['form_success'] = TRUE;
						$this->log->addLog('Updated SMP Tracker');
						$this->log->addLog('Updated SMP Internship Tracker');

						$this->load->view('header');
						$this->load->view('forms/form-program-smp-internship-tracker', $data);
						$this->load->view('footer');
					}
				}
				else
				{
					$this->form_validation->run();

					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-program-smp-internship-tracker', $data);
					$this->load->view('footer');
				}
			}
			elseif ($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-program-smp-internship-tracker', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-program-smp-internship-tracker', $data);
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
			/*
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
					$t3_tracker = array
					(
						'Status_ID' => $this->input->post('status'),
						'Contract' => $this->input->post('contract'),
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
					}

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
			$this->load->view('footer');*/
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
	// Student Batch Upload
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
		$this->db->trans_begin();
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
			
			if (strcasecmp($row['F'], 'yes') == 0) //New Applicant -> Add student
 			{
 				if (!$this->student->getStudentByCode($student_code))
 				{
 					$student['Code'] = $student_code;
					$student_id = $this->student->addStudent($student);
 				
					if (!$student_id)
 					{
						$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student creation failed.');
						$this->db->trans_rollback();
						redirect('dbms');
					}

					if ((bool) strcasecmp(trim($row['AD']), 'no')) //SMP-CHED
					{
						$subject_id_array = array(4, 5, 6, 7, 10, 11);

						foreach ($subject_id_array as $subject_id)
						{
							$student_application = array
							(
								'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
								'Student_ID' => $student_id,
								'Project_ID' => 1,
								'Subject_ID' => $subject_id
							);
							$this->student->addStudentApplication($student_application);

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

							$subject_student = array
							(
								'Tracker_ID' => $tracker_id
							);
							$this->student->addSmpStudent($subject_student);

							if ($subject_id != 11)
							{
								$this->student->addSmpStudentCoursesTaken($subject_student);
							}
							else
							{
								$this->student->addInternshipStudent($subject_student);
							}

							if ($this->db->_error_message())
							{
								$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
								$this->db->trans_rollback();
								redirect('dbms');
							}
						}
					}

					if ((bool) strcasecmp(trim($row['AE']), 'no')) //GCAT-CHED
					{
						$project_id = 1;
						$subject_id = 1;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addGcatStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}

					if ((bool) strcasecmp(trim($row['AF']), 'no')) //BEST-CHED
					{
						$project_id = 1;
						$subject_id = 2;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addBestStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}

					if ((bool) strcasecmp(trim($row['AG']), 'no')) //AdEPT-CHED
					{
						$project_id = 1;
						$subject_id = 3;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addAdeptStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}

					if ((bool) strcasecmp(trim($row['AH']), 'no')) //BEST-SEI
					{
						$project_id = 2;
						$subject_id = 2;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addBestStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}

					if ((bool) strcasecmp(trim($row['AI']), 'no')) //AdEPT-SEI
					{
						$project_id = 2;
						$subject_id = 3;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addAdeptStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student already exists.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
			}
			else if (strcasecmp($row['F'], 'no') == 0) //Former Applicant -> Update student
			{
				$student_id = $this->student->getStudentByCode($student_code)->Student_ID;

				if (!$student_id)
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student not found.');
					$this->db->trans_rollback();
					redirect('dbms');
				}

				if ($this->student->updateStudentByCode($student_code, $student))
				{
					$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student profile update failed.');
					$this->db->trans_rollback();
					redirect('dbms');
				}

				if ((bool) strcasecmp(trim($row['AD']), 'no')) //SMP-CHED
				{
					if (!$this->student->getSmpStudentByStudentIdOrCode($student_code))
					{
						$subject_id_array = array(4, 5, 6, 7, 10, 11);

						foreach ($subject_id_array as $subject_id)
						{
							$student_application = array
							(
								'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
								'Student_ID' => $student_id,
								'Project_ID' => 1,
								'Subject_ID' => $subject_id
							);
							$this->student->addStudentApplication($student_application);

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

							$subject_student = array
							(
								'Tracker_ID' => $tracker_id
							);
							$this->student->addSmpStudent($subject_student);

							if ($subject_id != 11)
							{
								$this->student->addSmpStudentCoursesTaken($subject_student);
							}
							else
							{
								$this->student->addInternshipStudent($subject_student);
							}

							if ($this->db->_error_message())
							{
								$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
								$this->db->trans_rollback();
								redirect('dbms');
							}
						}
					}
				}
				
				if ((bool) strcasecmp(trim($row['AE']), 'no')) //GCAT-CHED
				{
					if (!$this->student->getGcatStudentByStudentIdOrCode($student_code))
					{
						$project_id = 1;
						$subject_id = 1;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addGcatStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}
				}

				if ((bool) strcasecmp(trim($row['AF']), 'no')) //BEST-CHED
				{
					if (!$this->student->getBestStudentByStudentIdOrCode($student_code))
					{
						$project_id = 1;
						$subject_id = 2;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addBestStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}
				}

				if ((bool) strcasecmp(trim($row['AG']), 'no')) //AdEPT-CHED
				{
					if (!$this->student->getAdeptStudentByStudentIdOrCode($student_code))
					{
						$project_id = 1;
						$subject_id = 3;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addAdeptStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}
				}

				if ((bool) strcasecmp(trim($row['AH']), 'no')) //BEST-SEI
				{
					if (!$this->student->getBestStudentByStudentIdOrCode($student_code))
					{
						$project_id = 2;
						$subject_id = 2;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addBestStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}					
				}

				if ((bool) strcasecmp(trim($row['AI']), 'no')) //AdEPT-SEI
				{
					if (!$this->student->getAdeptStudentByStudentIdOrCode($student_code))
					{
						$project_id = 2;
						$subject_id = 3;

						$student_application = array
						(
							'Contract' => (bool) strcasecmp(trim($row['AJ']), 'no'),
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

						$subject_student = array
						(
							'Tracker_ID' => $tracker_id
						);
						$this->student->addAdeptStudent($subject_student);

						if ($this->db->_error_message())
						{
							$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. ' . $this->db->_error_message());
							$this->db->trans_rollback();
							redirect('dbms');
						}
					}
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'Student Profile upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Column New_Applicant? invalid.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

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
					if ($this->student->updateBestStudent($code, $subject, $subject_student))
					{
						$this->session->set_flashdata('upload_error', 'BEST Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'BEST Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. BEST Product Tracker does not exist.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
				/*else //BEST Student Tracker does not exist -> Add
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
				}*/
			}
			elseif ($subject == 'AdEPT')
			{
				if ($this->student->getAdeptStudentByStudentIdOrCode($code)) //AdEPT Student Tracker exists -> Update
				{
					if ($this->student->updateAdeptStudent($code, $subject, $subject_student))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. AdEPT Product Tracker does not exist.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
				/*else //AdEPT Student Tracker does not exist -> Add
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
				}*/
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
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode(trim($row['F']))->School_ID; //Get School_ID
			$code = $school_id . trim($row['E']); //Get Code
			$subject = trim($row['A']);
			$status_id = $this->status->getStatusIDByName(trim($row['H']))->Status_ID;

			$subject_student = array
			(
				// 'Contract' => trim($row['G']),
				'tracker.Status_ID' => $status_id,
				'tracker.Remarks' => trim($row['I']),
				'CD' => (bool) strcasecmp($row['J'], 'no'),
			);
			
			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}

			if ($subject == 'BEST')
			{
				if ($this->student->getBestStudentByStudentIdOrCode($code))
				{
					if ($this->student->updateBestStudent($code, $subject, $subject_student))
					{
						$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. BEST Tracker does not exist.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
			}
			elseif ($subject == 'AdEPT')
			{
				if ($this->student->getAdeptStudentByStudentIdOrCode($code))
				{
					if ($this->student->updateAdeptStudent($code, $subject, $subject_student))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
						$this->db->trans_rollback();
						redirect('dbms');
					}
				}
				else
				{
					$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. AdEPT Tracker does not exist.');
					$this->db->trans_rollback();
					redirect('dbms');
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
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_gcat_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode(trim($row['E']))->School_ID; //Get School_ID
			$code = $school_id . trim($row['D']); //Get Code
			$subject = 'GCAT';
			$status_id = $this->status->getStatusIDByName(trim($row['H']))->Status_ID;

			$gcat_student = array
			(
				'gcat_student.Session_ID' => $row['F'],
				'gcat_student.Test_Date' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['G'], 'MM/DD/YYYY'))),
				'tracker.Status_ID' => $status_id
			);
			
			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}

			if ($this->student->getGcatStudentByStudentIdOrCode($code))
			{
				if ($this->student->updateGcatStudent($code, $subject, $gcat_student))
				{
					$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. GCAT Tracker does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

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
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_smp_student_tracker']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode(trim($row['F']))->School_ID; //Get School_ID
			$code = $school_id . trim($row['E']); //Get Code
			$subject = trim($row['A']);
			$status_id = $this->status->getStatusIDByName(trim($row['H']))->Status_ID;

			$smp_student = array
			(
				// 'Contract?' => $row['G'],
				'smp_student.Grade' => trim($row['I']),
				'tracker.Status_ID' => $status_id,
				'tracker.Remarks' => trim($row['J'])
			);
			
			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			
			if ($this->student->getSmpStudentByStudentIdOrCode($code))
			{
				if ($this->student->updateSmpStudent($code, $subject, $smp_student))
				{
					$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. SMP Tracker does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'SMP Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' students added/updated.');
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
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_internship']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode(trim($row['E']))->School_ID;
			$subject = 'Intern';
			
			$code = $school_id . trim($row['D']); //Get Code

			$intern = array
			(
				'Company_Information' => trim($row['F']),
				'Company_Address' => trim($row['H']),
				'Task' => trim($row['I']),
				'Supervisor_Name' => trim($row['J']),
				'Supervisor_Contact' => trim($row['K']),
				'Start_Date' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['M'], 'MM/DD/YYYY'))),
				'End_Date' => date('Y-m-d', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['N'], 'MM/DD/YYYY'))),
				'Total_Work_Hours' => trim($row['O']),
				'tracker.Status_ID' => $this->status->getStatusIDByName(trim($row['P']))->Status_ID,
				'Remarks' => trim($row['Q'])
			);

			if (!$this->student->getStudentByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}

			if ($this->student->getInternshipByStudentIdOrCode($code))
			{
				if ($this->student->updateInternshipStudent($code, $intern))
				{
					$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Internship Tracker update failed.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Internship Tracker does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'Internship Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' students added/updated.');
			$this->log->addLog('SMP Internship Student Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Internship Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_gcat_student_grades()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_gcat_student_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter > $highestRow) break;

			$email = trim($row['N']);
			$code = $this->student->getStudentByEmail($email)->Code;
			$subject = 'GCAT';

			$gcat_student = array
			(
				'GCAT_Basic_Skills_Test_Overall_Score' => trim($row['R']),
				'GCAT_Total_Cognitive' => trim($row['S']),
				'GCAT_English_Proficiency' => trim($row['T']),
				'GCAT_Computer_Literacy' => trim($row['U']),
				'GCAT_Perceptual_Speed_And_Accuracy' => trim($row['V']),
				'GCAT_Behavioral_Component_Overall_Score' => trim($row['W']),
				'GCAT_Communication' => trim($row['X']),
				'GCAT_Learning_Orientation' => trim($row['Y']),
				'GCAT_Courtesy' => trim($row['Z']),
				'GCAT_Empathy' => trim($row['AA']),
				'GCAT_Reliability' => trim($row['AB']),
				'GCAT_Responsiveness' => trim($row['AC']),
			);
			
			if (!$code)
			{
				$this->session->set_flashdata('upload_error', 'GCAT grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Student does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}

			if ($this->student->getGcatStudentByStudentIdOrCode($code))
			{
				if ($this->student->updateGcatStudent($code, $subject, $gcat_student))
				{
					$this->session->set_flashdata('upload_error', 'GCAT grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
			}
			else
			{
				$this->session->set_flashdata('upload_error', 'GCAT grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. GCAT Tracker does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

		if ($counter > 1)
		{
			$this->session->set_flashdata('upload_success', 'GCAT grades successfully uploaded. ' . ($counter - 1) . ' of ' . ($highestRow - 1) . ' Teachers updated.');
			$this->log->addLog('GCAT Student Grades Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'GCAT Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_student_grades()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_best_student_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

			$username = trim($row['D']);
			$subject = 'BEST';

			$best_student = array
			(
				'Oral' => trim($row['I']),
				'Retention' => trim($row['J']),
				'Typing' => trim($row['K']),
				'Grammar' => trim($row['L']),
				'Comprehension' => trim($row['M']),
				'Summary_Scores' => trim($row['N']),
			);
			
			if (!$this->student->getBestStudentByUsername($username))
			{
				$this->session->set_flashdata('upload_error', 'BEST grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. BEST Tracker does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}

			if ($this->student->updateBestStudentByUsername($username, $best_student))
			{
				$this->session->set_flashdata('upload_error', 'BEST grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'BEST grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' students added/updated.');
			$this->log->addLog('BEST Student Grades Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_student_grades()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_adept_student_grades']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

			$username = trim($row['D']);
			$subject = 'AdEPT';

			$adept_student = array
			(
				'Oral' => trim($row['I']),
				'Retention' => trim($row['J']),
				'Typing' => trim($row['K']),
				'Grammar' => trim($row['L']),
				'Comprehension' => trim($row['M']),
				'Summary_Scores' => trim($row['N']),
			);
			
			if (!$this->student->getAdeptStudentByUsername($username))
			{
				$this->session->set_flashdata('upload_error', 'AdEPT grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. AdEPT Tracker does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');
			}

			if ($this->student->updateAdeptStudentByUsername($username, $adept_student))
			{
				$this->session->set_flashdata('upload_error', 'AdEPT grades upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Update failed.');
				$this->db->trans_rollback();
				redirect('dbms');
			}
		}
		$this->db->trans_commit();

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' students added/updated.');
			$this->log->addLog('AdEPT Student Grades Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	//teacher//---------------------------------------------------------------
	function upload_best_adept_product_tracker()//checked done it works - francis
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
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 2) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code
			$subject = $row['A'];
			
			$tracker = array
			(
				'Control_Number' => $row['G'],
				'User_Name' => $row['H']
			);

			
			if (!$this->teacher->getTeacherByCode($code))
			{
				$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			else
			{
				if ($subject == 'BEST')
				{
					if (!$this->teacher->getBestT3TrackerByTeacherCode($code)) //chcek if exiist
					{
						$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter . '. Best T3 Tracker does not exist.');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
					else
					{
						if ($this->teacher->updateBestT3Tracker($code,$subject,$tracker)) // the update method...
						{
							$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row ' . $counter .'');
							$this->db->trans_rollback();
							redirect('dbms');					
						}
					}
				}

				if ($subject == 'AdEPT')
				{
					if (!$this->teacher->getAdeptT3TrackerByTeacherCode($code)) //chcek if exiist
					{
						$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row a' . $counter . '. Adept T3 Tracker does not exist.');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
					else
					{
						if ($this->teacher->updateAdeptT3Tracker($code,$subject,$tracker)) // if exists..update...
						{
							$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Invalid data at row bs' . $counter .'');
							$this->db->trans_rollback();
							redirect('dbms');					
						}
					}
				}
			}
		}

		$this->db->trans_commit();
		
		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'BEST/AdEPT Product Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher updated.');
			$this->log->addLog('BEST AdEPT Product Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST/AdEPT Product Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_tracker()//checked done it works - francis
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
		$this->db->trans_begin();
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
			
			if (!$this->teacher->getTeacherByCode($code)) //--checker kung existing yung teacher--//
			{
				$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist.');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			else
			{
				if ($this->teacher->updateTeacherByCode($code, $teacher))
				{
					$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter .'');
					$this->db->trans_rollback();
					redirect('dbms');						
				}

				if (!$this->teacher->getBestT3TrackerByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '. BEST T3 Tracker does not exist.');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateBestT3Tracker($code,$subject,$best_t3_tracker))
					{
						$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter .'');
						$this->db->trans_rollback();
						redirect('dbms');						
					}
				}
				
				if (!$this->teacher->getT3TrackerByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '. T3 Tracker does not exist.');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateT3Tracker($code,$subject,$t3_tracker))
					{
						$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter .'');
						$this->db->trans_rollback();
						redirect('dbms');						
					}
				}
			}
		}

		$this->db->trans_commit();

		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'BEST Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher updated.');
			$this->log->addLog('BEST Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Empty file.');
			$this->db->trans_rollback();
		}
		redirect('dbms');
	}

	function upload_best_T3_attendance() //checked done it works - francis
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
		$this->db->trans_begin();
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
				$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			
			else
			{
				if (!$this->teacher->getBestT3AttendanceByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Invalid data at row ' . $counter . '. BEST T3 Attendance does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateTeacherBestAttendance($code,$subject,$best_t3_attendance))
					{
						$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');						
					}
				}
				
				if (!$this->teacher->getTeacherProfessionalReferenceByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Teacher professional reference does not exist');
					$this->db->trans_rollback();
					redirect('dbms');
				}
				else
				{
					if ($this->teacher->updateTeacherProfessionalReference($code,$subject,$teacher_professional_reference))
					{
						$this->session->set_flashdata('upload_error', 'BEST Tracker upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');						
					}
				}
			}
		}

		$this->db->trans_commit();
		
		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'BEST Attendance Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher updated.');
			$this->log->addLog('BEST T3 Attendance Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Attendance Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_tracker() //checked done it works - francis
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
		$this->db->trans_begin();
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
				$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			else
			{
				if ($this->teacher->updateTeacherByCode($code, $teacher))
				{
					$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . '');
					$this->db->trans_rollback();
					redirect('dbms');					
				}

				if (!$this->teacher->getT3TrackerByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . '. T3 Tracker does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateT3Tracker($code,$subject,$t3_tracker))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}

				if (!$this->teacher->getAdeptT3TrackerByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter . '. Adept T3 Tracker does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateAdeptT3Tracker($code,$subject,$adept_t3_tracker))
					{
						$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Invalid data at row ' . $counter .'' );
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}
			}
		}

		$this->db->trans_commit();
		
		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher updated.');
			$this->log->addLog('AdEPT Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_T3_attendance() //checked done it works - francis
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
		$this->db->trans_begin();
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
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			else
			{
				if (!$this->teacher->getAdeptT3AttendanceByTeacherCode($code))
				{	
					$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Adept T3 Attendance does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if($this->teacher->updateTeacherAdeptAttendance($code,$subject,$adept_t3_attendance))
					{	
						$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter .'');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}

				if (!$this->teacher->getTeacherProfessionalReferenceByTeacherCode($code))
				{	
					$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Teacher Professional Reference does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if($this->teacher->updateTeacherProfessionalReference($code,$subject,$teacher_professional_reference))
					{	
						$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Invalid data at row ' . $counter .'');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}
			}
		}

		$this->db->trans_commit();
		
		if ($counter > 2)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Attendance Tracker successfully uploaded. ' . ($counter - 2) . ' of ' . ($highestRow - 2) . ' Teacher updated.');
			$this->log->addLog('AdEPT T3 Attendance Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Attendance Tracker upload failed. Empty file.');
		}
		redirect('dbms');		
	}

	function upload_smp_tracker() //checked done it works - francis
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
		$this->db->trans_begin();
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
					$this->db->trans_rollback();
					redirect('dbms');					
			}

			else
			{
				if (!$this->teacher->getT3TrackerByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $code . '. T3 Tracker does not exist');
						$this->db->trans_rollback();
						redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateT3Tracker($code,$subject,$t3_tracker))
					{
						$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Invalid data at row ' . $code . '');
							$this->db->trans_rollback();
							redirect('dbms');					
					}
				}
			}
		}

		$this->db->trans_commit();

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'SMP Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' Teacher updated.');
			$this->log->addLog('SMP Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'SMP Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_smp_attendance() //checked done it works - francis
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
		$this->db->trans_begin();
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
				$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			
			else
			{
				if (!$this->teacher->getSmpT3AttendanceByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '. SMP T3 Attendance does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateTeacherSMPAttendance($code,$subject,$smp_t3_attendance))
					{
						$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}
				
				if (!$this->teacher->getSmpT3AttendanceTrackingByTeacherCode($code))
				{
					$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '. SMP T3 Attendance Tracking does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateTeacherSMPAttendanceTracking($code,$subject,$smp_t3_attendance_tracking))
					{
						$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}
			}
		}

		$this->db->trans_commit();

		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'SMP Attendance Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' Teacher updated.');
			$this->log->addLog('SMP Attendance Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'SMP Attendance Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_stipend_process_tracker() //checked done it works - francis
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
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 3) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['F'])->School_ID; //Get School_ID 
			$code = $school_id . substr($row['C'],0,1). substr($row['D'],0,1). substr($row['B'],0,1). date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['E'], 'MM/DD/YYYY'))); //Get Code
			//PALITAN NIYO NG DATETIMEYUNG DATE COLUMN SA DB PLEASE KAYA DI SIYA NAGRERECORD.!!!!
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

			$subject = trim($row['A']);
			
			if (!$this->teacher->getTeacherByCode($code))//wala nakita na teacher
			{
				$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Teacher does not exist');
				$this->db->trans_rollback();
				redirect('dbms');
			}
			else
			{	
				if (!$this->subject->getSubjectByCode($subject)) 
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $subject . ' of ' . $highestRow . '.');
					$this->db->trans_rollback();
					redirect('dbms');
				}

				$stipend_tracking_id = $this->teacher->addStipendTracking($stipend_tracking); // IF IT DOES NOT EXIST ADDS STIPEND TRACKING

				if(!$stipend_tracking_id)
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
					$this->db->trans_rollback();
					redirect('dbms');
				}

				$stipend_tracking_list['Stipend_Tracking_ID'] = $stipend_tracking_id;
				$stipend_tracking_list['Subject_ID'] = $this->subject->getSubjectByCode($subject)->Subject_ID;
				$stipend_tracking_list['Teacher_ID'] = $this->teacher->getTeacherByCode($code)->Teacher_ID;

				if (!$this->teacher->addStipendTrackingList($stipend_tracking_list))
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
					$this->db->trans_rollback();
					redirect('dbms');
				}
				//--stuff for stipend tracking.---
				/*if (!$this->teacher->getStipendTrackingByTeacherCode($code)) //CHECK IF STIPEND TRACKING EXISTS 
				{
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Stipend Tracker does not exist');
					$this->db->trans_rollback();
					redirect('dbms');
				}*/
				/*else
				{
					//update IF STIPEND TRACKING EXISTS
					if ($this->teacher->updateStipendTracking($code, $subject, $stipend_tracking))
					{
						$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $code . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}*/

				//stuff for stipend tracking list 
				/*if (!$this->teacher->getStipendTrackingListByTeacherCode($code)) //CHECKS IF STIPEND TRACKING LIST EXISTS
				{
					

					
					$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '. Stipend Tracking List does not exist');
					$this->db->trans_rollback();
					redirect('dbms');
				}*/
				/*else
				{
					if ($this->teacher->updateStipendTrackingList($code, $subject, $stipend_tracking_list))
					{
						$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $code . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}*/
			}
		}

		$this->db->trans_commit();
		
		if ($counter > 3)
		{
			$this->session->set_flashdata('upload_success', 'Teacher Stipend Tracker successfully uploaded. ' . ($counter - 3) . ' of ' . ($highestRow - 3) . ' Teacher updated.');
			$this->log->addLog('Stipend Process Tracker Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_gcat_grades() //checked done it works - francis  
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
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 1) continue;
			if ($counter > $highestRow) break;

			$school_id = $this->school->getSchoolIdByCode($row['H']); //Get School_ID
			
			$code = $school_id . substr($row['E'],0,1). substr($row['F'],0,1). substr($row['D'],0,1) . date('Ymd', strtotime(PHPExcel_Style_NumberFormat::toFormattedString($row['P'], 'MM/DD/YYYY'))); //Get Code

			$Gcat_Tracker = array
			(
				'GCAT_Basic_Skills_Test_Overall_Score' => $row['U'],
				'GCAT_Total_Cognitive' => $row['V'],
				'GCAT_English_Proficiency' => $row['W'],
				'GCAT_Computer_Literacy' => $row['X'],
				'GCAT_Perceptual_Speed_&_Accuracy' => $row['Y'],
				'GCAT_Behavioral_Component_Overall_Score' => $row['Z'],
				'GCAT_Communication' => $row['AA'],
				'GCAT_Learning_Orientation' => $row['AB'],
				'GCAT_Courtesy' => $row['AC'],
				'GCAT_Empathy' => $row['AD'],
				'GCAT_Reliability' => $row['AE'],
				'GCAT_Responsiveness' => $row['AF']
			);

			$Email = $row['Q'];
			
			if (!$this->teacher->getTeacherByEmail($Email))//check if teacher exists
			{
				$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Invalid data at row ' . $counter . '. Teacher does not exist');
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			else
			{
				if (!$this->teacher->getGcatTrackerByTeacherEmail($Email)) // check if gcat tracker exists
				{
					$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Invalid data at row ' . $counter . '. Gcat Tracker does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}
				else
				{
					if ($this->teacher->updateGcatGrade($Email, $Gcat_Tracker)) // pangupdate to 
					{
						$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}

				/*else
				{

					$Gcat_Tracker['Stipend_Tracking_ID'] = $stipend_tracking_id;
					$Gcat_Tracker['Subject_ID'] = $this->subject->getSubjectByCode($subject)->Subject_ID;
					$Gcat_Tracker['Teacher_ID'] = $this->teacher->getTeacherByCode($code)->Teacher_ID;

					if (!$this->teacher->addGcatTracker($Gcat_Tracker))
					{
						$this->session->set_flashdata('upload_error', 'Teacher Stipend Tracker upload failed. Invalid data at row ' . $counter . ' of ' . $highestRow . '.');
						$this->db->trans_rollback();
						redirect('dbms');
					}	
				}*/
			}
		}

		$this->db->trans_commit();

		if ($counter > 1)
		{
			$this->session->set_flashdata('upload_success', 'GCAT Grades successfully uploaded. ' . ($counter - 1) . ' of ' . ($highestRow - 1) . ' Teachers updated.');
			$this->log->addLog('GCAT Grades Batch Upload');	
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'GCAT Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_best_grades()//PAKI AYOS NUNG DECIMAL PLACES SA DB PLEASEE BUT IT WORKS! 
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
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;

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
				$this->db->trans_rollback();
				redirect('dbms');
			}
			
			else
			{
				if (!$this->teacher->getBestT3GradesbyUsername($Best_T3_Tracker))
				{
					$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Invalid data at row ' . $counter . '. BEST T3 Grades does not exist');
					$this->db->trans_rollback();
					redirect('dbms');
				}
				else
				{
					if ($this->teacher->updateBestGrade($Best_T3_Tracker, $Best_T3_Grades))
					{
						$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');
					}	
				}
			}
		}

		$this->db->trans_commit();

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'BEST Grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' Teachers updated.');
			$this->log->addLog('GCAT Grades Batch Upload');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'BEST Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}

	function upload_adept_grades()//PAKI AYOS NUNG DECIMAL PLACES SA DB PLEASEE BUT IT WORKS! 
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
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 4) continue;
			if ($counter > $highestRow) break;
			
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
				$this->db->trans_rollback();
				redirect('dbms');					
			}
			else
			{
				if (!$this->teacher->getAdeptT3GradesbyUsername($Adept_T3_Tracker))
				{
					$this->session->set_flashdata('upload_error', 'Adept Grades upload failed. Invalid data at row ' . $counter . '. Adept T3 Grades does not exist');
					$this->db->trans_rollback();
					redirect('dbms');					
				}

				else
				{
					if ($this->teacher->updateAdeptGrade($Adept_T3_Tracker, $Adept_T3_Grades))
					{
						$this->session->set_flashdata('upload_error', 'Adept Grades upload failed. Invalid data at row ' . $counter . '');
						$this->db->trans_rollback();
						redirect('dbms');					
					}
				}
			}
		}

		$this->db->trans_commit();

		if ($counter > 4)
		{
			$this->session->set_flashdata('upload_success', 'AdEPT Grades successfully uploaded. ' . ($counter - 4) . ' of ' . ($highestRow - 4) . ' Teachers updated.');
			$this->log->addLog('AdEPT Grades Batch Upload');	
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'AdEPT Grades upload failed. Empty file.');
		}
		redirect('dbms');
	}
	// CLasses Batch Upload
	function upload_student_class_list()
	{
		if (!$_FILES)
		{
			redirect(base_url('dbms'));
		}

		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_student_class_list']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$classlist = array();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 10) continue;
			if ($counter > $highestRow) break;

			$student = array
			(
				'Last_Name' => $row['A'],
				'First_Name' => $row['B'],
				'Middle_Initial' => $row['C'],
				'Student_ID_Number' => $row['D']
			);

			$classlist[] = $student;
		}

		return $classlist;
	}

	function upload_teacher_class_list()
	{
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($_FILES['file_teacher_class_list']['tmp_name']);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$highestRow = $objPHPExcel->getActiveSheet()->getHighestDataRow();

		$counter = 0;
		$this->db->trans_begin();
		foreach ($sheetData as $row)
		{
			if ($counter++ < 9) continue;
			if ($counter > $highestRow) break;

			$teacher = array
			(
				'Last_Name' => $row['A'],
				'First_Name' => $row['B'],
				'Middle_Initial' => $row['C'],
				'Code' => $row['D'],
				'Birthdate' => $row['E']
			);

			$classlist[]	= $teacher;
		}

		$this->db->trans_commit();

		if ($counter > 1)
		{
			$this->session->set_flashdata('upload_success', 'Teacher class list successfully uploaded. ' . ($counter - 1) . ' of ' . ($highestRow - 1) . ' Teacher added/updated.');
		}
		else
		{
			$this->session->set_flashdata('upload_error', 'Teacher class list upload failed. Empty file.');
		}
	}
}
?>