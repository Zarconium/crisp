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
		$data = file_get_contents("./downloads/student_profile_single.pdf");
		force_download('student_profile_single.pdf', $data);
	}
	
	//not existing
	function downloadStudentProfileSingleExcel()
	{		
		$data = file_get_contents("./downloads/student_profile_single.pdf");
		force_download('student_profile_single.pdf', $data);
	}
	
	function downloadStudentProfileBatchExcel()
	{		
		$data = file_get_contents("./downloads/student_profile_batch.xlsx");
		force_download('student_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadStudentProfileBatchPDF()
	{		
		$data = file_get_contents("./downloads/student_profile_batch.xlsx");
		force_download('student_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadStudentParticipantContractExcel()
	{		
		$data = file_get_contents("./downloads/student_participant_contract.pdf");
		force_download('student_participant_contract.pdf', $data);
	}
	
	function downloadStudentParticipantContractPDF()
	{		
		$data = file_get_contents("./downloads/student_participant_contract.pdf");
		force_download('student_participant_contract.pdf', $data);
	}
	
	function downloadGCATStudentGradesExcel()
	{		
		$data = file_get_contents("./downloads/student_gcat_grades.xlsx");
		force_download('student_gcat_grades.xlsx', $data);
	}
	
	//not existing
	function downloadGCATStudentGradesPDF()
	{		
		$data = file_get_contents("./downloads/student_gcat_grades.pdf");
		force_download('student_gcat_grades.pdf', $data);
	}
	
	function downloadBESTStudentGradesExcel()
	{		
		$data = file_get_contents("./downloads/student_best_grades.xlsx");
		force_download('student_best_grades.xlsx', $data);
	}
	
	//not existing
	function downloadBESTStudentGradesPDF()
	{		
		$data = file_get_contents("./downloads/student_best_grades.pdf");
		force_download('student_best_grades.pdf', $data);
	}
	
	function downloadADEPTStudentGradesExcel()
	{		
		$data = file_get_contents("./downloads/student_adept_grades.xlsx");
		force_download('student_adept_grades.xlsx', $data);
	}
	
	//not existing
	function downloadADEPTStudentGradesPDF()
	{		
		$data = file_get_contents("./downloads/student_adept_grades.pdf");
		force_download('student_adept_grades.pdf', $data);
	}
	
	//not existing
	function downloadTeacherProfileSingleExcel()
	{		
		$data = file_get_contents("./downloads/teacher_profile_single.xlsx");
		force_download('teacher_profile_single.xlsx', $data);
	}
	
	function downloadTeacherProfileSinglePDF()
	{		
		$data = file_get_contents("./downloads/teacher_profile_single.pdf");
		force_download('teacher_profile_single.pdf', $data);
	}
	
	function downloadTeacherProfileBatchExcel()
	{		
		$data = file_get_contents("./downloads/teacher_profile_batch.xlsx");
		force_download('teacher_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherProfileBatchPDF()
	{		
		$data = file_get_contents("./downloads/teacher_profile_batch.pdf");
		force_download('teacher_profile_batch.pdf', $data);
	}
	
	function downloadTeacherParticipantContractPDF()
	{		
		$data = file_get_contents("./downloads/teacher_participant_contract.pdf");
		force_download('teacher_participant_contract.pdf', $data);
	}
	
	function downloadTeacherBESTAttendanceExcel()
	{		
		$data = file_get_contents("./downloads/teacher_best_attendance.xlsx");
		force_download('teacher_best_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherBESTAttendancePDF()
	{		
		$data = file_get_contents("./downloads/teacher_best_attendance.pdf");
		force_download('teacher_best_attendance.xlsx', $data);
	}
	
	function downloadTeacherADEPTAttendanceExcel()
	{		
		$data = file_get_contents("./downloads/teacher_adept_attendance.xlsx");
		force_download('teacher_adept_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherADEPTAttendancePDF()
	{		
		$data = file_get_contents("./downloads/teacher_adept_attendance.pdf");
		force_download('teacher_adept_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherSMPAttendanceExcel()
	{		
		$data = file_get_contents("./downloads/teacher_smp_attendance.xlsx");
		force_download('teacher_smp_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadTeacherSMPAttendancePDF()
	{		
		$data = file_get_contents("./downloads/teacher_smp_attendance.pdf");
		force_download('teacher_best_attendance.xlsx', $data);
	}
	
	//not existing
	function downloadProctorProfileSingleExcel()
	{		
		$data = file_get_contents("./downloads/proctor_profile_single.xlsx");
		force_download('proctor_profile_single.xlsx', $data);
	}
	
	function downloadProctorProfileSinglePDF()
	{		
		$data = file_get_contents("./downloads/proctor_profile_single.pdf");
		force_download('proctor_profile_single.pdf', $data);
	}
	
	function downloadProctorProfileBatchExcel()
	{		
		$data = file_get_contents("./downloads/proctor_profile_batch.xlsx");
		force_download('proctor_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadProctorProfileBatchPDF()
	{		
		$data = file_get_contents("./downloads/proctor_profile_batch.pdf");
		force_download('proctor_profile_batch.pdf', $data);
	}
	
	//not existing
	function downloadMasterTrainerProfileSingleExcel()
	{		
		$data = file_get_contents("./downloads/mastertrainer_profile_single.xlsx");
		force_download('mastertrainer_profile_single.xlsx', $data);
	}
	
	function downloadMasterTrainerProfileSinglePDF()
	{		
		$data = file_get_contents("./downloads/mastertrainer_profile_single.pdf");
		force_download('mastertrainer_profile_single.pdf', $data);
	}
	
	function downloadMasterTrainerProfileBatchExcel()
	{		
		$data = file_get_contents("./downloads/mastertrainer_profile_batch.xlsx");
		force_download('mastertrainer_profile_batch.xlsx', $data);
	}
	
	//not existing
	function downloadMasterTrainerProfileBatchPDF()
	{		
		$data = file_get_contents("./downloads/mastertrainer_profile_batch.pdf");
		force_download('mastertrainer_profile_batch.pdf', $data);
	}
	
	function downloadClassListExcel()
	{		
		$data = file_get_contents("./downloads/student_classlist.xlsx");
		force_download('student_classlist.xlsx', $data);
	}
	
	//not existing
	function downloadClassListPDF()
	{		
		$data = file_get_contents("./downloads/student_classlist.pdf");
		force_download('student_classlist.pdf', $data);
	}
	
	function downloadSMPTrackerExcel()
	{		
		$data = file_get_contents("./downloads/smp_tracker.xlsx");
		force_download('smp_tracker.xlsx', $data);
	}
	
	function downloadGCATTrackerExcel()
	{		
		$data = file_get_contents("./downloads/gcat_tracker.xlsx");
		force_download('gcat_tracker.xlsx', $data);
	}
	
	function downloadBESTTrackerExcel()
	{		
		$data = file_get_contents("./downloads/best_tracker.xlsx");
		force_download('best_tracker.xlsx', $data);
	}
	
	function downloadADEPTTrackerExcel()
	{		
		$data = file_get_contents("./downloads/adept_tracker.xlsx");
		force_download('adept_tracker.xlsx', $data);
	}
	
	function downloadT3SMPTrackerExcel()
	{		
		$data = file_get_contents("./downloads/t3_smp_tracker.xlsx");
		force_download('t3_smp_tracker.xlsx', $data);
	}
	
	function downloadT3ADEPTTrackerExcel()
	{		
		$data = file_get_contents("./downloads/t3_adept_tracker.xlsx");
		force_download('t3_adept_tracker.xlsx', $data);
	}
	
	function downloadT3BESTTrackerExcel()
	{		
		$data = file_get_contents("./downloads/t3_best_tracker.xlsx");
		force_download('t3_best_tracker.xlsx', $data);
	}
	
	function downloadInternshipEvaluationExcel()
	{		
		$data = file_get_contents("./downloads/internship_evaluation.xlsx");
		force_download('internship_evaluation.xlsx', $data);
	}
	
	function downloadInternshipEvaluationPDF()
	{		
		$data = file_get_contents("./downloads/internship_evaluation.pdf");
		force_download('internship_evaluation.pdf', $data);
	}
	
	function downloadBESTADEPTApplicationPDF()
	{		
		$data = file_get_contents("./downloads/best_adept_application.pdf");
		force_download('best_adept_application.pdf', $data);
	}
	
	function downloadSMPApplicationPDF()
	{		
		$data = file_get_contents("./downloads/smp_application.pdf");
		force_download('smp_application.pdf', $data);
	}

	function downloadCRISPUserManualPDF()
	{		
		$data = file_get_contents("./downloads/crisp_user_manual.pdf");
		force_download('crisp_user_manual.pdf', $data);
	}
		
}
?>