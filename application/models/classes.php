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
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.Name, " - ", school.Branch) as School_Name, class.Name as Section', false);
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
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(master_trainer.Last_Name), master_trainer.Last_Name, NULL), ", ", IF(LENGTH(master_trainer.First_Name), master_trainer.First_Name, NULL), " ", IF(LENGTH(master_trainer.Middle_Initial), master_trainer.Middle_Initial, NULL), ". ", IF(LENGTH(master_trainer.Name_Suffix), master_trainer.Name_Suffix, NULL)) as Full_Name, CONCAT(school.Name, " - ", school.Branch) as School_Name, t3_class.Name as Section', false);
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

	function getAllGcatClassesFormatted()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, class.Name as Section', false);
		$this->db->from('gcat_class');
		$this->db->join('proctor', 'gcat_class.Proctor_ID = proctor.Proctor_ID', 'left');
		$this->db->join('class', 'gcat_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('school', 'class.School_ID = school.School_ID', 'left');
		
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

	function getClassSearchResults($params)
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

	function getOtherClassById($id)
	{
		$this->db->select('*, teacher.Email as Teacher_Email, class.Name as Section');
		$this->db->from('other_class');
		$this->db->join('class', 'other_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('teacher', 'other_class.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 'class.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('other_class.Class_ID', $id);
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

	function getOtherClassStudentsById($id)
	{
		$this->db->select('*');
		$this->db->from('other_class');
		$this->db->join('class', 'other_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('student_class', 'class.Class_ID = student_class.Class_ID', 'left');
		$this->db->join('student', 'student_class.Student_ID = student.Student_ID', 'left');
		$this->db->where('other_class.Class_ID', $id);
		
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

	function getT3ClassById($id)
	{
		$this->db->select('*, master_trainer.Email as Mastertrainer_Email, t3_class.Name as Section');
		$this->db->from('t3_class');
		$this->db->join('master_trainer', 't3_class.Master_Trainer_ID = master_trainer.Master_Trainer_ID', 'left');
		$this->db->join('school', 't3_class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 't3_class.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('t3_class.T3_Class_ID', $id);
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

	function getT3ClassTeachersById($id)
	{
		$this->db->select('*, CONCAT(school.name, " - ", school.Branch) as School_Name', false);
		$this->db->from('t3_class');
		$this->db->join('teacher_class', 't3_class.T3_Class_ID = teacher_class.T3_Class_ID', 'left');
		$this->db->join('teacher', 'teacher_class.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->where('t3_class.T3_Class_ID', $id);
		
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

	function deleteStudentClassById($id)
	{
		$this->db->where('Class_ID', $id);
		return $this->db->delete('class');
	}

	function deleteT3ClassById($id)
	{
		$this->db->where('T3_Class_ID', $id);
		return $this->db->delete('t3_class');
	}
}
?>