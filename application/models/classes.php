<?php
Class Classes extends CI_Model
{
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

	function addOtherClass($data)
	{
		$this->db->insert('other_class', $data);
		return $this->db->insert_id();
	}
}
?>