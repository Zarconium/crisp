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
}
?>