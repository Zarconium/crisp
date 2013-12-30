<?php
Class Test extends CI_Model
{
	function test()
	{


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