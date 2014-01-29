<?php
Class mastertrainer extends CI_Model
{
	function getAllMasterTrainer()
	{
		$query = $this->db->get('Master_Trainer');
		
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
		$this->db->select('master_trainer.Master_Trainer_ID, CONCAT_WS("", IF(LENGTH(master_trainer.Last_Name), master_trainer.Last_Name, NULL), ", ", IF(LENGTH(master_trainer.First_Name), master_trainer.First_Name, NULL), " ", IF(LENGTH(master_trainer.Middle_Initial), master_trainer.Middle_Initial, NULL), ". ", IF(LENGTH(master_trainer.Name_Suffix), master_trainer.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(subject.Subject_Code) as Subject_Codes', false);
		$this->db->from('Master_Trainer');
		$this->db->join('school', 't3_class.School_ID = school.School_ID', 'left');
		//$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		//$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 't3_class.Subject_ID = subject.Subject_ID', 'left');
		//$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		// $this->db->where('status.Name', 'Passed');
		// $this->db->or_where('status.Name', 'Fail');
		// $this->db->or_where('status.Name', 'Currently Taking');
		// $this->db->or_where('status.Name', 'Dropped');
		$this->db->group_by('Full_Name');
		$this->db->order_by('Master_Trainer.Master_Trainer_ID', 'asc');

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

	function getStudentById($id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('Student_ID', $id);
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


	function getStudentFullNameById($id)
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('student');
		$this->db->where('Student_ID', $id);
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

	function addStudent($data)
	{
		$this->db->insert('student', $data);
		return $this->db->insert_id();
	}

	function deleteStudentById($id)
	{
		$this->db->where('Student_ID', $id);
		return $this->db->delete('student');
	}
}
?>