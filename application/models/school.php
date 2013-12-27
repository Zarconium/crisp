<?php
Class School extends CI_Model
{
	function getAllSchools()
	{
		$query = $this->db->get('school');
		
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