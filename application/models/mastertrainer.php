<?php
Class Mastertrainer extends CI_Model
{
	function getAllMasterTrainer()
	{
		$query = $this->db->get('Master_Trainer');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllMasterTrainersFormatted()
	{
		$this->db->distinct();
		$this->db->select('master_trainer.Master_Trainer_ID, CONCAT_WS("", IF(LENGTH(master_trainer.Last_Name), master_trainer.Last_Name, NULL), ", ", IF(LENGTH(master_trainer.First_Name), master_trainer.First_Name, NULL), " ", IF(LENGTH(master_trainer.Middle_Initial), master_trainer.Middle_Initial, NULL), ". ", IF(LENGTH(master_trainer.Name_Suffix), master_trainer.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(subject.Subject_Code) as Subject_Codes', false);
		$this->db->from('master_trainer');
		$this->db->join('t3_class', 'master_trainer.Master_Trainer_ID = t3_class.Master_Trainer_ID', 'left');
		$this->db->join('school', 't3_class.School_ID = school.School_ID', 'left');
		$this->db->join('subject', 't3_class.Subject_ID = subject.Subject_ID', 'left');
		// $this->db->where('status.Name', 'Passed');
		// $this->db->or_where('status.Name', 'Fail');
		// $this->db->or_where('status.Name', 'Currently Taking');
		// $this->db->or_where('status.Name', 'Dropped');
		$this->db->group_by('Full_Name');
		$this->db->order_by('Master_Trainer.Master_Trainer_ID', 'asc');

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

	function getMasterTrainerById($id)
	{
		$this->db->select('*');
		$this->db->from('master_trainer');
		$this->db->where('Master_Trainer_ID', $id);
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


	function getMasterTrainerFullNameById($id)
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(master_trainer.Last_Name), master_trainer.Last_Name, NULL), ", ", IF(LENGTH(master_trainer.First_Name), master_trainer.First_Name, NULL), " ", IF(LENGTH(master_trainer.Middle_Initial), master_trainer.Middle_Initial, NULL), ". ", IF(LENGTH(master_trainer.Name_Suffix), master_trainer.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('master_trainer');
		$this->db->where('Master_Trainer_ID', $id);
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

	function addMasterTrainer($data)
	{
		$this->db->insert('master_trainer', $data);
		return $this->db->insert_id();
	}

	function updateMasterTrainerById($id, $data)
	{
		$this->db->where('Master_Trainer_ID', $id);
		$this->db->update('master_trainer', $data);

		return $this->db->_error_message();
	}

	function deleteMasterTrainerById($id)
	{
		$this->db->where('Master_Trainer_ID', $id);
		return $this->db->delete('master_trainer');
	}
}
?>