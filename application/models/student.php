<?php
Class Student extends CI_Model
{
	function getAllStudents()
	{
		$query = $this->db->get('student');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAllStudentsFormatted()
	{
		$this->db->distinct();
		$this->db->select('student.Student_ID, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Codes', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getStudentSearchResults($params)
	{
		$this->db->distinct();
		$this->db->select('student.Student_ID, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Codes', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('student.School_ID', $params['school']);
			}
			$programs = FALSE;
			if (isset($params['gcat']))
			{
				$programs[] = 1;
			}
			if (isset($params['best']))
			{
				$programs[] = 2;
			}
			if (isset($params['adept']))
			{
				$programs[] = 3;
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
				$this->db->where_in('tracker.Subject_ID', $programs);
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

	function getAllStudentsFormattedEncoder()
	{
		$this->db->distinct();
		$this->db->select('student.Student_ID, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name, GROUP_CONCAT(DISTINCT subject.Subject_Code SEPARATOR ", ") as Subject_Codes', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('student_tracker', 'student.Student_ID = student_tracker.Student_ID', 'left');
		$this->db->join('tracker', 'student_tracker.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getSmpStudentSearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('student.School_ID', $params['school']);
			}
			$programs = FALSE;
			if (isset($params['bizcom']))
			{
				$programs[] = 10;
			}
			if (isset($params['bpo101']))
			{
				$programs[] = 6;
			}
			if (isset($params['bpo102']))
			{
				$programs[] = 7;
			}
			if (isset($params['sc101']))
			{
				$programs[] = 4;
			}
			if (isset($params['systh101']))
			{
				$programs[] = 5;
			}
			if ($programs)
			{
				$this->db->where_in('tracker.Subject_ID', $programs);
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

	function getInternshipStudentSearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, status.Name as Status_Name', false);
		$this->db->from('internship_student');
		$this->db->join('tracker', 'internship_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('student.School_ID', $params['school']);
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

	function getGcatStudentSearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('gcat_student');
		$this->db->join('tracker', 'gcat_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('student.School_ID', $params['school']);
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

	function getBestStudentSearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('best_student');
		$this->db->join('tracker', 'best_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('student.School_ID', $params['school']);
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

	function getAdeptStudentSearchResults($params)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('adept_student');
		$this->db->join('tracker', 'adept_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');

		if ($params)
		{
			if (isset($params['name']))
			{
				$this->db->like('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL))', $params['name']);
			}
			if (isset($params['school']))
			{
				$this->db->where('student.School_ID', $params['school']);
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

	function getStudentById($id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('Student_ID', $id);
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

	function getStudentByCode($code)
	{
		$this->db->select('*');
		$this->db->from('student');
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

	function getStudentByEmail($email)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('Email', $email);
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

	function getStudentFullNameById($id)
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('student');
		$this->db->where('Student_ID', $id);
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

	function getTrackerByStudentCodeAndSubjectId($code, $subject)
	{
		$this->db->select('*');
		$this->db->from('tracker');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID' ,'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID' ,'left');
		$this->db->where('student.Code', $code);
		$this->db->where('tracker.Subject_ID', $subject);
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

	function getAllGcatStudents()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('gcat_student');
		$this->db->join('tracker', 'gcat_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		// $this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		// $this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		// $this->db->join('gcat_class', 'class.Class_ID = gcat_class.Class_ID', 'left');
		// $this->db->join('proctor', 'gcat_class.Proctor_ID = proctor.Proctor_ID', 'left');
		$this->db->order_by('student.Student_ID', 'asc');
		
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

	function getAllGcatStudentsEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('gcat_student');
		$this->db->join('tracker', 'gcat_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->order_by('student.Student_ID', 'asc');
		
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

	function getGcatStudentByStudentIdOrCode($id_code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, student.School_ID as School, status.Name as Status_Name', false);
		$this->db->from('gcat_student');
		$this->db->join('tracker', 'gcat_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		$this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('gcat_class', 'class.Class_ID = gcat_class.Class_ID', 'left');
		$this->db->join('proctor', 'gcat_class.Proctor_ID = proctor.Proctor_ID', 'left');
		$this->db->where('student.Student_ID', $id_code);
		$this->db->or_where('student.Code', $id_code);
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

	function getAllBestStudents()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('best_student');
		$this->db->join('tracker', 'best_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getAllBestStudentsEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('best_student');
		$this->db->join('tracker', 'best_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getBestStudentByStudentIdOrCode($id_code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, status.Name as Status_Name', false);
		$this->db->from('best_student');
		$this->db->join('tracker', 'best_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->where('student.Student_ID', $id_code);
		$this->db->or_where('student.Code', $id_code);
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

	function getBestStudentByUsername($username)
	{
		$this->db->select('*');
		$this->db->from('best_student');
		$this->db->where('Username', $username);
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

	function getAllAdeptStudents()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('adept_student');
		$this->db->join('tracker', 'adept_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getAllAdeptStudentsEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('adept_student');
		$this->db->join('tracker', 'adept_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getAdeptStudentByStudentIdOrCode($id_code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, status.Name as Status_Name', false);
		$this->db->from('adept_student');
		$this->db->join('tracker', 'adept_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->where('student.Student_ID', $id_code);
		$this->db->or_where('student.Code', $id_code);
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

	function getAdeptStudentByUsername($username)
	{
		$this->db->select('*');
		$this->db->from('adept_student');
		$this->db->where('Username', $username);
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

	function getAllInternshipStudents()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('internship_student');
		$this->db->join('tracker', 'internship_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getAllInternshipStudentsEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('internship_student');
		$this->db->join('tracker', 'internship_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getInternshipByStudentIdOrCode($id_code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, status.Name as Status_Name', false);
		$this->db->from('internship_student');
		$this->db->join('tracker', 'internship_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id_code);
		$this->db->or_where('student.Code', $id_code);
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

	function getAllSmpStudents()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getAllSmpStudentsEncoder()
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('school.School_ID', $this->session->userdata('logged_in')['School_ID']);
		$this->db->group_by('Full_Name');
		$this->db->order_by('student.Student_ID', 'asc');

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

	function getSmpStudentByStudentIdOrCode($id_code)
	{
		$this->db->select('*, CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name', false);
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id_code);
		$this->db->or_where('student.Code', $id_code);
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

	function getBizComByStudentId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		$this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id);
		$this->db->where('subject.Subject_Code', 'BizCom');
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

	function getBpo101ByStudentId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		$this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id);
		$this->db->where('subject.Subject_Code', 'BPO101');
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

	function getBpo102ByStudentId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		$this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id);
		$this->db->where('subject.Subject_Code', 'BPO102');
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

	function getSc101ByStudentId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		$this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id);
		$this->db->where('subject.Subject_Code', 'SC101');
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

	function getSysth101ByStudentId($id)
	{
		$this->db->select('*');
		$this->db->from('smp_student');
		$this->db->join('tracker', 'smp_student.Tracker_ID = tracker.Tracker_ID', 'left');
		$this->db->join('student_tracker', 'tracker.Tracker_ID = student_tracker.Tracker_ID', 'left');
		$this->db->join('student', 'student_tracker.Student_ID = student.Student_ID', 'left');
		$this->db->join('student_class', 'student.Student_ID = student_class.Student_ID', 'left');
		$this->db->join('class', 'student_class.Class_ID = class.Class_ID', 'left');
		$this->db->join('subject', 'tracker.Subject_ID = subject.Subject_ID', 'left');
		$this->db->join('status', 'tracker.Status_ID = status.Status_ID', 'left');
		$this->db->where('student.Student_ID', $id);
		$this->db->where('subject.Subject_Code', 'SYSTH101');
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

	function addStudent($data)
	{
		$this->db->insert('student', $data);
		return $this->db->insert_id();
	}

	function addStudentApplication($data)
	{
		$this->db->insert('student_application', $data);
		return $this->db->insert_id();
	}

	function addTracker($data)
	{
		$this->db->insert('tracker', $data);
		return $this->db->insert_id();
	}

	function addStudentTracker($data)
	{
		$this->db->insert('student_tracker', $data);
		return $this->db->insert_id();
	}

	function addSmpStudent($data)
	{
		$this->db->insert('smp_student', $data);
		return $this->db->insert_id();
	}

	function addGcatStudent($data)
	{
		$this->db->insert('gcat_student', $data);
		return $this->db->insert_id();
	}

	function addBestStudent($data)
	{
		$this->db->insert('best_student', $data);
		return $this->db->insert_id();
	}

	function addAdeptStudent($data)
	{
		$this->db->insert('adept_student', $data);
		return $this->db->insert_id();
	}

	function addSmpStudentCoursesTaken($data)
	{
		$this->db->insert('smp_student_courses_taken', $data);
		return $this->db->insert_id();
	}

	function addInternshipStudent($data)
	{
		$this->db->insert('internship_student', $data);
		return $this->db->insert_id();
	}

	function updateStudentById($id, $data)
	{
		$this->db->where('Student_ID', $id);
		$this->db->update('student', $data);

		return $this->db->_error_message();
	}

	function updateStudentByCode($code, $data)
	{
		$this->db->where('Code', $code);
		$this->db->update('student', $data);

		return $this->db->_error_message();
	}

	function updateBestStudent($code, $subject, $tracker)
	{
		$this->db->set($tracker);
		$this->db->where('student.Code', $code);
		$this->db->where('subject.Subject_Code', $subject);
		$this->db->update('best_student JOIN tracker ON best_student.Tracker_ID = tracker.Tracker_ID JOIN student_tracker ON tracker.Tracker_ID = student_tracker.Tracker_ID JOIN student ON student_tracker.Student_ID = student.Student_ID JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function updateBestStudentByUsername($username, $tracker)
	{
		$this->db->where('Username', $username);
		$this->db->update('best_student', $tracker);

		return $this->db->_error_message();
	}

	function updateAdeptStudent($code, $subject, $tracker)
	{
		$this->db->set($tracker);
		$this->db->where('student.Code', $code);
		$this->db->where('subject.Subject_Code', $subject);
		$this->db->update('adept_student JOIN tracker ON adept_student.Tracker_ID = tracker.Tracker_ID JOIN student_tracker ON tracker.Tracker_ID = student_tracker.Tracker_ID JOIN student ON student_tracker.Student_ID = student.Student_ID JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function updateAdeptStudentByUsername($username, $tracker)
	{
		$this->db->where('Username', $username);
		$this->db->update('adept_student', $tracker);

		return $this->db->_error_message();
	}

	function updateGcatStudent($code, $subject, $tracker)
	{
		$this->db->set($tracker);
		$this->db->where('student.Code', $code);
		$this->db->where('subject.Subject_Code', $subject);
		$this->db->update('gcat_student JOIN tracker ON gcat_student.Tracker_ID = tracker.Tracker_ID JOIN student_tracker ON tracker.Tracker_ID = student_tracker.Tracker_ID JOIN student ON student_tracker.Student_ID = student.Student_ID JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function updateSmpStudent($code, $subject, $tracker)
	{
		$this->db->set($tracker);
		$this->db->where('student.Code', $code);
		$this->db->where('subject.Subject_Code', $subject);
		$this->db->update('smp_student LEFT JOIN tracker ON smp_student.Tracker_ID = tracker.Tracker_ID LEFT JOIN student_tracker ON tracker.Tracker_ID = student_tracker.Tracker_ID LEFT JOIN student ON student_tracker.Student_ID = student.Student_ID LEFT JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function updateInternshipStudent($code, $tracker)
	{
		$this->db->set($tracker);
		$this->db->where('student.Code', $code);
		$this->db->where('subject.Subject_Code', 'Intern');
		$this->db->update('internship_student JOIN tracker ON internship_student.Tracker_ID = tracker.Tracker_ID JOIN student_tracker ON tracker.Tracker_ID = student_tracker.Tracker_ID JOIN student ON student_tracker.Student_ID = student.Student_ID JOIN subject ON tracker.Subject_ID = subject.Subject_ID');

		return $this->db->_error_message();
	}

	function deleteStudentById($id)
	{
		$this->db->where('Student_ID', $id);
		return $this->db->delete('student');
	}

	function deleteTrackers()
	{
		$this->db->where('Student_ID', NULL);
		return $this->db->delete('tracker USING tracker LEFT JOIN student_tracker ON tracker.Tracker_ID = student_tracker.Tracker_ID');	
	}
}
?>