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

	function getLFATargets1()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=1;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets2()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=2;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets3()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=3;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets4()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=4;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets5()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=5;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets6()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=6;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets7()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=7;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets8()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=8;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	function getLFATargets9()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=9;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets10()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=10;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	//////
	function getLFATargets11()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=11;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets12()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=12;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets13()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=13;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets14()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=14;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets15()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=15;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets16()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=16;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets17()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=17;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets18()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=18;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getLFATargets19()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=19;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function getLFATargets20()
	{
		$query = $this->db->query('SELECT * FROM users_targets where users_targets.users_targets_id=20;');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

}