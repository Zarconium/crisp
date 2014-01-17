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

	function getSchoolIdByCode($code)
	{
		$this->db->select('School_ID');
		$this->db->from('school');
		$this->db->where('Code', $code);
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