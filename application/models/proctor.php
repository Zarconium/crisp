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
<<<<<<< HEAD
		$this->db->select('proctor.Proctor_ID, CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(subject.Subject_Code) as Subject_Codes', false);
		$this->db->from('proctor');
		$this->db->join('school', 'proctor.School_ID = school.School_ID', 'left');
		$this->db->join('proctor_tracker', 'proctor.Proctor_ID = proctor_tracker.Proctor_ID', 'left');
		$this->db->join('tracker', 'proctor_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		// $this->db->where('status.Name', 'Passed');
		// $this->db->or_where('status.Name', 'Fail');
		// $this->db->or_where('status.Name', 'Currently Taking');
		// $this->db->or_where('status.Name', 'Dropped');
=======
		$this->db->select('proctor.Proctor_ID, CONCAT_WS("", IF(LENGTH(proctor.Last_Name), proctor.Last_Name, NULL), ", ", IF(LENGTH(proctor.First_Name), proctor.First_Name, NULL), " ", IF(LENGTH(proctor.Middle_Initial), proctor.Middle_Initial, NULL), ". ", IF(LENGTH(proctor.Name_Suffix), proctor.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('proctor');
>>>>>>> aa9626507cdefc344b34cb5ec675b6267086a068
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

<<<<<<< HEAD
	function getProctorByCode($code)
	{
		$this->db->select('*');
		$this->db->from('proctor');
		$this->db->where('Code', $code);
=======
	function getProctorById($id)
	{
		$this->db->select('*');
		$this->db->from('proctor');
		$this->db->where('Proctor_ID', $id);
		$this->db->limit(1);
>>>>>>> aa9626507cdefc344b34cb5ec675b6267086a068
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
<<<<<<< HEAD
			return $query->result();
=======
			return $query->row();
>>>>>>> aa9626507cdefc344b34cb5ec675b6267086a068
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
<<<<<<< HEAD

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

	function updateProctorByCode($code, $data)
	{
		$this->db->where('Code', $code);
		$this->db->update('proctor', $data);

		return $this->db->affected_rows();
	}

=======
>>>>>>> aa9626507cdefc344b34cb5ec675b6267086a068
	function deleteProctorById($id)
	{
		$this->db->where('Proctor_ID', $id);
		return $this->db->delete('proctor');
	}
}
?>