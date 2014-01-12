<?php
Class Status extends CI_Model
{
	function getAllStatuses()
	{
		$query = $this->db->get('status');
		
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