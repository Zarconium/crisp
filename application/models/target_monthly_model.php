<?php
Class Target_Monthly_Model extends CI_Model
{
	
	function getTargetMonthly()
	{
		$query = $this->db->get_where('target_monthly', array('Target_Monthly_ID' => 1), 1, 0);
		
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