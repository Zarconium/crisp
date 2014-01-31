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
		$this->db->select('teacher.Teacher_ID, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(subject.Subject_Code) as Subject_Codes', false);
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

	function updateTeacherTracker($code,$subject,$tracker)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');

		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code',$subject);
		$this->db->update('t3_tracker', $tracker); */
//new
		$this->db->set($tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('t3_tracker 
			JOIN teacher_t3_tracker ON teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID 
			JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID 
			JOIN subject ON tracker.Subject_ID = subject.Subject_ID');
		
		return $this->db->affected_rows();
	}

	function updateTeacherAdeptAttendance($code,$subject,$tracker)
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
		$this->db->set($tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('adept_t3_attendance
			JOIN teacher_t3_tracker ON teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID 
			JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID
			JOIN Adept_T3_Tracker ON Adept_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID
			JOIN Adept_T3_Attendance ON Adept_T3_Attendance.Adept_T3_Attendance_ID = Adept_T3_Tracker.Adept_T3_Attendance_ID
			JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->affected_rows();
	}

	function updateTeacherBestAttendance($code,$subject,$tracker)
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
		$this->db->set($tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('best_t3_attendance
			JOIN teacher_t3_tracker ON teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID
			JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID
			JOIN Best_T3_Tracker ON Best_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID
			JOIN Best_T3_Attendance ON Best_T3_Attendance.Best_T3_Attendance_ID = Best_T3_Tracker.Best_T3_Attendance_ID
			JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->affected_rows();
	}

	function updateTeacherSMPAttendance($code,$subject,$tracker)
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
		$this->db->set($tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('smp_t3_attendance
			JOIN teacher_t3_tracker ON teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID
			JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID
			JOIN SMP_T3_Tracker ON SMP_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID
			JOIN SMP_T3_Attendance_Tracking ON SMP_T3_Attendance_Tracking.T3_Tracker_ID = t3_tracker.T3_Tracker_ID
			JOIN SMP_T3_Attendance ON SMP_T3_Attendance.SMP_T3_Attendance_ID = SMP_T3_Attendance_Tracking.SMP_T3_Attendance_ID
			JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->affected_rows();
	}

	function updateStipend($code, $subject, $stipend)
	{
		/*$this->db->join('Stipend_Tracking_List', 'Stipend_Tracking_List.Teacher_ID = Teacher.Teacher_ID');
		$this->db->join('Stipend_Tracking', 'Stipend_Tracking.Stipend_Tracking_ID = Stipend_Tracking_List.Stipend_Tracking_ID');
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('Stipend_Tracking', $stipend);*/

//new
		$this->db->set($stipend);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('Stipend_Tracking
			JOIN Stipend_Tracking_List ON Stipend_Tracking_List.Teacher_ID = Teacher.Teacher_ID 
			JOIN Stipend_Tracking ON Stipend_Tracking.Stipend_Tracking_ID = Stipend_Tracking_List.Stipend_Tracking_ID');

		return $this->db->affected_rows();
	}
}
?>