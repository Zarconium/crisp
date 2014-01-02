<?php
Class Test extends CI_Model
{
	function test()
	{
		$this->db->query('SET @SCHOOL_CODE = "BATSTATU-Malvar";');
		$this->db->query('SET @DATE_START = "2011-01-01";');
		$this->db->query('SET @DATE_END = "2013-01-01";');
		$this->db->query('SET @TOTAL = 0;');

		/*best t3*/
		$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
			select best_t3_tracker.Control_Number as "Control Number", concat_ws(" ",Teacher.last_name,",", teacher.First_name, teacher.middle_initial) as "Teacher Name"
			from best_t3_tracker
			join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID
			join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID 
			join t3_tracker on t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID, school
			where school.School_ID = teacher.School_ID
			and school.code = @SCHOOL_CODE
			and t3_tracker.Created_At between @DATE_START AND @DATE_END);');

		$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
			select "TOTAL", @TOTAL := @TOTAL + count(best_t3_tracker.Control_Number) 
			from best_t3_tracker
			join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID
			join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID
			join t3_tracker on t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID, school
			where school.School_ID = teacher.School_ID
			and school.code = @SCHOOL_CODE
			and t3_tracker.Created_At between @DATE_START AND @DATE_END);');

		$this->db->query('select * from temp1 union select * from temp2;');
		$this->db->query('DROP TEMPORARY TABLE IF EXISTS temp1, temp2;');

		/*adept t3*/
		$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
			select adept_t3_tracker.Control_Number as "Control Number", concat_ws(" ",Teacher.last_name,",", teacher.First_name, teacher.middle_initial) as "Teacher Name"
			from adept_t3_tracker
			join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID
			join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID
			join t3_tracker on t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID, school
			where school.School_ID = teacher.School_ID
			and school.code = @SCHOOL_CODE
			and t3_tracker.Created_At between @DATE_START AND @DATE_END);');

		$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
			select "TOTAL", @TOTAL := @TOTAL + count(adept_t3_tracker.Control_Number)
			from adept_t3_tracker
			join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID
			join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID
			join t3_tracker on t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID, school
			where school.School_ID = teacher.School_ID
			and school.code = @SCHOOL_CODE
			and t3_tracker.Created_At between @DATE_START AND @DATE_END);');

		$this->db->query('select * from temp1 union select * from temp2;');
		$this->db->query('DROP TEMPORARY TABLE IF EXISTS temp1, temp2;');

		/*$this->db->query('SET @startdate = "2011-01-01";');
		$this->db->query('SET @enddate = "2012-12-31";');
		$this->db->query('INSERT INTO Student_Taken_GCAT_List
			SELECT st.Student_ID, st.School_ID, st.Gender
			FROM Student as st , GCAT_Student as gs , Tracker as t , Student_Tracker as stt
			WHERE stt.Student_ID = st.Student_ID
			AND gs.Tracker_ID = stt.Tracker_ID
			AND gs.Tracker_ID = t.Tracker_ID
			AND t.Created_At
			BETWEEN @startdate AND @enddate;');*/
}
}
?>