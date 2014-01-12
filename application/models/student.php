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
		$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, subject.Subject_Code', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		//$this->db->where('status.Name', 'Currently Taking');

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
	}
}
?>