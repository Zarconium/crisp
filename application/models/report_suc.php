<?php
Class Report_Suc extends CI_Model
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

	function getStudentNamesAndSchools()
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

	function getStudentClass($subject_code,$school_code,$semester,$teacher_code)
	{


		$query = $this->db->query('select class.Name as "Class_Name", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, other_class, teacher
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="' . $subject_code . '")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '")
		group by class.Name
		UNION
		select "Total: ", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, other_class, teacher
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="' . $subject_code . '")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '");
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

	#done
	function getAllSMPStudent($subject_code,$school_code,$semester,$teacher_code,$class_name)
	{
		$query = $this->db->query('SELECT CONCAT_WS(  " ", student.Last_Name,  ",", student.First_Name, student.middle_initial ) AS "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="' . $subject_code . '")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '")
		AND class.Name = "' . $class_name . '" 
		UNION
		SELECT CONCAT_WS(" ", "Total:", COUNT(Student.Student_ID)) as "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="' . $subject_code . '")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '")
		AND class.Name = "' . $class_name . '";');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getT3Best($school_code,$date_start,$date_end)
	{
		$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
		select best_t3_tracker.Control_Number as "Control Number", concat_ws(" ",Teacher.last_name,",", teacher.First_name, teacher.middle_initial) as "Teacher Name"
		from best_t3_tracker
		 join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID
		 join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID 
		 join t3_tracker on t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID, school
		where school.School_ID = teacher.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '");');

		$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
		select "TOTAL", @TOTAL := @TOTAL + count(best_t3_tracker.Control_Number) 
		from best_t3_tracker
		 join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID
		join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID
		 join t3_tracker on t3_tracker.T3_Tracker_ID = best_t3_tracker.T3_Tracker_ID, school
		where school.School_ID = teacher.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '");');

		$query = $this->db->query('select * from temp1 union select * from temp2;');
		$this->db->query('DROP TEMPORARY TABLE IF EXISTS temp1, temp2;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getT3Adept ($school_code,$date_start,$date_end)
	{
		$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
		select adept_t3_tracker.Control_Number as "Control Number", concat_ws(" ",Teacher.last_name,",", teacher.First_name, teacher.middle_initial) as "Teacher Name"
		from adept_t3_tracker
		 join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID
		 join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID
		 join t3_tracker on t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID, school
		where school.School_ID = teacher.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '");');

		$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
		select "TOTAL", @TOTAL := @TOTAL + count(adept_t3_tracker.Control_Number)
		from adept_t3_tracker
		 join teacher_t3_tracker on teacher_t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID
		join teacher on teacher_t3_tracker.teacher_id = teacher.Teacher_ID
		 join t3_tracker on t3_tracker.T3_Tracker_ID = adept_t3_tracker.T3_Tracker_ID, school
		where school.School_ID = teacher.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '");');

		$query = $this->db->query('select * from temp1 union select * from temp2;');
		$this->db->query('DROP TEMPORARY TABLE IF EXISTS temp1, temp2;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getGCATStudent($subject,$school_code,$semester,$teacher_code,$class_name)
	{
		$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
		select concat_ws(" ",student.Last_Name,",", student.First_Name,student.middle_initial) as "Student Name"
		 from Student_Class, Student, Class,subject, school, other_class, teacher
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		and subject.Subject_Code = "' . $subject . '" 
		and school.Code = "' . $school_code . '"
		and class.Semester = ' . $semester . '
		and teacher.Code = "' . $teacher_code . '"
		and class.Name = "' . $class_name . '"
		);');

		$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
		select "total:" + count(DISTINCT Student_Class.Student_ID) 
		 from Student_Class, Student, Class,subject, school, other_class, teacher
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		and subject.Subject_Code = "' . $subject . '" 
		and school.Code = "' . $school_code . '"
		and class.Semester = ' . $semester . '
		and teacher.Code = "' . $teacher_code . '"
		and class.Name = "' . $class_name . '"
		);');

		$query = $this->db->query('select * from temp1 union select * from temp2;');
		$this->db->query('DROP TEMPORARY TABLE IF EXISTS temp1, temp2;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	} 

	function getBestStudent ($school_code,$date_start,$date_end)
	{
		$query = $this->db->query('select best_student.Contol_Number as "Pin Number", concat_ws(" ",Student.last_name,",", Student.First_name,  Student.middle_initial) as "Student Name"
		from best_student
		 join student_tracker on student_tracker.Tracker_ID = best_student.Tracker_ID
		 join student on student_tracker.student_id = student.student_ID 
		 join tracker on tracker.tracker_ID = best_student.tracker_ID, school
		where school.School_ID = student.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '"
		union
		select COUNT( DISTINCT best_student.Contol_Number) as "Total Pins", COUNT( DISTINCT concat_ws(" ",Student.last_name,",", Student.First_name,  Student.middle_initial)) as "BEST Student TOTAL"
		from best_student
		 join student_tracker on student_tracker.Tracker_ID = best_student.Tracker_ID
		 join student on student_tracker.student_id = student.student_ID 
		 join tracker on tracker.tracker_ID = best_student.tracker_ID, school
		where school.School_ID = student.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '"
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

	function getAdeptStudent($school_code,$date_start,$date_end)
	{
		$query = $this->db->query('select adept_student.Control_Number as "Pin Number", concat_ws(" ",student.last_name,",", student.First_name, student.middle_initial) as "student Name"
		from adept_student
		 join student_tracker on student_tracker.Tracker_ID = adept_student.Tracker_ID
		 join student on student_tracker.student_id = student.student_ID
		 join tracker on tracker.tracker_ID = adept_student.tracker_ID, school
		where school.School_ID = student.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '"
		union
		select COUNT(DISTINCT adept_student.Control_Number) as "Total", COUNT(DISTINCT concat_ws(" ",student.last_name,",", student.First_name, student.middle_initial)) as "Adept student Total"
		from adept_student
		 join student_tracker on student_tracker.Tracker_ID = adept_student.Tracker_ID
		 join student on student_tracker.student_id = student.student_ID
		 join tracker on tracker.tracker_ID = adept_student.tracker_ID, school
		where school.School_ID = student.School_ID
		and school.code = "'. $school_code .'"
		and t3_tracker.Created_At between "' . $date_start . '" AND "' . $date_end . '"
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

	function getT3Gcat($school_code,$date_start,$date_end)
	{
		$query = $this->db->query('SELECT concat_ws("",t.Last_Name,",",t.First_Name,t.Middle_Initial) as "Teacher Name"
		FROM Teacher as t
		, T3_Tracker as tt
		, Teacher_T3_Tracker as ttt
		, GCAT_Tracker as gt
		WHERE t.School_ID IN (SELECT s.School_ID 
		FROM School as s
		WHERE s.code = "'. $school_code .'"
		AND tt.T3_Tracker_ID=ttt.T3_Tracker_ID
		AND t.Teacher_ID=ttt.Teacher_ID
		AND tt.Created_At between "' . $date_start . '" AND "' . $date_end . '"
		AND gt.T3_Tracker_ID=tt.T3_Tracker_ID');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getSMPTotal($school_code,$subject,$semester)
	{
		$query = $this->db->query('SELECT CONCAT(t.First_Name, t.Last_Name) AS Teacher, COUNT(sc.Student_ID), COUNT(oc.Class_ID)
		FROM School as s
		, Subject as su
		, Teacher as t
		, Class as c
		, Student_Class as sc
		, Other_Class as oc
		WHERE s.School_ID IN (SELECT s.School_ID 
		FROM School as s
		WHERE s.code = "'. $school_code .'"
		AND su.Subject_ID IN (SELECT s.Subject_ID
		FROM Subject as s
		WHERE s.Subject_Code = "' . $subject . '" 
		AND c.Class_ID=oc.Class_ID
		AND c.Class_ID=sc.Class_ID
		AND oc.Teacher_ID=t.Teacher_ID
		AND su.Subject_ID=c.Subject_ID
		AND c.School_ID=s.School_ID
		AND c.Semester= "' . $semester . '" 
		GROUP BY Teacher;');

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