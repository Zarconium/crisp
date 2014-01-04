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
		/*$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, student.Last_Name', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID');*/

		/*select concat(student.last_name,",",student.first_name),
		concat(school.name,"-",school.branch),
		subject.Subject_Code
		from student
		join school on student.School_ID = school.School_ID
		join student_tracker on student_tracker.Student_ID = student.student_id
		join tracker on student_tracker.Tracker_ID = tracker.Tracker_ID
		join subject on tracker.Subject_ID = subject.Subject_ID
		join status on status.Status_ID = tracker.Status_ID
		where status.Name like "Currently Taking";*/

		$this->db->distinct();
		$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, student.Last_Name, subject.Subject_Code', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('status.Name', 'Currently Taking');
		// $this->db->group_by('Full_Name');

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
	}

	function addStudentApplication($data)
	{
		$this->db->insert('student_application', $data);
	}
}
?>