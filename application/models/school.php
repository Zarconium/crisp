<?php
Class School extends CI_Model
{
	function getAllSchools()
	{
		$this->db->select('*');
		$this->db->from('school');
		$this->db->order_by('school.Code', 'asc');

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

	function getSchoolIdByCode($code)
	{
		$this->db->select('School_ID');
		$this->db->from('school');
		$this->db->where('Code', $code);
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
	
	function getSchoolByCode($code)
	{
		$query = $this->db->query('SELECT * FROM school as s WHERE s.Code="'.$code.'";');
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getSchoolById($id)
	{
		$this->db->select('*');
		$this->db->from('school');
		$this->db->where('School_ID', $id);
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

	function getEncoderSchool()
	{
		$this->db->select('*');
		$this->db->from('school');
		$this->db->where('School_ID', $this->session->userdata('logged_in')['School_ID']);
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