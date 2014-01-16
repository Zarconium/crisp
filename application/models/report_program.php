<?php
Class Report_Program extends CI_Model
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

	function getStudentAdeptProgramReportPins()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

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
		AND t.Tracker_ID = bt.Tracker_ID
		AND st.Student_ID=stt.Student_ID;');  

		/*Count number of pins given to males from each school*/
		$query = $this->db->query('SELECT s.Name as "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN Adept_Students_List as st ON s.School_ID = st.School_ID
		GROUP BY s.Name;');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentAdeptProgramReportPinsTotal()
	{
		$this->getStudentAdeptProgramReportPins();

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

	function getStudentAdeptProgramReportCurrentTakers()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

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
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 3
		AND st.Student_ID=stt.Student_ID;');  

		$query = $this->db->query('SELECT s.Name as "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN Adept_Students_List_Currently_Taking as st ON s.School_ID = st.School_ID
		GROUP BY s.Name;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentAdeptProgramReportCurrentTakersTotal()
	{
		$this->getStudentAdeptProgramReportCurrentTakers();

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


	function getStudentAdeptProgramReportCompleted()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

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
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 1
		AND st.Student_ID=stt.Student_ID;');  

		/*Count of best takers completed that are malefrom each schools*/
		$query = $this->db->query('SELECT s.Name as "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN Adept_Students_List_Completed as st ON s.School_ID = st.School_ID
		GROUP BY s.Name;');	

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentAdeptProgramReportCompletedTotal()
	{
		$this->getStudentAdeptProgramReportCompleted();

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

	function getStudentBestProgramReportPins()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

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
		AND t.Tracker_ID = bt.Tracker_ID
		AND st.Student_ID=stt.Student_ID;');  

		$query = $this->db->query('SELECT s.Name AS "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN BEST_Students_List as st ON s.School_ID = st.School_ID
		GROUP BY s.Name;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getStudentBestProgramReportPinsTotal()
	{
		$this->getStudentBestProgramReportPins();

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

	function getStudentBestProgramReportCurrentTakers()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";


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
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 3
		AND st.Student_ID=stt.Student_ID;');  

		/*Count of best takers that are malefrom each schools*/
		$query = $this->db->query('SELECT s.Name AS "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN BEST_Students_List_Currently_Taking as st ON s.School_ID = st.School_ID
		GROUP BY s.Name;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}


	}

	function getStudentBestProgramReportCurrentTakersTotal()
	{
		$this->getStudentBestProgramReportCurrentTakers();

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

	function getStudentBestProgramReportCompleted()
	{
		$start_date = "1990-01-01"; $end_date= "2020-01-01";

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
		AND t.Tracker_ID = bt.Tracker_ID
		AND t.Status_ID = 1
		AND st.Student_ID=stt.Student_ID;');  

		/*Count of best takers completed that are malefrom each schools*/
		$query = $this->db->query('SELECT s.Name AS "School", SUM(IF(st.Gender="M", 1,0)) as "Male", SUM(IF(st.Gender="F", 1,0)) as "Female", Count(st.student_id) as "Total"
		FROM School as s
		LEFT JOIN BEST_Students_List_Completed as st ON s.School_ID = st.School_ID
		GROUP BY s.Name;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

		
	}

	function getStudentBestProgramReportCompletedTotal()
	{
		$this->getStudentBestProgramReportCompleted();

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

	function getStudentProgramReportGCAT()
	{

		$this->db->query('SET @startdate="2011-01-01";');
		$this->db->query('Set @enddate="2012-12-31";');

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
		AND gs.Tracker_ID = stt.Tracker_ID
		AND gs.Tracker_ID = t.Tracker_ID
		AND t.Created_At BETWEEN @startdate AND @enddate;');


		$query = $this->db->query('SELECT sc.Name as "Name", SUM(IF(stgl.Gender="M",1,0)) as "Male", SUM(IF(stgl.Gender="F",1,0)) as "Female", Count(stgl.student_id) as "Total"
		FROM School as sc
		LEFT JOIN Student_Taken_GCAT_List as stgl ON sc.School_ID=stgl.School_ID
		GROUP BY sc.Name WITH ROLLUP;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}

	function getStudentProgramReportGCATTotal()
	{
		$this->getStudentProgramReportGCAT();

		$this->db->query('SELECT Count(stgl.Student_ID) as "TOTAL"
		FROM Student_Taken_GCAT_List as stgl;');

		$this->db->query('DROP TABLE IF EXISTS Student_Taken_GCAT_List;');
	}

}
?>