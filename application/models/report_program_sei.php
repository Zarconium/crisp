<?php
Class Report_Program_SEI extends CI_Model
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

	function getStudentAdeptProgramReportPins($start_date, $end_date)
	{

		$this->db->query('DROP TABLE IF EXISTS Adept_Trackers;');
		$this->db->query('DROP TABLE IF EXISTS Adept_Students_List;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Adept_Trackers(
		Tracker_ID INT);');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Adept_Students_List(
		Student_ID INT
		, School_ID INT
		, Gender Char);');

		$this->db->query('INSERT INTO Adept_Trackers
		SELECT bs.Tracker_ID
		FROM Adept_Student as bs
		, Tracker as t
		WHERE t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Tracker_ID = bs.Tracker_ID;');		
		/*-------------------Pins Given-------------------*/

		/*Students given pin numbers*/
		$this->db->query('INSERT INTO Adept_Students_List
		SELECT DISTINCT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, Student_Tracker as stt
		, Adept_Trackers as bt
		, Tracker as t
		WHERE bt.Tracker_ID = stt.Tracker_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND t.Tracker_ID = bt.Tracker_ID
		AND st.Student_ID=stt.Student_ID;');  

		/*Count number of pins given to males from each school*/
		$query = $this->db->query('SELECT s.Code as "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN Adept_Students_List as st ON s.School_ID = st.School_ID
		GROUP BY s.Code ;');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentAdeptProgramReportPinsTotal($start_date, $end_date)
	{
		$this->getStudentAdeptProgramReportPins($start_date, $end_date);

		/*Total number of students that were given pins*/
		$query = $this->db->query('SELECT COUNT(asl.student_id) as "Total"
		FROM Adept_Students_List as asl;');  

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentAdeptProgramReportCurrentTakers($start_date, $end_date)
	{
		
		$this->db->query('DROP TABLE IF EXISTS Adept_Trackers;');
		$this->db->query('DROP TABLE IF EXISTS Adept_Students_List_Currently_Taking;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Adept_Trackers(
		Tracker_ID INT);');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Adept_Students_List_Currently_Taking(
		Student_ID INT
		, School_ID INT
		, Gender Char);');

		$this->db->query('INSERT INTO Adept_Trackers
		SELECT bs.Tracker_ID
		FROM Adept_Student as bs
		, Tracker as t
		WHERE t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Tracker_ID = bs.Tracker_ID;');	

		/*------Currently Taking ---------*/	

		$this->db->query('INSERT INTO Adept_Students_List_Currently_taking
		SELECT DISTINCT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, Student_Tracker as stt
		, Adept_Trackers as bt
		, Tracker as t
		WHERE bt.Tracker_ID = stt.Tracker_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 3
		AND st.Student_ID=stt.Student_ID;');  

		$query = $this->db->query('SELECT s.Code as "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN Adept_Students_List_Currently_Taking as st ON s.School_ID = st.School_ID
		GROUP BY s.Code ;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentAdeptProgramReportCurrentTakersTotal($start_date, $end_date)
	{
		$this->getStudentAdeptProgramReportCurrentTakers($start_date, $end_date);

		/*Total number of students that were given pins*/
		$query = $this->db->query('SELECT COUNT(aslct.student_id) as "Total"
		FROM Adept_Students_List_Currently_Taking as aslct;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}


	function getStudentAdeptProgramReportCompleted($start_date, $end_date)
	{

		$this->db->query('DROP TABLE IF EXISTS Adept_Trackers;');
		$this->db->query('DROP TABLE IF EXISTS Adept_Students_List_Completed;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Adept_Trackers(
		Tracker_ID INT);');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Adept_Students_List_Completed(
		Student_ID INT
		, School_ID INT
		, Gender Char);');

		$this->db->query('INSERT INTO Adept_Trackers
		SELECT bs.Tracker_ID
		FROM Adept_Student as bs
		, Tracker as t
		WHERE t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Tracker_ID = bs.Tracker_ID;');	

		/*----- Completed -------*/	

		/*Students that are given pins for Adept that are completed*/
		$this->db->query('INSERT INTO Adept_Students_List_Completed
		SELECT DISTINCT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, Student_Tracker as stt
		, Adept_Trackers as bt
		, Tracker as t
		WHERE bt.Tracker_ID = stt.Tracker_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 1
		AND st.Student_ID=stt.Student_ID;');  

		/*Count of best takers completed that are malefrom each schools*/
		$query = $this->db->query('SELECT s.Code as "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN Adept_Students_List_Completed as st ON s.School_ID = st.School_ID
		GROUP BY s.Code ;');	

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentAdeptProgramReportCompletedTotal($start_date, $end_date)
	{
		$this->getStudentAdeptProgramReportCompleted($start_date, $end_date);

		/*Total number of students that were given pins*/
		$query = $this->db->query('SELECT COUNT(aslc.student_id) as "Total"
		FROM Adept_Students_List_Completed as aslc;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentBestProgramReportPins($start_date, $end_date)
	{
		$this->db->query('DROP TABLE IF EXIstS BEST_Trackers;');
		$this->db->query('DROP TABLE IF EXIstS BEST_Students_List;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS BEST_Trackers(
		Tracker_ID INT);');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS BEST_Students_List(
		Student_ID INT
		, School_ID INT
		, Gender Char);');

		$this->db->query('INSERT INTO BEST_Trackers
		SELECT bs.Tracker_ID
		FROM BEST_Student as bs
		, Tracker as t
		WHERE t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Tracker_ID = bs.Tracker_ID;');

		$this->db->query('INSERT INTO BEST_Students_List
		SELECT DISTINCT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, Student_Tracker as stt
		, BEST_Trackers as bt
		, Tracker as t
		WHERE bt.Tracker_ID = stt.Tracker_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND t.Tracker_ID = bt.Tracker_ID
		AND st.Student_ID=stt.Student_ID;');  

		$query = $this->db->query('SELECT s.Code AS "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN BEST_Students_List as st ON s.School_ID = st.School_ID
		GROUP BY s.Code ;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentBestProgramReportPinsTotal($start_date, $end_date)
	{
		$this->getStudentBestProgramReportPins($start_date, $end_date);

		$query = $this->db->query('SELECT COUNT(bstl.student_id) as "Total"
		FROM BEST_Students_List as bstl;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentBestProgramReportCurrentTakers($start_date, $end_date)
	{

		$this->db->query('DROP TABLE IF EXIstS BEST_Trackers;');
		$this->db->query('DROP TABLE IF EXISTs BEST_Students_List_Currently_Taking;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS BEST_Trackers(
		Tracker_ID INT);');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS BEST_Students_List_Currently_Taking(
		Student_ID INT
		, School_ID INT
		, Gender Char);');

		$this->db->query('INSERT INTO BEST_Trackers
		SELECT bs.Tracker_ID
		FROM BEST_Student as bs
		, Tracker as t
		WHERE t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Tracker_ID = bs.Tracker_ID;');

		$this->db->query('INSERT INTO BEST_Students_List_CUrrently_taking
		SELECT DISTINCT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, Student_Tracker as stt
		, BEST_Trackers as bt
		, Tracker as t
		WHERE bt.Tracker_ID = stt.Tracker_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 3
		AND st.Student_ID=stt.Student_ID;');  

		/*Count of best takers that are malefrom each schools*/
		$query = $this->db->query('SELECT s.Code AS "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN BEST_Students_List_Currently_Taking as st ON s.School_ID = st.School_ID
		GROUP BY s.Code ;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}


	}

	function getStudentBestProgramReportCurrentTakersTotal($start_date, $end_date)
	{
		$this->getStudentBestProgramReportCurrentTakers($start_date, $end_date);

		$query = $this->db->query('SELECT COUNT(bstl.student_id) "Total"
		FROM BEST_Students_List_Currently_Taking as bstl;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}

	function getStudentBestProgramReportCompleted($start_date, $end_date)
	{
		$this->db->query('DROP TABLE IF EXIstS BEST_Trackers;');
		$this->db->query('DROP TABLE IF EXISTs BEST_Students_List_Completed;');


		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS BEST_Trackers(
		Tracker_ID INT);');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS BEST_Students_List_Completed(
		Student_ID INT
		, School_ID INT
		, Gender Char);');

		$this->db->query('INSERT INTO BEST_Trackers
		SELECT bs.Tracker_ID
		FROM BEST_Student as bs
		, Tracker as t
		WHERE t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Tracker_ID = bs.Tracker_ID;');

		$this->db->query('INSERT INTO BEST_Students_List_Completed
		SELECT DISTINCT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, Student_Tracker as stt
		, BEST_Trackers as bt
		, Tracker as t
		WHERE bt.Tracker_ID = stt.Tracker_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 1
		AND st.Student_ID=stt.Student_ID;');  

		/*Count of best takers completed that are malefrom each schools*/
		$query = $this->db->query('SELECT s.Code AS "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN BEST_Students_List_Completed as st ON s.School_ID = st.School_ID
		GROUP BY s.Code ;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

		
	}

	function getStudentBestProgramReportCompletedTotal($start_date, $end_date)
	{
		$this->getStudentBestProgramReportCompleted($start_date, $end_date);

		$query = $this->db->query('SELECT COUNT(bstl.student_id) "Total"
		FROM BEST_Students_List_Completed as bstl;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentProgramReportGCAT($start_date, $end_date)
	{

		$this->db->query('DROP TEMPORARY TABLE IF EXISTS Student_Taken_GCAT_List;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Student_Taken_GCAT_List
		( Student_ID INT
		, School_ID INT
		, Gender CHAR
		);');

		$this->db->query('INSERT INTO Student_Taken_GCAT_List
		SELECT st.Student_ID, st.School_ID, st.Gender
		FROM Student as st
		, GCAT_Student as gs
		, Tracker as t
		, Student_Tracker as stt
		WHERE stt.Student_ID = st.Student_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND gs.Tracker_ID = stt.Tracker_ID
		AND gs.Tracker_ID = t.Tracker_ID
		AND t.Status_ID=1
		AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'";');


		$query = $this->db->query('SELECT sc.Code as "School", SUM(IF(stgl.Gender="M",1,0)) as "Male", SUM(IF(stgl.Gender="F",1,0)) as "Female", Count(stgl.student_id) as "Total"
		FROM School as sc
		LEFT JOIN Student_Taken_GCAT_List as stgl ON sc.School_ID=stgl.School_ID
		GROUP BY sc.Code ;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}

	function getStudentProgramReportGCATTotal($start_date, $end_date)
	{
		$this->getStudentProgramReportGCAT($start_date, $end_date);

		$query = $this->db->query('SELECT Count(stgl.Student_ID) "Total"
		FROM Student_Taken_GCAT_List as stgl;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentProgramReportPerSubCurrentTakers($start_date, $end_date, $subject_id)
	{

		$this->db->query('DROP TABLE IF EXISTS Currently_Taking;');
		$this->db->query('DROP TABLE IF EXISTS Tracker_List;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Tracker_List(
		Tracker_ID INT
		);');

		$this->db->query('INSERT INTO Tracker_List
		SELECT Tracker_ID
		FROM Tracker as t 
		WHERE T.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Subject_ID="'.$subject_id.'";');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Currently_Taking(
		Student_ID INT
		, School_ID INT
		, Gender CHAR
		);');

		$this->db->query('INSERT INTO Currently_Taking
		SELECT st.Student_ID, sc.School_ID, st.Gender
		FROM Student as st
		, School as sc
		, Student_Tracker as stt
		WHERE stt.Student_ID = st.Student_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND st.School_ID = sc.School_ID
		AND stt.Tracker_ID IN (Select t.Tracker_ID
		FROM Tracker as t
		, Tracker_List as tl
		WHERE t.Tracker_ID = tl.Tracker_ID
		AND t.Status_ID=3);');

		$query = $this->db->query('SELECT sc.Code as "School", SUM(IF(ct.Gender="M",1,0)) as "Male", SUM(IF(ct.Gender="F",1,0)) as "Female", Count(ct.student_id) as "Total"
		FROM School as sc
		LEFT JOIN Currently_Taking as ct ON ct.School_ID=sc.School_ID
		GROUP BY sc.Code
		ORDER BY sc.Code ASC;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentProgramReportPerSubCurrentTakersTotal($start_date, $end_date, $subject_code)
	{
		$this->getStudentProgramReportPerSubCUrrentTakers($start_date, $end_date, $subject_code);

		$query = $this->db->query('SELECT Count(ct.Student_ID) as "Total"
		FROM Currently_Taking as ct;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentProgramReportPerSubFinished($start_date, $end_date, $subject_code)
	{

		$this->db->query('DROP TABLE IF EXISTS Finished_Taking;');
		$this->db->query('DROP TABLE IF EXISTS Tracker_List;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Tracker_List(
		Tracker_ID INT
		);');

		$this->db->query('INSERT INTO Tracker_List
		SELECT Tracker_ID
		FROM Tracker as t 
		WHERE T.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND t.Subject_ID="'.$subject_code.'";');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Finished_Taking(
		Student_ID INT
		, School_ID INT
		, Gender CHAR
		);');

		$this->db->query('INSERT INTO Finished_Taking
		SELECT DISTINCT st.Student_ID, sc.School_ID, st.Gender
		FROM Student as st
		, School as sc
		, Student_Tracker as stt
		WHERE stt.Student_ID = st.Student_ID
		AND st.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI"))
		AND st.School_ID = sc.School_ID
		AND stt.Tracker_ID IN (Select t.Tracker_ID
		FROM Tracker as t
		, Tracker_List as tl
		WHERE t.Tracker_ID = tl.Tracker_ID
		AND t.Status_ID=1);');

		$query = $this->db->query('SELECT sc.Code as "School", SUM(IF(ft.Gender="M",1,0)) as "Male", SUM(IF(ft.Gender="F",1,0)) as "Female", Count(ft.student_id) as "Total"
		FROM School as sc
		LEFT JOIN Finished_Taking as ft ON ft.School_ID=sc.School_ID
		GROUP BY sc.Code
		ORDER BY sc.Code ASC;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getStudentProgramReportPerSubFinishedTotal($start_date, $end_date, $subject_code)
	{
		$this->getStudentProgramReportPerSubFinished($start_date, $end_date, $subject_code);

		$query = $this->db->query('SELECT Count(DISTINCT ft.Student_ID) as "Total"
		FROM Finished_Taking as ft;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getT3ProgramReportGCAT($start_date, $end_date)
	{

		$this->db->query('DROP TEMPORARY TABLE IF EXISTS Teachers_Taken_GCAT;'); 

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS Teachers_Taken_GCAT ( 
		Teacher_ID INT 
		, School_ID INT
		, Gender CHAR);');

		$this->db->query('INSERT INTO Teachers_Taken_GCAT
		SELECT t.Teacher_ID, t.School_ID, t.Gender
		FROM Teacher as t
		, GCAT_Tracker as gt
		, T3_Tracker as tt
		, Teacher_T3_Tracker as ttt
		WHERE tt.T3_Tracker_ID=gt.T3_Tracker_ID
		AND tt.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND tt.Status_ID=1
		AND tt.T3_Tracker_ID=ttt.T3_Tracker_ID
		AND ttt.Teacher_ID=t.Teacher_ID;');

		$query = $this->db->query('SELECT sc.Code as "School", SUM(IF(ttg.Gender="M",1,0)) as "Male", SUM(IF(ttg.Gender="F",1,0)) as "Female", Count(ttg.Gender) as "Total"
		FROM School as sc 
		LEFT JOIN Teachers_Taken_GCAT as ttg 
		ON sc.School_ID=ttg.School_ID 
		GROUP BY sc.Code;'); 

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getT3ProgramReportGCATTotal($start_date, $end_date)
	{
		$this->getT3ProgramReportGCAT($start_date, $end_date);

		$query = $this->db->query('SELECT Count(ttg.Teacher_ID) as "Total" 
		FROM Teachers_Taken_GCAT as ttg;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getT3ProgramReportPerSub($start_date, $end_date, $subject_id)
	{
		$this->db->query('DROP TEMPORARY TABLE IF EXISTS teachers_list;');

		$this->db->query('CREATE TEMPORARY TABLE IF NOT EXISTS teachers_list
		(Teacher_ID INT);');

		$this->db->query('INSERT INTO teachers_list
		SELECT DISTINCT tt.Teacher_ID 
		FROM Teacher_T3_Tracker as tt
		WHERE tt.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID
		FROM T3_Tracker as t
		WHERE t.Subject_ID IN (SELECT s.Subject_ID FROM Subject as s WHERE s.Subject_id = "'.$subject_id.'") AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'");');

		$query = $this->db->query('SELECT s.Code as "School", SUM(IF(t.Gender="M",1,0)) as "Male", SUM(IF(t.Gender="F",1,0)) as "Female", Count(t.Teacher_ID) as "Total"
		FROM teacher as t, teachers_list as tl, school as s
		WHERE t.Teacher_ID = tl.Teacher_ID AND t.School_ID = s.School_ID
		GROUP BY s.Code;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getT3ProgramReportPerSubTotal($start_date, $end_date, $subject_id)
	{
		$this->getT3ProgramReportPerSub($start_date, $end_date, $subject_id);

		$query = $this->db->query('SELECT COUNT(t.Teacher_ID) as "Total"
		FROM Teachers_List as t;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getT3ProgramReportPerSubClasses($subject_id)
	{
		$query = $this->db->query('SELECT s.Code as "School", COUNT(c.Class_ID) as "Count"
		FROM Class as c, School as s, Subject as su
		WHERE c.School_ID=s.School_ID AND su.Subject_ID=c.Subject_ID AND su.Subject_ID="'.$subject_id.'"
		GROUP BY s.Code
		UNION ALL
		SELECT "SUM", COUNT(c.Class_ID) as "Count"
		FROM Class as c, School as s, Subject as su
		WHERE c.School_ID=s.School_ID AND su.Subject_ID=c.Subject_ID AND su.Subject_ID="'.$subject_id.'"
		;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getSucReportTeachers($schoolcode, $start_date, $end_date)
	{

		$query = $this->db->query('(select(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as BPO101
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as BPO102
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as ServiceCulture
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as BusinessCommunication
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYSTH101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as SystemsThinking
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as AdEPT
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'" )) as BEST
		,
		(SELECT COUNT(DISTINCT T3.teacher_ID) 
		FROM Teacher_T3_Tracker as T3, School as sc, Teacher as t
		WHERE t.teacher_id = t3.Teacher_id AND t.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" 
		AND T3.T3_Tracker_ID IN (SELECT t.T3_Tracker_ID 
		FROM T3_Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as GCAT);');
	

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function getSucReportStudentsCompleted($schoolcode, $start_date, $end_date)
	{
		$query = $this->db->query('(select(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "BPO101"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "BPO102"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "ServiceCulture"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "BusinessCommunication"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYS101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "SystemsThinking"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"))) as "AdEPT"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"))) as "BEST"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=1 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "GCAT");');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getSucReportStudentsCurrentlyTaking($schoolcode, $start_date, $end_date)
	{
		$query = $this->db->query('(select(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "BPO101"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BPO102" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "BPO102"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SC101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "ServiceCulture"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "BizCom" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "BusinessCommunication"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "SYS101" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "SystemsThinking"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "AdEPT" or s.Subject_Code = "BEST/AdEPT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"))) as "AdEPT"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and (s.Subject_Code = "BEST" or s.Subject_Code = "BEST/AdEPT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"))) as "BEST"
		,
		(SELECT COUNT(DISTINCT st.Student_ID)
		FROM Student_Tracker as st, School as sc, Student as s
		WHERE s.student_id = st.Student_id AND s.School_id = sc.school_id AND sc.Code="'.$schoolcode.'" AND s.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="SEI")) 
		AND st.Tracker_ID IN (SELECT t.Tracker_ID
		FROM Tracker as t, Subject as s
		WHERE t.Status_ID=3 and t.Subject_ID= s.Subject_ID and s.Subject_Code = "GCAT" AND t.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'")) as "GCAT");');

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