<?php
Class Teacher extends CI_Model
{
	function getAllTeachers()
	{
		$query = $this->db->get('teacher');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllTeachersFormatted()
	{
		$this->db->distinct();
		$this->db->select('teacher.Teacher_ID, teacher.Code, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(subject.Subject_Code) as Subject_Codes', false);
		$this->db->from('teacher');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'teacher.Teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('subject', 't3_tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		// $this->db->where('status.Name', 'Passed');
		// $this->db->or_where('status.Name', 'Fail');
		// $this->db->or_where('status.Name', 'Currently Taking');
		// $this->db->or_where('status.Name', 'Dropped');
		$this->db->group_by('Full_Name');
		$this->db->order_by('teacher.Teacher_ID', 'asc');

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}	
	}

	function getTeacherById($id)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('Teacher_ID', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getTeacherByCode($code)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('Code', $code);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getTeacherByUsername($username)// di pa to tama. saan ba kunin yung username ng teacher? 
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('User_Name', $username);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getTeacherFullNameById($id)
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('teacher');
		$this->db->where('Teacher_ID', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getTrainingExperiencesByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_training_experience');
		$this->db->where('Teacher_ID', $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getCertificationsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_certification');
		$this->db->where('Teacher_ID', $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAwardsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_awards');
		$this->db->where('Teacher_ID', $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getRelevantExperiencesByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_relevant_experiences');
		$this->db->where('Teacher_ID', $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getProfessionalReferencesByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_professional_reference');
		$this->db->where('Teacher_ID', $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAffiliationToOrganizationsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_affiliation_to_organization');
		$this->db->where('Teacher_ID', $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getBestT3AttendanceByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('best_t3_attendance');
		$this->db->join('best_t3_tracker', 'best_t3_attendance.Best_T3_Attendance_ID = best_t3_tracker.Best_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getAdeptT3AttendanceByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('adept_t3_attendance');
		$this->db->join('adept_t3_tracker', 'adept_t3_attendance.Adept_T3_Attendance_ID = adept_t3_tracker.Adept_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getSmpT3AttendanceByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_t3_attendance');
		$this->db->join('smp_t3_attendance_tracking', 'smp_t3_attendance.SMP_T3_Attendance_ID = smp_t3_attendance_tracking.SMP_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'smp_t3_attendance_tracking.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getStipendByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('stipend_tracking');
		$this->db->join('stipend_tracking_list', 'stipend_tracking.Stipend_Tracking_ID = stipend_tracking_list.Stipend_Tracking_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function addTeacher($data)
	{
		$this->db->insert('teacher', $data);
		return $this->db->insert_id();
	}

	function addTeacherTrainingExperience($data)
	{
		$this->db->insert('teacher_training_experience', $data);
		return $this->db->insert_id();
	}

	function addTeacherCertification($data)
	{
		$this->db->insert('teacher_certification', $data);
		return $this->db->insert_id();
	}

	function addTeacherAwards($data)
	{
		$this->db->insert('teacher_awards', $data);
		return $this->db->insert_id();
	}

	function addTeacherRelevantExperiences($data)
	{
		$this->db->insert('teacher_relevant_experiences', $data);
		return $this->db->insert_id();
	}

	function addTeacherProfessionalReference($data)
	{
		$this->db->insert('teacher_professional_reference', $data);
		return $this->db->insert_id();
	}

	function addTeacherAffiliationToOrganization($data)
	{
		$this->db->insert('teacher_affiliation_to_organization', $data);
		return $this->db->insert_id();
	}

	function updateTeacherByCode($code, $data)
	{
		$this->db->where('Code', $code);
		$this->db->update('teacher', $data);

		return $this->db->affected_rows();
	}

	function deleteTeacherById($id)
	{
		$this->db->where('Teacher_ID', $id);
		return $this->db->delete('teacher');
	}

	function updateBestT3Tracker($code,$subject,$best_t3_tracker)
	{
		$this->db->set($best_t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('best_t3_tracker JOIN t3_tracker ON best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID');
		return $this->db->affected_rows();
	}

	function updateAdeptT3Tracker($code,$subject,$adept_t3_tracker)
	{
		$this->db->set($adept_t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('adept_t3_tracker JOIN t3_tracker ON adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID');

		return $this->db->affected_rows();
	}

	function updateTeacherProfessionalReference($code,$subject,$teacher_professional_reference)
	{
		$this->db->set($teacher_professional_reference);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('teacher_professional_reference 
			JOIN teacher ON teacher_professional_reference.Teacher_ID = teacher.Teacher_ID 
			JOIN teacher_t3_tracker ON teacher.Teacher_ID = teacher_t3_tracker.Teacher_ID 
			JOIN t3_tracker ON teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID 
			JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');

		return $this->db->affected_rows();
	}

	function updateT3Tracker($code,$subject,$t3_tracker)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');

		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code',$subject);
		$this->db->update('t3_tracker', $tracker); */
//new
		$this->db->set($t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('t3_tracker JOIN teacher_t3_tracker ON teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');
		
		return $this->db->affected_rows();
	}
	function updateTeacherTracker($code,$subject,$t3_tracker)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');

		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code',$subject);
		$this->db->update('t3_tracker', $tracker); */
//new
		$this->db->set($t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('t3_tracker 
			JOIN best_t3_tracker ON t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID
			JOIN teacher_t3_tracker ON teacher_t3_tracker.T3_Tracker_ID = T3_tracker.T3_Tracker_ID 
			JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID 
			JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');
		
		return $this->db->affected_rows();
	}

	function updateTeacherAdeptAttendance($code,$subject,$adept_t3_attendance)
	{
		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('Adept_T3_Tracker', 'Adept_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('Adept_T3_Attendance', 'Adept_T3_Attendance.Adept_T3_Attendance_ID = Adept_T3_Tracker.Adept_T3_Attendance_ID','left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('Student.Student_Code = "'.$code.'" ');
		$this->db->where('Subject.Subject_Code = "'.$subject.'"');
		$this->db->update('Adept_T3_Attendance', $tracker); */
//new
		$this->db->set($adept_t3_attendance);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('adept_t3_attendance JOIN adept_t3_tracker ON adept_t3_attendance.Adept_T3_Attendance_ID = adept_t3_tracker.Adept_T3_Attendance_ID JOIN t3_tracker ON adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');

		return $this->db->affected_rows();
	}

	function updateTeacherBestAttendance($code,$subject,$best_t3_attendance)
	{
		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('Best_T3_Tracker', 'Best_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('Best_T3_Attendance', 'Best_T3_Attendance.Best_T3_Attendance_ID = Best_T3_Tracker.Best_T3_Attendance_ID','left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('Student.Student_Code = $code');
		$this->db->where('Subject.Subject_Code = $subject');
		$this->db->update('Best_T3_Attendance', $tracker);*/
//new
		$this->db->set($best_t3_attendance);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('best_t3_attendance JOIN best_t3_tracker ON best_t3_attendance.Best_T3_Attendance_ID = best_t3_tracker.Best_T3_Attendance_ID JOIN t3_tracker ON best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');

		return $this->db->affected_rows();
	}
	function updateTeacherSMPAttendanceTracking($code,$subject,$smp_t3_attendance_tracking)
	{
		$this->db->set($smp_t3_attendance_tracking);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('smp_t3_attendance_tracking JOIN smp_t3_tracker ON smp_t3_attendance_tracking.T3_Tracker_ID = smp_t3_tracker.T3_Tracker_ID JOIN t3_tracker ON smp_t3_tracker.T3_Tracker_ID =t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = Teacher_T3_tracker.T3_Tracker_ID JOIN teacher ON Teacher.teacher_ID = teacher_t3_tracker.Teacher_ID');

		return $this->db->affected_rows();
	}

	function updateTeacherSMPAttendance($code,$subject,$smp_t3_attendance)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('SMP_T3_Tracker', 'SMP_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('SMP_T3_Attendance_Tracking', 'SMP_T3_Attendance_Tracking.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('SMP_T3_Attendance', 'SMP_T3_Attendance.SMP_T3_Attendance_ID = SMP_T3_Attendance_Tracking.SMP_T3_Attendance_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('SMP_T3_Attendance', $tracker);*/

//new
		$this->db->set($smp_t3_attendance);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('smp_t3_attendance JOIN smp_t3_attendance_tracking ON smp_t3_attendance.SMP_T3_Attendance_ID = smp_t3_attendance_tracking.SMP_T3_Attendance_ID JOIN smp_t3_tracker ON smp_t3_attendance_tracking.T3_Tracker_ID = smp_t3_tracker.T3_Tracker_ID JOIN t3_tracker ON smp_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = Teacher_T3_tracker.T3_Tracker_ID JOIN teacher ON Teacher.teacher_ID = teacher_t3_tracker.Teacher_ID');

		return $this->db->affected_rows();
	}

	function updateStipendTrackingList($code, $subject, $stipend_tracking_list)
	{
		/*$this->db->join('Stipend_Tracking_List', 'Stipend_Tracking_List.Teacher_ID = Teacher.Teacher_ID');
		$this->db->join('Stipend_Tracking', 'Stipend_Tracking.Stipend_Tracking_ID = Stipend_Tracking_List.Stipend_Tracking_ID');
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('Stipend_Tracking', $stipend);*/

//new
		$this->db->set($stipend_tracking_list);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('stipend_tracking_list JOIN subject ON stipend_tracking_list.Subject_ID = subject.Subject_ID JOIN stipend_tracking ON stipend_tracking_list.Stipend_Tracking_ID = stipend_tracking.Stipend_Tracking_ID JOIN teacher ON stipend_tracking.teacher_ID = teacher.Teacher_ID');

		return $this->db->affected_rows();
	}
	function updateStipendTracking($code, $subject, $stipend_tracking)
	{
		$this->db->set($stipend_tracking);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('stipend_tracking JOIN stipend_tracking_list ON stipend_tracking.Stipend_Tracking_ID = stipend_tracking_list.Stipend_Tracking_ID JOIN subject ON stipend_tracking_list.Subject_ID = subject.Subject_ID JOIN teacher ON stipend_tracking.teacher_ID = teacher.Teacher_ID');

		return $this->db->affected_rows();
	}
	function uploadGCATGrade($code, $subject, $stipend_tracking)
	{
		$this->db->set($stipend_tracking);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('stipend_tracking JOIN stipend_tracking_list ON stipend_tracking.Stipend_Tracking_ID = stipend_tracking_list.Stipend_Tracking_ID JOIN subject ON stipend_tracking_list.Subject_ID = subject.Subject_ID JOIN teacher ON stipend_tracking.teacher_ID = teacher.Teacher_ID');

		return $this->db->affected_rows();
	}

	function uploadBestGrade($Best_T3_Tracker, $Best_T3_Grades)
	{
		$this->db->set($Best_T3_Grades);
		$this->db->where('best_t3_tracker.User_Name', $Best_T3_Tracker);
		$this->db->update('best_t3_grades JOIN best_t3_tracker ON best_t3_grades.Best_T3_Grades_ID = best_t3_tracker.Best_T3_Grades_ID');

		return $this->db->affected_rows();
	}
	function uploadAdeptGrade($Adept_T3_Tracker, $Adept_T3_Grades)
	{
		$this->db->set($Adept_T3_Grades);
		$this->db->where('adept_t3_tracker.User_Name', $Adept_T3_Tracker);
		$this->db->update('adept_t3_Grades JOIN adept_t3_tracker ON adept_t3_grades.Adept_T3_Grades_ID = adept_t3_tracker.Adept_T3_Grades_ID');

		return $this->db->affected_rows();
	}
	function getTeacherByUsernameBest($Best_T3_Tracker)
	{
		$this->db->select('*');
		$this->db->from('best_t3_tracker');
		$this->db->where('User_Name', $Best_T3_Tracker);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getTeacherByUsernameAdept($Adept_T3_Tracker)
	{
		$this->db->select('*');
		$this->db->from('adept_t3_tracker');
		$this->db->where('User_Name', $Adept_T3_Tracker);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
}
?>