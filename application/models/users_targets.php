<?php
Class users_targets extends CI_Model
{
	
	/*function getTargetMonthly()
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
	}*/

	function getLFATargets($year)
	{
		$this->db->select('*');
		$this->db->from('users_targets');
		$this->db->where('Year', $year);
		$this->db->limit(26);

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

	function getYears()
	{
		$query = $this->db->query('SELECT DISTINCT(Year) FROM users_targets;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function addTarget($data)
	{
		$data['User_ID'] = $this->session->userdata('logged_in')['id'];
		return $this->db->insert('users_targets', $data);
	}
}