<?php
Class Student extends CI_Model
{
	function addTarget($data)
	{
		$this->db->insert('target', $data);
		return $this->db->insert_id();
	}

}
?>