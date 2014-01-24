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
}
?>