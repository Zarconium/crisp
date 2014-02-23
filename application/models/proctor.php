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
		$this->db->select('proctor.Proctor_ID, CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name, GROUP_CONCAT(school.Name, " - ", school.Branch SEPARATOR ", ") as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Code', false);
		$this->db->from('proctor');
		$this->db->join('gcat_class', 'proctor.Proctor_ID = gcat_class.Proctor_ID', 'left');
		$this->db->join('class', 'gcat_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('school', 'class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 'class.Subject_ID = subject.Subject_ID', 'left');
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

	function getProctorSearchResults($params)
	{
		$this->db->distinct();
		$this->db->select('proctor.Proctor_ID, CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Code', false);
		$this->db->from('proctor');
		$this->db->join('gcat_class', 'proctor.Proctor_ID = gcat_class.Proctor_ID', 'left');
		$this->db->join('class', 'gcat_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('school', 'class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 'class.Subject_ID = subject.Subject_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('proctor.Last_Name', $params['name']);
				$this->db->or_like('proctor.First_Name', $params['name']);
				$this->db->or_like('proctor.Middle_Initial', $params['name']);
				$this->db->or_like('proctor.Name_Suffix', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('school.School_ID', $params['school']);
			}
			$programs = FALSE;
			if (isset($params['gcat']))
			{
				$programs[] = 1;
			}
			if (isset($params['best']))
			{
				$programs[] = 2;
				$programs[] = 8;
			}
			if (isset($params['adept']))
			{
				$programs[] = 3;
				$programs[] = 8;
			}
			if (isset($params['smp']))
			{
				$programs[] = 4;
				$programs[] = 5;
				$programs[] = 6;
				$programs[] = 7;
				$programs[] = 10;
				$programs[] = 11;
			}
			if ($programs)
			{
				$this->db->where_in('subject.Subject_ID', $programs);
			}
		}

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

	function getProctorByCode($code)
	{
		$this->db->select('*');
		$this->db->from('proctor');
		$this->db->where('Code', $code);
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

	function getProctorFullNameById($id)
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name', false);
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

	function addTracker($data)
	{
		$this->db->insert('tracker', $data);
		return $this->db->insert_id();
	}

	function addSmpProctor($data)
	{
		$this->db->insert('smp_proctor', $data);
		return $this->db->insert_id();
	}

	function addGcatProctor($data)
	{
		$this->db->insert('gcat_proctor', $data);
		return $this->db->insert_id();
	}

	function addBestProctor($data)
	{
		$this->db->insert('best_proctor', $data);
		return $this->db->insert_id();
	}

	function addAdeptProctor($data)
	{
		$this->db->insert('adept_proctor', $data);
		return $this->db->insert_id();
	}

	function addSmpProctorCoursesTaken($data)
	{
		$this->db->insert('smp_proctor_courses_taken', $data);
		return $this->db->insert_id();
	}

	function updateProctorById($id, $data)
	{
		$this->db->where('Proctor_ID', $id);
		$this->db->update('proctor', $data);

		return $this->db->_error_message();
	}

	function deleteProctorById($id)
	{
		$this->db->where('Proctor_ID', $id);
		return $this->db->delete('proctor');
	}
}
?>