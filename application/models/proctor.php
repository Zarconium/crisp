<?php
Class Proctor extends CI_Model
{
	function getAllProctors()
	{
		$query = $this->db->get('proctor');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllProctorsFormatted()
	{
		$this->db->distinct();
		$this->db->select('proctor.Proctor_ID, CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('proctor');
		$this->db->group_by('Full_Name');
		$this->db->order_by('proctor.Proctor_ID', 'asc');

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

	function getProctorById($id)
	{
		$this->db->select('*');
		$this->db->from('proctor');
		$this->db->where('Proctor_ID', $id);
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

	function addProctor($data)
	{
		$this->db->insert('proctor', $data);
		return $this->db->insert_id();
	}

	function addProctorApplication($data)
	{
		$this->db->insert('proctor_application', $data);
		return $this->db->insert_id();
	}
	function deleteProctorById($id)
	{
		$this->db->where('Proctor_ID', $id);
		return $this->db->delete('proctor');
	}
}
?>