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
	
	function getStatusIDByName($name)
		{
			$this->db->select('Status_ID');
			$this->db->from('status');
			$this->db->where('Name', $name);
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1)
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