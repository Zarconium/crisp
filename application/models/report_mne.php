<?php
Class Report_Mne extends CI_Model
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

	function getAllStudentNamesAndSchools()
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, CONCAT(school.name, " - ", school.Branch) as School_Name', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID', 'left');

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

	//MNE Models

	function getallStudentsGcatCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#GCAT- Completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as "Q1"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as "Q2"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" )) as "Q3"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" )) as "Q4"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT")) as "Cumulative");');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBestCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BEST- Completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as "Q1"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as "Q2"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" )) as "Q3"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" )) as "Q4"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST")) as "Cumulative");');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function getallStudentsAdeptCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#AdEPT-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as "Q1"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as "Q2"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" )) as "Q3"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" )) as "Q4"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT")) as "Cumulative");');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function getallStudentsSmpCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#SMP-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" )) as "Q1"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as "Q2"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" )) as "Q3"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" )) as "Q4"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom"))) as "Cumulative");');


		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBpo101CurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BPO101-currently taking 
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function getallStudentsBpo102CurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BPO102-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function getallStudentsSystemsThinkingCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{

		#System Thinking-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallStudentsBusinessCommunicationCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Business Communication-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallStudentsServiceCultureCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Service Culture-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherGcat($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#GCAT
		$query = $this->db->query('(select 
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" ))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherBest($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{	
		#BEST
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT")))as Cumulative);
		');
		
	
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherAdept($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Adept
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT")))as Cumulative);
		');

		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherSmpAnySubject($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#SMP (any smp subject)
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom" ) ))as Cumulative);
		');
		
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherCompleteSmpSubjAndTrainedTeachers($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#complete smp subjects and trained teachers
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom" ) ))as Cumulative);
		');
		
	
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherBpo101($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BPO101
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'")) as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'"))  as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'")) as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'")) as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'")) as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102")))as Cumulative);
		');
		
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherBpo102($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BPO102
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BP1O2" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102")))as Cumulative);
		');
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherServiceCulture($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{

		#SERVICE CULTURE
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101"))as Cumulative);
		');
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherBusinessCommunication($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BUSINESS COMMUNICATION
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom"))as Cumulative);
		');
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherSystemsThinking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Systems Thinking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" )) as Q2
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s 
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function getallStudentsSmpCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#SMP-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBpo101Completed($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BPO101-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBpo102Completed($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#BPO102-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBusinessCommunicationCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Business Communication-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsServiceCultureCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Service Culture-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsSystemsThinkingCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Systems Thinking-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsInternshipCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end)
	{
		#Internship-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$qtr1_start.'" and "'.$qtr1_end.'" ))as Q1
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$qtr2_start.'" and "'.$qtr2_end.'" ))as Q2
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$qtr3_start.'" and "'.$qtr3_end.'" ))as Q3
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$qtr4_start.'" and "'.$qtr4_end.'" ))as Q4
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	#Monthly Reports

function getallStudentsGcatCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#GCAT- Completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as "January"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as "February"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" )) as "March"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" )) as "April"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" )) as "May"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" )) as "June"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" )) as "July"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" )) as "August"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" )) as "September"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" )) as "October"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" )) as "November"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" )) as "December"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT")) as "Cumulative");');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

function getallStudentsBestCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BEST- Completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as "January"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as "February"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" )) as "March"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" )) as "April"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as "May"
		,
		
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as "June"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" )) as "July"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" )) as "August"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" )) as "September"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as "October"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" )) as "November"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" )) as "December"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST")) as "Cumulative");');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


	
	function getallStudentsAdeptCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#AdEPT-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as "January"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as "February"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" )) as "March"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" )) as "April"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as "May"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" )) as "June"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" )) as "July"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" )) as "August"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as "September"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" )) as "October"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" )) as "November"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" )) as "December"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID)
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT")) as "Cumulative");');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallStudentsSmpCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#SMP-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" )) as "January"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as "February"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" )) as "March"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" )) as "April"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" )) as "May"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" )) as "June"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" )) as "July"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" )) as "August"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" )) as "September"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" )) as "October"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" )) as "November"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" )) as "December"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" )) as "Annual"
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom"))) as "Cumulative");');


		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallStudentsBpo101CurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BPO101-currently taking 
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function getallStudentsBpo102CurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BPO102-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsSystemsThinkingCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{

		#System Thinking-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallStudentsBusinessCommunicationCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Business Communication-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallStudentsServiceCultureCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Service Culture-currently taking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October

		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherGcatMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#GCAT
		$query = $this->db->query('(select 
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October

		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November

		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" ))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherBestMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{	
		#BEST
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT")))as Cumulative);
		');
		
	
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherAdeptMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Adept
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT")))as Cumulative);
		');

		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherSmpAnySubjectMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#SMP (any smp subject)
		$query = $this->db->query('(select
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October

		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")  and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or s.Subject_Code = "BPO101/102" or
		s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom" ) ))as Cumulative);
		');
		
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherCompleteSmpSubjAndTrainedTeachersMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#complete smp subjects and trained teachers
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom")  and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" and s.Subject_Code = "SYSTH101" and s.Subject_Code = "BPO101" and s.Subject_Code ="BPO102" and
		 s.Subject_Code = "BEST/AdEPT" and s.Subject_Code = "BizCom" ) ))as Cumulative);
		');
		
	
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function getallTeacherBpo101Monthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BPO101
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'")) as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'"))  as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'")) as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'")) as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'")) as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO101" or s.Subject_Code = "BPO101/102")))as Cumulative);
		');
		
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherBpo102Monthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BPO102
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BP1O2" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BP1O2" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BP1O2" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BPO102" or s.Subject_Code = "BPO101/102")))as Cumulative);
		');
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherServiceCultureMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{

		#SERVICE CULTURE
		$query = $this->db->query('(select
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,		
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October

		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101"))as Cumulative);
		');
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherBusinessCommunicationMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BUSINESS COMMUNICATION
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom"))as Cumulative);
		');
		
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallTeacherSystemsThinkingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Systems Thinking
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" )) as February
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		 (SELECT COUNT(DISTINCT teacher.Teacher_ID)
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT teacher.Teacher_ID) 
		FROM Teacher_T3_Tracker as teacher
		WHERE teacher.t3_tracker_id IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject s 
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101"))as Cumulative);');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	#######################################################################################################################################################################################################################################
	function getallStudentsSmpCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#SMP-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom") and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "SC101" or s.Subject_Code = "SYSTH101" or
		 s.Subject_Code = "BPO101" or  s.Subject_Code = "BPO102"  or s.Subject_Code = "BizCom")))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBpo101CompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BPO101-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBpo102CompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#BPO102-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsBusinessCommunicationCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Business Communication-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsServiceCultureCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Service Culture-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsSystemsThinkingCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Systems Thinking-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getallStudentsInternshipCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end)
	{
		#Internship-completed
		$query = $this->db->query('(select 
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$jan_start.'" and "'.$jan_end.'" ))as January
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$feb_start.'" and "'.$feb_end.'" ))as February
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$mar_start.'" and "'.$mar_end.'" ))as March
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$apr_start.'" and "'.$apr_end.'" ))as April
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$may_start.'" and "'.$may_end.'" ))as May
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$jun_start.'" and "'.$jun_end.'" ))as June
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$jul_start.'" and "'.$jul_end.'" ))as July
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$aug_start.'" and "'.$aug_end.'" ))as August
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$sep_start.'" and "'.$sep_end.'" ))as September
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$oct_start.'" and "'.$oct_end.'" ))as October
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$nov_start.'" and "'.$nov_end.'" ))as November
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$dec_start.'" and "'.$dec_end.'" ))as December
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern" and t.Created_At between "'.$annual_start.'" and "'.$annual_end.'" ))as Annual
		,
		(SELECT COUNT(DISTINCT student.student_ID) 
		FROM Student_Tracker as student
		WHERE student.Student_Tracker_ID IN (SELECT t.Tracker_ID 
		FROM Tracker as t, Subject s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "Intern"))as Cumulative);
		');
		
		if($query->num_rows() > 0)
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