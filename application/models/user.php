<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('Username', $username);
		$this->db->where('Password', MD5($password));
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

	function getAllUsersFormatted()
	{		
		$this->db->select('User_ID, Username, First_Name, Last_Name, Type, CONCAT(school.Name, " - ", school.Branch) AS School_Name', false);
		$this->db->from('users');
		$this->db->join('school', 'users.School_ID = school.School_ID', 'left');

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

	function getUserById($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('User_ID', $id);
		
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
		$this->db->where('User_ID', $id);
		$this->db->update('users', $data);
	}

	function deleteUserById($id)
	{
		$this->db->where('User_ID', $id);
		$this->db->delete('users');
	}
}
?>