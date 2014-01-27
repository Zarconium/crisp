<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resources_Controller extends CI_Controller {

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
		$this->load->view('header');
		$this->load->view('resources');
		$this->load->view('footer');
	}
	
	function downloadStudentProfileSinglePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_profile_single.pdf");
		force_download('student_profile_single.pdf', $data);
	}
	
	//not existing
	function downloadStudentProfileSingleExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_profile_single.pdf");
		force_download('student_profile_single.pdf', $data);
	}
	
	function downloadStudentProfileBatchExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_profile_batch.xlsx");
		force_download('student_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadStudentProfileBatchPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_profile_batch.xlsx");
		force_download('student_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadStudentParticipantContractExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_participant_contract.pdf");
		force_download('student_participant_contract.pdf', $data);
	}
	
	function downloadStudentParticipantContractPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_participant_contract.pdf");
		force_download('student_participant_contract.pdf', $data);
	}
	
	function downloadGCATStudentGradesExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/gcat_student_grades.xlsx");
		force_download('gcat_student_grades.xlsx', $data);
	}
	
	//not existing
	function downloadGCATStudentGradesPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/gcat_student_grades.pdf");
		force_download('gcat_student_grades.pdf', $data);
	}
	
	function downloadBESTStudentGradesExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/best_student_grades.xlsx");
		force_download('best_student_grades.xlsx', $data);
	}
	
	//not existing
	function downloadBESTStudentGradesPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/best_student_grades.pdf");
		force_download('best_student_grades.pdf', $data);
	}
	
	function downloadADEPTStudentGradesExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/adept_student_grades.xlsx");
		force_download('adept_student_grades.xlsx', $data);
	}
	
	//not existing
	function downloadADEPTStudentGradesPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/adept_student_grades.pdf");
		force_download('adept_student_grades.pdf', $data);
	}
	
	//not existing
	function downloadTeacherProfileSingleExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_profile_single.xlsx");
		force_download('teacher_profile_single.xlsx', $data);
	}
	
	function downloadTeacherProfileSinglePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_profile_single.pdf");
		force_download('teacher_profile_single.pdf', $data);
	}
	
	function downloadTeacherProfileBatchExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_profile_batch.xlsx");
		force_download('teacher_profile_batch.xlsx', $data);
	}
	
	//not existing
	function ddownloadTeacherProfileBatchPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_profile_batch.pdf");
		force_download('teacher_profile_batch.pdf', $data);
	}
	
	//not existing
	function downloadProctorProfileSingleExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/proctor_profile_single.xlsx");
		force_download('proctor_profile_single.xlsx', $data);
	}
	
	function downloadProctorProfileSinglePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/proctor_profile_single.pdf");
		force_download('proctor_profile_single.pdf', $data);
	}
	
	function downloadProctorProfileBatchExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/proctor_profile_batch.xlsx");
		force_download('proctor_profile_batch.xlsx', $data);
	}
	
	//not existing
	function ddownloadProctorProfileBatchPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/proctor_profile_batch.pdf");
		force_download('proctor_profile_batch.pdf', $data);
	}
}
?>