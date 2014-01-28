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
		$data = file_get_contents("./downloads/student_gcat_grades.xlsx");
		force_download('student_gcat_grades.xlsx', $data);
	}
	
	//not existing
	function downloadGCATStudentGradesPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_gcat_grades.pdf");
		force_download('student_gcat_grades.pdf', $data);
	}
	
	function downloadBESTStudentGradesExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_best_grades.xlsx");
		force_download('student_best_grades.xlsx', $data);
	}
	
	//not existing
	function downloadBESTStudentGradesPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_best_grades.pdf");
		force_download('student_best_grades.pdf', $data);
	}
	
	function downloadADEPTStudentGradesExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_gadept_rades.xlsx");
		force_download('student_adept_grades.xlsx', $data);
	}
	
	//not existing
	function downloadADEPTStudentGradesPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_adept_grades.pdf");
		force_download('student_adept_grades.pdf', $data);
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
	function downloadTeacherProfileBatchPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_profile_batch.pdf");
		force_download('teacher_profile_batch.pdf', $data);
	}
	
	function downloadTeacherBESTAttendanceExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_profile_batch.xlsx");
		force_download('teacher_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherBESTAttendancePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_best_attendance.pdf");
		force_download('teacher_best_attendance.xlsx', $data);
	}
	
	function downloadTeacherADEPTAttendanceExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_adept_attendance.xlsx");
		force_download('teacher_adept_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherADEPTAttendancePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_adept_attendance.pdf");
		force_download('teacher_adept_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherSMPAttendanceExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_smp_attendance.xlsx");
		force_download('teacher_smp_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherSMPAttendancePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/teacher_smp_attendance.pdf");
		force_download('teacher_best_attendance.xlsx', $data);
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
	function downloadProctorProfileBatchPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/proctor_profile_batch.pdf");
		force_download('proctor_profile_batch.pdf', $data);
	}
	
	//not existing
	function downloadMasterTrainerProfileSingleExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/mastertrainer_profile_single.xlsx");
		force_download('mastertrainer_profile_single.xlsx', $data);
	}
	
	function downloadMasterTrainerrofileSinglePDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/mastertrainer_profile_single.pdf");
		force_download('mastertrainer_profile_single.pdf', $data);
	}
	
	function downloadMasterTrainerProfileBatchExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/mastertrainer_profile_batch.xlsx");
		force_download('mastertrainer_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadMasterTrainerProfileBatchPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/mastertrainer_profile_batch.pdf");
		force_download('mastertrainer_profile_batch.pdf', $data);
	}
	
	function downloadClassListExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_classlist.xlsx");
		force_download('student_classlist.xlsx', $data);
	}
	
	//not existing
	function downloadClassListPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/student_classlist.pdf");
		force_download('student_classlist.pdf', $data);
	}
	
	function downloadSMPTrackerExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/smp_tracker.xlsx");
		force_download('smp_tracker.xlsx', $data);
	}
	
	function downloadBESTTrackerExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/best_tracker.xlsx");
		force_download('best_tracker.xlsx', $data);
	}
	
	function downloadADEPTTrackerExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/adept_tracker.xlsx");
		force_download('adept_tracker.xlsx', $data);
	}
	
	function downloadT3SMPTrackerExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/t3_smp_tracker.xlsx");
		force_download('t3_smp_tracker.xlsx', $data);
	}
	
	function downloadT3ADEPTTrackerExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/t3_adept_tracker.xlsx");
		force_download('t3_adept_tracker.xlsx', $data);
	}
	
	function downloadT3GCATTrackerExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/t3_gcat_tracker.xlsx");
		force_download('t3_gcat_tracker.xlsx', $data);
	}
	
	function downloadInternshipEvaluationExcel()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/internship_evaluation.xlsx");
		force_download('internship_evaluation.xlsx', $data);
	}
	
	function downloadInternshipEvaluationPDF()
	{		
		$this->load->helper('download');
		$data = file_get_contents("./downloads/internship_evaluation.pdf");
		force_download('internship_evaluation.pdf', $data);
	}
		
}
?>