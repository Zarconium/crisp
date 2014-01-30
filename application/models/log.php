<?php
Class Log extends CI_Model
{
	function getAllLogs()
	{
		$this->db->select('*');
		$this->db->from('log');
		$this->db->join('users', 'log.User_ID = users.User_ID');
		$this->db->order_by('log.Created_At', 'desc');

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

	function addLog($changes)
	{
		$data = array
		(
			'User_ID' => $this->session->userdata('logged_in')['id'],
			'Changes' => $changes
		);

		$this->db->insert('log', $data);
		return $this->db->insert_id();
	}
}
?>