<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
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

	function getAllUsers()
	{		
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getUserById($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		
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

	function addUser($data)
	{
		$this->db->insert('users', $data);
	}

	function editUserById($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	function deleteUserById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}
?>