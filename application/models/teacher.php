<?php
Class Teacher extends CI_Model
{
	function getAllTeachers()
	{
		$query = $this->db->get('teacher');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllTeachersFormatted()
	{
		$this->db->distinct();
		$this->db->select('teacher.Teacher_ID, teacher.Code, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Codes', false);
		$this->db->from('teacher');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'teacher.Teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('subject', 't3_tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		$this->db->group_by('Full_Name');
		$this->db->order_by('teacher.Teacher_ID', 'asc');

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

	function getAllTeachersFormattedEncoder()
	{
		$this->db->distinct();
		$this->db->select('teacher.Teacher_ID, teacher.Code, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Codes', false);
		$this->db->from('teacher');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'teacher.Teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('subject', 't3_tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->group_by('Full_Name');
		$this->db->order_by('teacher.Teacher_ID', 'asc');

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

	function getTeacherSearchResults($params)
	{
		$this->db->distinct();
		$this->db->select('teacher.Teacher_ID, teacher.Code, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Codes', false);
		$this->db->from('teacher');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'teacher.Teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('subject', 't3_tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		$this->db->group_by('Full_Name');
		$this->db->order_by('teacher.Teacher_ID', 'asc');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('teacher.School_ID', $params['school']);
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
				$this->db->where_in('t3_tracker.Subject_ID', $programs);
			}
		}

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

	function getBestT3SearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, status.Name as Status' ,false);
		$this->db->from('best_t3_tracker');
		$this->db->join('t3_tracker', 'best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'best_t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('teacher.School_ID', $params['school']);
			}
		}

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

	function getAdeptT3SearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, status.Name as Status' ,false);
		$this->db->from('adept_t3_tracker');
		$this->db->join('t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('teacher.School_ID', $params['school']);
			}
		}

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

	function getTeacherById($id)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('Teacher_ID', $id);
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

	function getTeacherIDByCode($code)
	{
		$this->db->select('teacher.teacher_ID');
		$this->db->from('teacher');
		$this->db->where('Code', $code);
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

	function getTeacherByCode($code)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('Code', $code);
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

	function getTeacherFullNameById($id)
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('teacher');
		$this->db->where('Teacher_ID', $id);
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

	function getTrainingExperiencesByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_training_experience');
		$this->db->where('Teacher_ID', $id);
		
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

	function getCertificationsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_certification');
		$this->db->where('Teacher_ID', $id);
		
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

	function getAwardsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_awards');
		$this->db->where('Teacher_ID', $id);
		
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

	function getRelevantExperiencesByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_relevant_experiences');
		$this->db->where('Teacher_ID', $id);
		
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

	function getProfessionalReferencesByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_professional_reference');
		$this->db->where('Teacher_ID', $id);
		
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

	function getAffiliationToOrganizationsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('teacher_affiliation_to_organization');
		$this->db->where('Teacher_ID', $id);
		
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

	function getRelatedTrainingsByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('related_trainings_attended');
		$this->db->where('Teacher_ID', $id);
		
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

	function getAllBestT3Trackers()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, status.Name as Status' ,false);
		$this->db->from('best_t3_tracker');
		$this->db->join('t3_tracker', 'best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'best_t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		
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

	function getAllBestT3TrackersEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, status.Name as Status' ,false);
		$this->db->from('best_t3_tracker');
		$this->db->join('t3_tracker', 'best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'best_t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		
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

	function getAllAdeptT3Trackers()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, status.Name as Status' ,false);
		$this->db->from('adept_t3_tracker');
		$this->db->join('t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		
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

	function getAllAdeptT3TrackersEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, status.Name as Status' ,false);
		$this->db->from('adept_t3_tracker');
		$this->db->join('t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('school', 'teacher.School_ID = school.School_ID', 'left');
		$this->db->join('status', 't3_tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		
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

	function getBestAdeptT3ApplicationByTeacherIdOrCode($id_code)
	{
		$this->db->select('*');
		$this->db->from('best_adept_t3_application');
		$this->db->join('t3_application', 'best_adept_t3_application.T3_Application_ID = t3_application.T3_Application_ID', 'left');
		$this->db->join('teacher_t3_application', 't3_application.T3_Application_ID = teacher_t3_application.T3_Application_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_application.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('subject', 't3_application.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('teacher.Teacher_ID', $id_code);
		$this->db->or_where('teacher.Code', $id_code);

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

	function getSmpT3ApplicationByTeacherIdOrCode($id_code)
	{
		$this->db->select('*');
		$this->db->from('smp_t3_application');
		$this->db->join('t3_application', 'smp_t3_application.T3_Application_ID = t3_application.T3_Application_ID', 'left');
		$this->db->join('teacher_t3_application', 't3_application.T3_Application_ID = teacher_t3_application.T3_Application_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_application.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->join('subject', 't3_application.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('teacher.Teacher_ID', $id_code);
		$this->db->or_where('teacher.Code', $id_code);

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

	function getBestT3AttendanceByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('best_t3_attendance');
		$this->db->join('best_t3_tracker', 'best_t3_attendance.Best_T3_Attendance_ID = best_t3_tracker.Best_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

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

	function getBestT3AttendanceByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('best_t3_attendance');
		$this->db->join('best_t3_tracker', 'best_t3_attendance.Best_T3_Attendance_ID = best_t3_tracker.Best_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Code', $Code);

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
	function getAdeptT3AttendanceByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('adept_t3_attendance');
		$this->db->join('adept_t3_tracker', 'adept_t3_attendance.Adept_T3_Attendance_ID = adept_t3_tracker.adept_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Code', $Code);

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

	function getAdeptT3AttendanceByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('adept_t3_attendance');
		$this->db->join('adept_t3_tracker', 'adept_t3_attendance.Adept_T3_Attendance_ID = adept_t3_tracker.Adept_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

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

	function getSmpT3AttendanceByTeacherId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_t3_attendance');
		$this->db->join('smp_t3_attendance_tracking', 'smp_t3_attendance.SMP_T3_Attendance_ID = smp_t3_attendance_tracking.SMP_T3_Attendance_ID', 'left');
		$this->db->join('t3_tracker', 'smp_t3_attendance_tracking.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->where('teacher_t3_tracker.Teacher_ID', $id);

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

	function getSmpT3AttendanceByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('smp_t3_attendance');
		$this->db->join('smp_t3_attendance_tracking', 'smp_t3_attendance.SMP_T3_Attendance_ID = smp_t3_attendance_tracking.SMP_T3_Attendance_ID', 'left');
		$this->db->join('smp_t3_tracker', 'smp_t3_attendance_tracking.T3_Tracker_ID = smp_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('t3_tracker', 'smp_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Code', $Code);

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

	function getSmpT3AttendanceTrackingByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('smp_t3_attendance_tracking');
		$this->db->join('smp_t3_tracker', 'smp_t3_attendance_tracking.T3_Tracker_ID = smp_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('t3_tracker', 'smp_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Code', $Code);

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

	function getStipendsByTeacherIdOrCode($id_code)
	{
		$this->db->select('*');
		$this->db->from('stipend_tracking');
		$this->db->join('stipend_tracking_list', 'stipend_tracking.Stipend_Tracking_ID = stipend_tracking_list.Stipend_Tracking_ID', 'left');
		$this->db->join('subject', 'stipend_tracking_list.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('teacher', 'stipend_tracking_list.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Teacher_ID', $id_code);
		$this->db->or_where('teacher.Code', $id_code);

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

	function getStipendTrackingByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('stipend_tracking');
		$this->db->join('stipend_tracking_list', 'stipend_tracking.Stipend_Tracking_ID = stipend_tracking_list.Stipend_Tracking_ID', 'left');
		$this->db->join('teacher', 'stipend_tracking_list.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Teacher_ID', $Code);

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

	function getStipendTrackingListByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('stipend_tracking_list');
		$this->db->join('teacher', 'stipend_tracking_list.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Teacher_ID', $Code);

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

	function getGcatTrackerByTeacherEmail($Email)
	{
		$this->db->select('*');
		$this->db->from('gcat_tracker');
		$this->db->join('t3_tracker', 'gcat_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher_t3_tracker', 't3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('teacher', 'teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Email', $Email);

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

	function addTeacher($data)
	{
		$this->db->insert('teacher', $data);
		return $this->db->insert_id();
	}

	function addTeacherTrainingExperience($data)
	{
		$this->db->insert('teacher_training_experience', $data);
		return $this->db->insert_id();
	}

	function addTeacherCertification($data)
	{
		$this->db->insert('teacher_certification', $data);
		return $this->db->insert_id();
	}

	function addTeacherAwards($data)
	{
		$this->db->insert('teacher_awards', $data);
		return $this->db->insert_id();
	}

	function addTeacherRelevantExperiences($data)
	{
		$this->db->insert('teacher_relevant_experiences', $data);
		return $this->db->insert_id();
	}

	function addTeacherProfessionalReference($data)
	{
		$this->db->insert('teacher_professional_reference', $data);
		return $this->db->insert_id();
	}

	function addTeacherAffiliationToOrganization($data)
	{
		$this->db->insert('teacher_affiliation_to_organization', $data);
		return $this->db->insert_id();
	}

	function addT3Application($data)
	{
		$this->db->insert('t3_application', $data);
		return $this->db->insert_id();
	}

	function addTeacherT3Application($data)
	{
		$this->db->insert('teacher_t3_application', $data);
		return $this->db->insert_id();
	}

	function addRelatedTrainingsAttended($data)
	{
		$this->db->insert('related_trainings_attended', $data);
		return $this->db->insert_id();
	}

	function addBestAdeptT3Application($data)
	{
		$this->db->insert('best_adept_t3_application', $data);
		return $this->db->insert_id();
	}

	function addSmpT3Application($data)
	{
		$this->db->insert('smp_t3_application', $data);
		return $this->db->insert_id();
	}

	function addT3Tracker($data)
	{
		$this->db->insert('t3_tracker', $data);
		return $this->db->insert_id();
	}

	function addTeacherT3Tracker($data)
	{
		$this->db->insert('teacher_t3_tracker', $data);
		return $this->db->insert_id();
	}

	function addBestT3Attendance()
	{
		$this->db->query('INSERT INTO best_t3_attendance () VALUES ();');
		return $this->db->insert_id();
	}

	function addAdeptT3Attendance()
	{
		$this->db->query('INSERT INTO adept_t3_attendance () VALUES ();');
		return $this->db->insert_id();
	}

	function addSmpT3Attendance()
	{
		$this->db->query('INSERT INTO smp_t3_attendance () VALUES ();');
		return $this->db->insert_id();
	}

	function addSmpT3AttendanceTracking($data)
	{
		$this->db->insert('smp_t3_attendance_tracking', $data);
		return $this->db->insert_id(); 
	}

	function addBestT3Grades()
	{
		$this->db->query('INSERT INTO best_t3_grades () VALUES ();');
		return $this->db->insert_id();
	}

	function addAdeptT3Grades()
	{
		$this->db->query('INSERT INTO adept_t3_grades () VALUES ();');
		return $this->db->insert_id();
	}

	function addBestT3Tracker($data)
	{
		$this->db->insert('best_t3_tracker', $data);
		return $this->db->insert_id(); 
	}

	function addAdeptT3Tracker($data)
	{
		$this->db->insert('adept_t3_tracker', $data);
		return $this->db->insert_id(); 
	}

	function updateTeacherById($id, $data)
	{
		$this->db->where('Teacher_ID', $id);
		$this->db->update('teacher', $data);

		return $this->db->_error_message();
	}

	function updateTeacherByCode($code, $data)
	{
		$this->db->where('Code', $code);
		$this->db->update('teacher', $data);

		return $this->db->_error_message();
	}

	function deleteTeacherById($id)
	{
		$this->db->where('Teacher_ID', $id);
		return $this->db->delete('teacher');
	}

	function deleteT3Trackers()
	{
		$this->db->where('Teacher_ID', NULL);
		return $this->db->delete('t3_tracker USING t3_tracker LEFT JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID');	
	}

	function deleteTeacherTrainingExperienceById($id)
	{
		$this->db->where('Teacher_Training_Experience_ID', $id);
		return $this->db->delete('teacher_training_experience');
	}

	function deleteTeacherCertificationById($id)
	{
		$this->db->where('Teacher_Certification_ID', $id);
		return $this->db->delete('teacher_certification');
	}

	function deleteTeacherAwardsById($id)
	{
		$this->db->where('Teacher_Awards_ID', $id);
		return $this->db->delete('teacher_awards');
	}

	function deleteTeacherRelevantExperiencesById($id)
	{
		$this->db->where('Teacher_Relevant_Experiences_ID', $id);
		return $this->db->delete('teacher_relevant_experiences');
	}

	function deleteTeacherProfessionalReferenceById($id)
	{
		$this->db->where('Teacher_Professional_Reference_ID', $id);
		return $this->db->delete('teacher_professional_reference');
	}

	function deleteTeacherAffiliationToOrganizationById($id)
	{
		$this->db->where('Teacher_Affiliation_to_Organization_ID', $id);
		return $this->db->delete('teacher_affiliation_to_organization');
	}

	function getBestT3TrackerByTeacherCode($Code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('teacher');
		$this->db->join('teacher_t3_tracker', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'right');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'right');
		$this->db->join('best_t3_tracker', 't3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID', 'right');
		$this->db->where('teacher.code', $Code);

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
	function getAdeptT3TrackerByTeacherCode($Code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(teacher.Last_Name), teacher.Last_Name, NULL), ", ", IF(LENGTH(teacher.First_Name), teacher.First_Name, NULL), " ", IF(LENGTH(teacher.Middle_Initial), teacher.Middle_Initial, NULL), ". ", IF(LENGTH(teacher.Name_Suffix), teacher.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('teacher');
		$this->db->join('teacher_t3_tracker', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'right');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'right');
		$this->db->join('adept_t3_tracker', 't3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID', 'right');
		$this->db->where('teacher.code', $Code);

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
	function getTeacherProfessionalReferenceByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('teacher_professional_reference');
		$this->db->join('teacher', 'teacher_professional_reference.Teacher_ID = teacher.Teacher_ID', 'left');
		$this->db->where('teacher.Code', $Code);

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
	function getT3TrackerByTeacherCode($Code)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->join('teacher_t3_tracker', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'right');
		$this->db->join('t3_tracker', 'teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'right');
		$this->db->where('teacher.code', $Code);

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

	function updateBestT3Tracker($code,$subject,$best_t3_tracker)
	{
		$this->db->set($best_t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('best_t3_tracker JOIN t3_tracker ON best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID');
		return $this->db->_error_message();
	}

	function updateAdeptT3Tracker($code,$subject,$adept_t3_tracker)
	{
		$this->db->set($adept_t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('adept_t3_tracker JOIN t3_tracker ON adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID');

		return $this->db->_error_message();
	}

	function updateTeacherProfessionalReference($code,$subject,$teacher_professional_reference)
	{
		$this->db->set($teacher_professional_reference);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('teacher_professional_reference 
			JOIN teacher ON teacher_professional_reference.Teacher_ID = teacher.Teacher_ID 
			JOIN teacher_t3_tracker ON teacher.Teacher_ID = teacher_t3_tracker.Teacher_ID 
			JOIN t3_tracker ON teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID 
			JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function updateT3Tracker($code,$subject,$t3_tracker)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');

		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code',$subject);
		$this->db->update('t3_tracker', $tracker); */
//new
		$this->db->set($t3_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('t3_tracker JOIN teacher_t3_tracker ON teacher_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');
		
		return $this->db->_error_message();
	}
	function updateProductTracker($code,$subject,$product_tracker)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');

		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code',$subject);
		$this->db->update('t3_tracker', $tracker); */
//new
		$this->db->set($product_tracker);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('t3_tracker 
			JOIN best_t3_tracker ON t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID
			JOIN teacher_t3_tracker ON teacher_t3_tracker.T3_Tracker_ID = T3_tracker.T3_Tracker_ID 
			JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID 
			JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');
		
		return $this->db->_error_message();
	}

	function updateTeacherAdeptAttendance($code,$subject,$adept_t3_attendance)
	{
		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('Adept_T3_Tracker', 'Adept_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('Adept_T3_Attendance', 'Adept_T3_Attendance.Adept_T3_Attendance_ID = Adept_T3_Tracker.Adept_T3_Attendance_ID','left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('Student.Student_Code = "'.$code.'" ');
		$this->db->where('Subject.Subject_Code = "'.$subject.'"');
		$this->db->update('Adept_T3_Attendance', $tracker); */
//new
		$this->db->set($adept_t3_attendance);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('adept_t3_attendance JOIN adept_t3_tracker ON adept_t3_attendance.Adept_T3_Attendance_ID = adept_t3_tracker.Adept_T3_Attendance_ID JOIN t3_tracker ON adept_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function updateTeacherBestAttendance($code,$subject,$best_t3_attendance)
	{
		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('Best_T3_Tracker', 'Best_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('Best_T3_Attendance', 'Best_T3_Attendance.Best_T3_Attendance_ID = Best_T3_Tracker.Best_T3_Attendance_ID','left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('Student.Student_Code = $code');
		$this->db->where('Subject.Subject_Code = $subject');
		$this->db->update('Best_T3_Attendance', $tracker);*/
//new
		$this->db->set($best_t3_attendance);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('best_t3_attendance JOIN best_t3_tracker ON best_t3_attendance.Best_T3_Attendance_ID = best_t3_tracker.Best_T3_Attendance_ID JOIN t3_tracker ON best_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher.teacher_ID = teacher_t3_tracker.Teacher_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}
	function updateTeacherSMPAttendanceTracking($code,$subject,$smp_t3_attendance_tracking)
	{
		$this->db->set($smp_t3_attendance_tracking);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('smp_t3_attendance_tracking JOIN smp_t3_tracker ON smp_t3_attendance_tracking.T3_Tracker_ID = smp_t3_tracker.T3_Tracker_ID JOIN t3_tracker ON smp_t3_tracker.T3_Tracker_ID =t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = Teacher_T3_tracker.T3_Tracker_ID JOIN teacher ON Teacher.teacher_ID = teacher_t3_tracker.Teacher_ID');

		return $this->db->_error_message();
	}

	function updateTeacherSMPAttendance($code,$subject,$smp_t3_attendance)
	{

		/*$this->db->join('teacher_t3_tracker', 'teacher_t3_tracker.Tracker_ID = T3_tracker.Tracker_ID');
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_t3_tracker.Teacher_ID', 'left');
		$this->db->join('SMP_T3_Tracker', 'SMP_T3_Tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('SMP_T3_Attendance_Tracking', 'SMP_T3_Attendance_Tracking.T3_Tracker_ID = t3_tracker.T3_Tracker_ID', 'left');
		$this->db->join('SMP_T3_Attendance', 'SMP_T3_Attendance.SMP_T3_Attendance_ID = SMP_T3_Attendance_Tracking.SMP_T3_Attendance_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->where('Student.Student_Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('SMP_T3_Attendance', $tracker);*/

//new
		$this->db->set($smp_t3_attendance);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('smp_t3_attendance JOIN smp_t3_attendance_tracking ON smp_t3_attendance.SMP_T3_Attendance_ID = smp_t3_attendance_tracking.SMP_T3_Attendance_ID JOIN smp_t3_tracker ON smp_t3_attendance_tracking.T3_Tracker_ID = smp_t3_tracker.T3_Tracker_ID JOIN t3_tracker ON smp_t3_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN subject ON t3_tracker.Subject_ID = subject.Subject_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = Teacher_T3_tracker.T3_Tracker_ID JOIN teacher ON Teacher.teacher_ID = teacher_t3_tracker.Teacher_ID');

		return $this->db->_error_message();
	}

	function updateStipendTrackingList($code, $subject, $stipend_tracking_list)
	{
		/*$this->db->join('Stipend_Tracking_List', 'Stipend_Tracking_List.Teacher_ID = Teacher.Teacher_ID');
		$this->db->join('Stipend_Tracking', 'Stipend_Tracking.Stipend_Tracking_ID = Stipend_Tracking_List.Stipend_Tracking_ID');
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('Stipend_Tracking', $stipend);*/

//new
		$this->db->set($stipend_tracking_list);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('stipend_tracking_list JOIN subject ON stipend_tracking_list.Subject_ID = subject.Subject_ID JOIN stipend_tracking ON stipend_tracking_list.Stipend_Tracking_ID = stipend_tracking.Stipend_Tracking_ID JOIN teacher ON stipend_tracking_list.teacher_ID = teacher.Teacher_ID');

		return $this->db->_error_message();
	}
	function updateStipendTracking($code, $subject, $stipend_tracking)
	{
		$this->db->set($stipend_tracking);
		$this->db->where('Teacher.Code', $code);
		$this->db->where('Subject.Subject_Code', $subject);
		$this->db->update('stipend_tracking JOIN stipend_tracking_list ON stipend_tracking.Stipend_Tracking_ID = stipend_tracking_list.Stipend_Tracking_ID JOIN subject ON stipend_tracking_list.Subject_ID = subject.Subject_ID JOIN teacher ON stipend_tracking_list.Teacher_ID = teacher.Teacher_ID');

		return $this->db->_error_message();
	}

	function updateBestGrade($Best_T3_Tracker, $Best_T3_Grades)
	{
		$this->db->set($Best_T3_Grades);
		$this->db->where('best_t3_tracker.User_Name', $Best_T3_Tracker);
		$this->db->update('best_t3_grades JOIN best_t3_tracker ON best_t3_grades.Best_T3_Grades_ID = best_t3_tracker.Best_T3_Grades_ID');

		return $this->db->_error_message();
	}
	function updateAdeptGrade($Adept_T3_Tracker, $Adept_T3_Grades)
	{
		$this->db->set($Adept_T3_Grades);
		$this->db->where('adept_t3_tracker.User_Name', $Adept_T3_Tracker);
		$this->db->update('adept_t3_Grades JOIN adept_t3_tracker ON adept_t3_grades.Adept_T3_Grades_ID = adept_t3_tracker.Adept_T3_Grades_ID');

		return $this->db->_error_message();
	}
	function getTeacherByUsernameBest($Best_T3_Tracker)
	{
		$this->db->select('*');
		$this->db->from('best_t3_tracker');
		$this->db->where('User_Name', $Best_T3_Tracker);
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

	function getBestT3GradesbyUsername($User_Name)
	{
		$this->db->select('*');
		$this->db->from('best_t3_grades');
		$this->db->join('best_t3_tracker', 'best_t3_grades.Best_T3_Grades_ID = best_t3_tracker.Best_T3_Grades_ID', 'left');
		$this->db->where('User_Name', $User_Name);
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

	function getAdeptT3GradesbyUsername($User_Name)
	{
		$this->db->select('*');
		$this->db->from('adept_t3_grades');
		$this->db->join('adept_t3_tracker', 'adept_t3_grades.Adept_T3_Grades_ID = adept_t3_tracker.Adept_T3_Grades_ID', 'left');
		$this->db->where('User_Name', $User_Name);
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

	function getTeacherByUsernameAdept($Adept_T3_Tracker)
	{
		$this->db->select('*');
		$this->db->from('adept_t3_tracker');
		$this->db->where('User_Name', $Adept_T3_Tracker);
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
	function getTeacherByEmail($Email)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where('Email', $Email);
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
	
	function updateGcatGrade($Email, $Gcat_Tracker)
	{
		$this->db->set($Gcat_Tracker);
		$this->db->where('teacher.Email', $Email);
		$this->db->update('gcat_tracker JOIN t3_tracker on gcat_tracker.T3_Tracker_ID = t3_tracker.T3_Tracker_ID JOIN teacher_t3_tracker ON t3_tracker.T3_Tracker_ID = teacher_t3_tracker.T3_Tracker_ID JOIN teacher ON teacher_t3_tracker.Teacher_ID = teacher.Teacher_ID');

		return $this->db->_error_message();
	}

	function addT3ClassList($data, $email)
	{
		$this->db->insert('T3_class', $data);
		$this->db->join('master_trainer', 'master_trainer.master_trainer_ID = T3_class.master_trainer_ID', 'left');
		$this->db->join('school', 'school.School_ID = class.School_ID', 'left');
		$this->db->join('subject', 'subject.Subject_ID = class.Subject_ID', 'left');
		$this->db->where('master_trainer.master_trainer_ID', $email);
		return $this->db->insert_id();
	}


	function addTeacherClassList($data)
	{
		$this->db->insert('teacher_class', $data);
		$this->db->join('teacher', 'teacher.teacher_ID = teacher_class.teacher_ID', 'left');
		$this->db->join('T3_class', 'T3_class.T3_class_ID = teacher_class.T3_class_ID', 'left');
		return $this->db->insert_id();
	}

	function addStipendTracking($stipend_tracking)

	{
		$this->db->insert('stipend_tracking', $stipend_tracking);
		return $this->db->insert_id();
	}

	function addStipendTrackingList($stipend_tracking_list)
	{
		$this->db->insert('stipend_tracking_list', $stipend_tracking_list);
		return $this->db->insert_id();
	}

	function addGcatTracker($Gcat_Tracker)
	{
		$this->db->insert('gcat_tracker', $Gcat_Tracker);
		return $this->db->insert_id();
	}
}
?>