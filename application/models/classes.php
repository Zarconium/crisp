<?php
Class Classes extends CI_Model
{
	function getAllClasses()
	{
		$this->db->select('*');
		$this->db->from('class');

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

	function getAllStudentClasses()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, school.Name as School_Name, school.Branch as School_Branch, class.Name as Section', false);
		$this->db->from('other_class');
		$this->db->join('teacher', 'other_class.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('class', 'other_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('school', 'class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 'class.Subject_ID = subject.Subject_ID', 'left');

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

	function getAllT3Classes()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(master_trainer.Last_Name), master_trainer.Last_Name, NULL), ", ", IF(LENGTH(master_trainer.First_Name), master_trainer.First_Name, NULL), " ", IF(LENGTH(master_trainer.Middle_Initial), master_trainer.Middle_Initial, NULL), ". ", IF(LENGTH(master_trainer.Name_Suffix), master_trainer.Name_Suffix, NULL)) as Full_Name, school.Name as School_Name, school.Branch as School_Branch, t3_class.Name as Section', false);
		$this->db->from('t3_class');
		$this->db->join('master_trainer', 't3_class.Master_Trainer_ID = master_trainer.Master_Trainer_ID', 'left');
		$this->db->join('school', 't3_class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 't3_class.Subject_ID = subject.Subject_ID', 'left');

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

	function getAllBestClasses()
	{
		$query = $this->db->query('SELECT *
		FROM class 
		WHERE class.Subject_ID IN 
		(SELECT subject.subject_id 
			FROM subject 
			WHERE subject.subject_code="BEST" OR subject.subject_code="Best/Adept");
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllAdeptClasses()
	{
		$query = $this->db->query('SELECT *
		FROM class 
		WHERE class.Subject_ID IN 
		(SELECT subject.subject_id 
			FROM subject 
			WHERE subject.subject_code="Adept" OR subject.subject_code="Best/Adept");
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllGCATClasses()
	{
		$query = $this->db->query('SELECT *
		FROM class 
		WHERE class.Subject_ID IN 
		(SELECT subject.subject_id 
			FROM subject 
			WHERE subject.subject_code="GCAT");
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllSMPClasses()
	{
		$query = $this->db->query('SELECT *
		FROM class 
		WHERE class.Subject_ID IN 
		(SELECT subject.subject_id FROM subject 
			WHERE subject.subject_code !="GCAT" 
			AND subject.subject_code !="ADEPT" 
			AND subject.subject_code !="BEST" 
			AND subject.subject_code !="BEST/AdePT");
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function addClass($data)
	{
		$this->db->insert('class', $data);
		return $this->db->insert_id();
	}

	function addStudentClass($data)
	{
		$this->db->insert('student_class', $data);
		return $this->db->insert_id();
	}

	function addGcatClass($data)
	{
		$this->db->insert('gcat_class', $data);
		return $this->db->insert_id();
	}

	function addOtherClass($data)
	{
		$this->db->insert('other_class', $data);
		return $this->db->insert_id();
	}

	function addT3Class($data)
	{
		$this->db->insert('t3_class', $data);
		return $this->db->insert_id();
	}

	function addTeacherClass($data)
	{
		$this->db->insert('teacher_class', $data);
		return $this->db->insert_id();
	}
}
?>