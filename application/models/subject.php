<?php
Class Subject extends CI_Model
{
	function getAllSubjects()
	{
		$query = $this->db->get('subject');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getSubjectIdByCode($code)
	{
		$this->db->select('Subject_ID');
		$this->db->from('subject');
		$this->db->where('Subject_Code', $code);
		$this->db->limit(1);

		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getSMPSubjects()
	{
		$query = $this->db->query('SELECT * FROM subject 
			WHERE subject.subject_code !="GCAT" 
			AND subject.subject_code !="ADEPT" 
			AND subject.subject_code !="BEST" 
			AND subject.subject_code !="BEST/AdePT";');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getSubjectByID($ID)
	{
		$query = $this->db->query('SELECT * FROM subject WHERE subject.subject_id = "'. $ID .'";');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getSubjectByCode($Code)
	{
		$query = $this->db->query('SELECT * FROM subject WHERE subject.subject_code = "'. $Code .'";');

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