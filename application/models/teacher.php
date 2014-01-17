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

	function getTeacherByCode($code)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('Code', $code);
		
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

	function addTeacher($data)
	{
		$this->db->insert('teacher', $data);
		return $this->db->insert_id();
	}

	function addTeacherApplication($data)
	{
		return $this->db->insert('teacher_application', $data);
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
}
?>