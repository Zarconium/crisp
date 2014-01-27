<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in'))
		{

		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();

		$this->load->view('header');
		$this->load->view('report', $data);
		$this->load->view('footer');
	}

	function report_ni_phil()
	{
	
		//$startDate = $this->input->post('myBirthday');
		//$data['data'] = $this->name->get($startDate, $endDate);
		
		$data['student_list'] = $this->report_suc->getAllStudentNamesAndSchools();

		$this->load->view('reports/report_ni_phil', $data);
	}

	function studentAdeptProgramReport()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";
		
		$data['pin_count_list'] = $this->report_program->getStudentAdeptProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentAdeptProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentAdeptProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentAdeptProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentAdeptProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentAdeptProgramReportCompletedTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_adept', $data);
		$this->load->view('footer-print');
	}
	

	function studentBestProgramReport()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

		$data['pin_count_list'] = $this->report_program->getStudentBestProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentBestProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentBestProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentBestProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentBestProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentBestProgramReportCompletedTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_best', $data);
		$this->load->view('footer-print');

	}

	function studentProgramReportGCAT()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_gcat_start_date');
		$end_date = $this->input->post('program_student_gcat_end_date');

		$data['count_list'] = $this->report_program->getStudentProgramReportGCAT($start_date, $end_date);
		$data['total'] = $this->report_program->getStudentProgramReportGCATTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_gcat', $data);
		$this->load->view('footer-print');
	}

	
	function studentProgramReportPerSub()
	{
		$subject_code=1;
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

		$data['currently_taking_list'] = $this->report_program->getStudentProgramReportPerSubCurrentTakers($start_date, $end_date, $subject_code);
		$data['total_ct'] = $this->report_program->getStudentProgramReportPerSubCurrentTakersTotal($start_date, $end_date, $subject_code);
		$data['finished_list'] = $this->report_program->getStudentProgramReportPerSubFinished($start_date, $end_date, $subject_code);
		$data['total_ft'] = $this->report_program->getStudentProgramReportPerSubFinishedTotal($start_date, $end_date, $subject_code);

		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_per_sub', $data);
		$this->load->view('footer-print');

	}

	function t3ProgramReportGCAT()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

		$data['t3_count_list'] = $this->report_program->gett3ProgramReportGCAT($start_date, $end_date);
		$data['t3_total'] = $this->report_program->getT3ProgramReportGCATTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_t3_gcat', $data);
		$this->load->view('footer-print');


	}
	
	function T3ProgramReportPerSub()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01"; $subjectid="1";

		$data['t3_count_list'] = $this->report_program->getT3ProgramReportPerSub($start_date, $end_date, $subjectid);
		$data['t3_total'] = $this->report_program->getT3ProgramReportPerSubTotal($start_date, $end_date, $subjectid);
		$data['class_count'] = $this->report_program->getT3ProgramReportPerSubClasses($subjectid);


		$this->load->view('header-print');
		$this->load->view('reports/program_report_t3_per_sub', $data);
		$this->load->view('footer-print');
	}

	function sucReport()
	{
		$schoolcode="BATSTATU-Lipa";
		$data['teacher_count_list'] = $this->report_program->getSucReportTeachers($schoolcode);
		$data['student_completed_count_list'] = $this->report_program->getSucReportStudentsCompleted($schoolcode);
		$data['student_currently_taking_count_list'] = $this->report_program->getSucReportStudentsCurrentlyTaking($schoolcode);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_suc_report', $data);
		$this->load->view('footer-print');

	}


	//SUC Controller
	function SMPClasses()
	{
		$subject_code="SC101";
		$school_code="BATSTATU-Lipa";
		$semester=4;
		$teacher_code="CODE432";

		$data['class_list'] = $this->report_suc->getStudentClass($subject_code,$school_code,$semester,$teacher_code);
	
		$this->load->view('reports/suc_report_smp_classes', $data);
	}

	function getAllSMPStudentSUCReport()
	{
		$subject_code="SC101";
		$school_code="BATSTATU-Lipa";
		$semester=4;
		$teacher_code="CODE432";
		$class_name="BPO101-C";

		$data['smp_student_list'] = $this->report_suc->getallSMPStudent($subject_code,$school_code,$semester,$teacher_code,$class_name);
	
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_smp_student', $data);
		$this->load->view('footer-print');

	}

	function getAllGCATStudentSUCReport()
	{
		$data['gcat_student_list'] = $this->report_suc->getGCATStudent($subject,$school_code,$semester,$teacher_code,$class_name);
	
		$this->load->view('reports/suc_report_gcat_students', $data);
	}

	function getAllBestStudentSUCReport()
	{
		$data['best_student_list'] = $this->report_suc->getBestStudent($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_best_students', $data);
	}

	function getAllAdeptStudentSUCReport()
	{
		$data['adept_student_list'] = $this->report_suc->getAdeptStudent($school_code,$date_start,$date_end);
		
		$this->load->view('reports/suc_report_adept_students', $data);
	}

	function getAllT3BestSUCReport()
	{
		$data['T3_best_list'] = $this->report_suc->getT3Best($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_T3_Best', $data);
	}

	function getAllT3AdeptSUCReport()
	{
		$data['T3_adept_list'] = $this->report_suc->getT3Adept ($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_T3_Adept', $data);
	}

	function getAllT3GCATSUCReport()
	{
		$data['T3_GCAT_list'] = $this->report_suc->getT3Gcat($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_T3_GCAT', $data);
	}

	function getAllT3SMPSUCReport()
	{
		$data['SMP_total_list'] = $this->report_suc->getSMPTotal($school_code,$subject,$semester);
	
		$this->load->view('reports/suc_report_smp_total', $data);
	}

	//MNE Controller

	function mneQuarterlyReport()
	{
		$qtr1_start="1990-01-01"; $qtr1_end = "2020-01-01"; $qtr2_start="1990-01-01"; $qtr2_end = "2020-01-01"; $qtr3_start="1990-01-01"; $qtr3_end = "2020-01-01"; $qtr4_start="1990-01-01"; $qtr4_end = "2020-01-01"; $annual_start="1990-01-01"; $annual_end="2020-01-01";

		$data['teacher_gcat_completed_row'] = $this->report_mne->getallTeacherGcat($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['teacher_best_completed_row'] = $this->report_mne->getallTeacherBest($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['teacher_adept_completed_row'] = $this->report_mne->getallTeacherAdept($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherSmpAnySubject'] = $this->report_mne->getallTeacherSmpAnySubject($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);	
		$data['getallTeacherBpo101'] = $this->report_mne->getallTeacherBpo101($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherBpo102'] = $this->report_mne->getallTeacherBpo102($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherServiceCulture'] = $this->report_mne->getallTeacherServiceCulture($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherBusinessCommunication'] = $this->report_mne->getallTeacherBusinessCommunication($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherSystemsThinking'] = $this->report_mne->getallTeacherSystemsThinking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherCompleteSmpSubjAndTrainedTeachers'] = $this->report_mne->getallTeacherCompleteSmpSubjAndTrainedTeachers($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);		

		$data['gcat_completed_row'] = $this->report_mne->getallStudentsGcatCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['best_completed_row'] = $this->report_mne->getallStudentsBestCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['adept_completed_row'] = $this->report_mne->getallStudentsAdeptCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);

		$data['smp_currently_taking_row'] = $this->report_mne->getallStudentsSmpCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['bpo101_currently_taking_row'] = $this->report_mne->getallStudentsBpo101CurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['bpo102_currently_taking_row'] = $this->report_mne-> getallStudentsBpo102CurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['systh101_currently_taking_row'] = $this->report_mne-> getallStudentsSystemsThinkingCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['bizcom_currently_taking_row'] = $this->report_mne->getallStudentsBusinessCommunicationCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['sc101_currently_taking_row'] = $this->report_mne->getallStudentsServiceCultureCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);

		$data['getallStudentsSmpCompleted'] = $this->report_mne-> getallStudentsSmpCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsBpo101Completed'] = $this->report_mne-> getallStudentsBpo101Completed($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsBpo102Completed'] = $this->report_mne-> getallStudentsBpo102Completed($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsServiceCultureCompleted'] = $this->report_mne-> getallStudentsServiceCultureCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsBusinessCommunicationCompleted'] = $this->report_mne-> getallStudentsBusinessCommunicationCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsSystemsThinkingCompleted'] = $this->report_mne-> getallStudentsSystemsThinkingCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsInternshipCompleted'] = $this->report_mne-> getallStudentsInternshipCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);


		$this->load->view('header-print');
		$this->load->view('reports/mne_report_quarterly', $data);
		$this->load->view('footer-print');
	}
	function mneMonthlyReport()
	{
		$jan_start="1990-01-01"; $jan_end= "2020-01-01"; $feb_start="1990-01-01"; $feb_end= "2020-01-01"; $mar_start="1990-01-01"; $mar_end= "2020-01-01"; $apr_start="1990-01-01"; $apr_end= "2020-01-01"; $may_start="1990-01-01"; $may_end= "2020-01-01"; $jun_start="1990-01-01"; $jun_end= "2020-01-01"; $jul_start="1990-01-01"; $jul_end= "2020-01-01"; $aug_start="1990-01-01"; $aug_end= "2020-01-01"; $sep_start="1990-01-01"; $sep_end= "2020-01-01"; $oct_start="1990-01-01"; $oct_end= "2020-01-01"; $nov_start="1990-01-01"; $nov_end= "2020-01-01"; $dec_start="1990-01-01"; $dec_end= "2020-01-01"; $annual_start="1990-01-01"; $annual_end= "2020-01-01";

		$data['getMonthlyTeachersCompletedGcat'] = $this->report_mne->getallTeacherGcatMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInBest'] = $this->report_mne->getallTeacherBestMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInAdept'] = $this->report_mne->getallTeacherAdeptMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInAnySmp'] = $this->report_mne->getallTeacherSmpAnySubjectMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);	
		$data['getMonthlyTeachersTrainedInBpo101'] = $this->report_mne->getallTeacherBpo101Monthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInBpo102'] = $this->report_mne->getallTeacherBpo102Monthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInServiceCulture'] = $this->report_mne->getallTeacherServiceCultureMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInBusinessCommunication'] = $this->report_mne->getallTeacherBusinessCommunicationMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInSystemsThinking'] = $this->report_mne->getallTeacherSystemsThinkingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers'] = $this->report_mne->getallTeacherCompleteSmpSubjAndTrainedTeachersMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);		
		$data['getMonthlyStudentsAdministeredGcat'] = $this->report_mne->getallStudentsGcatCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsCompletedBest'] = $this->report_mne->getallStudentsBestCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsCompletedAdept'] = $this->report_mne->getallStudentsAdeptCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInAnySmpSubject'] = $this->report_mne->getallStudentsSmpCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInBpo101'] = $this->report_mne->getallStudentsBpo101CurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInBpo102'] = $this->report_mne-> getallStudentsBpo102CurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInServiceCulture'] = $this->report_mne-> getallStudentsSystemsThinkingCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInBusinessCommunication'] = $this->report_mne->getallStudentsBusinessCommunicationCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInSystemsThinking'] = $this->report_mne->getallStudentsServiceCultureCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedAnySmpSubject'] = $this->report_mne-> getallStudentsSmpCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedBpo101'] = $this->report_mne-> getallStudentsBpo101CompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedBpo102'] = $this->report_mne-> getallStudentsBpo102CompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedServiceCulture'] = $this->report_mne-> getallStudentsServiceCultureCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedBusinessCommunication'] = $this->report_mne-> getallStudentsBusinessCommunicationCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedSystemsThinking'] = $this->report_mne-> getallStudentsSystemsThinkingCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsUndergoneInternship'] = $this->report_mne-> getallStudentsInternshipCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);


		$this->load->view('header-print');
		$this->load->view('reports/mne_report_monthly', $data);
		$this->load->view('footer-print');	
	}
}
?>