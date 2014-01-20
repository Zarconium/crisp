<?php
Class Student extends CI_Model
{
	function getAllStudents()
	{
		$query = $this->db->get('student');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllStudentsFormatted()
	{
		$this->db->distinct();
		$this->db->select('student.Student_ID, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(subject.Subject_Code) as Subject_Codes', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		// $this->db->where('status.Name', 'Passed');
		// $this->db->or_where('status.Name', 'Fail');
		// $this->db->or_where('status.Name', 'Currently Taking');
		// $this->db->or_where('status.Name', 'Dropped');
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getStudentByCode($code)
	{
		$this->db->select('*');
		$this->db->from('student');
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

	function addStudent($data)
	{
		$this->db->insert('student', $data);
		return $this->db->insert_id();
	}

	function addStudentApplication($data)
	{
		$this->db->insert('student_application', $data);
		return $this->db->insert_id();
	}

	function addTracker($data)
	{
		$this->db->insert('tracker', $data);
		return $this->db->insert_id();
	}

	function addSmpStudent($data)
	{
		$this->db->insert('smp_student', $data);
		return $this->db->insert_id();
	}

	function addGcatStudent($data)
	{
		$this->db->insert('gcat_student', $data);
		return $this->db->insert_id();
	}

	function addBestStudent($data)
	{
		$this->db->insert('best_student', $data);
		return $this->db->insert_id();
	}

	function addAdeptStudent($data)
	{
		$this->db->insert('adept_student', $data);
		return $this->db->insert_id();
	}

	function updateStudentByCode($code, $data)
	{
		$this->db->where('Code', $code);
		$this->db->update('student', $data);

		return $this->db->affected_rows();
	}

	function deleteStudentById($id)
	{
		$this->db->where('Student_ID', $id);
		return $this->db->delete('student');
	}
}
?>