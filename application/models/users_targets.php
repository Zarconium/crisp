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

	function getLFATarget($year, $target_for)
	{
		$this->db->select('*');
		$this->db->from('users_targets');
		$this->db->where('Year', $year);
		$this->db->where('Target_For', $target_for);
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

	function updateTarget($year, $target_for, $data)
	{
		$this->db->where('Year', $year);
		$this->db->where('Target_For', $target_for);
		$this->db->update('users_targets', $data);

		return $this->db->_error_message();
	}
}