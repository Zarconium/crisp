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

	function getStudentClass($subject_code,$school_code,$semester,$teacher_code, $start_date, $end_date)
	{


		$query = $this->db->query('select class.Name as "Class_Name", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, other_class, teacher, tracker, student_tracker
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="' . $subject_code . '")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
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
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
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
	function getAllSMPStudent($subject_id,$school_code,$semester,$teacher_code,$class_name, $start_date, $end_date)
	{
		$query = $this->db->query('SELECT CONCAT_WS(  " ", student.Last_Name,  ",", student.First_Name, student.middle_initial ) AS "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher, tracker, student_tracker
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_ID="' . $subject_id . '")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
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
		s.Subject_ID="' . $subject_id . '")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
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
		$query = $this->db->query('SELECT DISTINCT btt.Control_Number AS "Control_Number", concat_ws(" ",t.last_name,",", t.First_name, t.middle_initial) AS "Teachers"
		FROM Best_T3_Tracker as btt, T3_Tracker as tt, Teacher_T3_Tracker as ttt, School as s, Teacher as t
		WHERE btt.T3_Tracker_ID = tt.T3_Tracker_ID
		AND btt.T3_Tracker_ID = ttt.T3_Tracker_ID
		AND ttt.Teacher_ID = t.Teacher_ID
		AND t.School_ID in (SELECT sc.School_ID FROM School as sc WHERE 
		 sc.Code="'. $school_code .'")
		AND t.School_ID = s.School_ID
		
		AND tt.Created_At BETWEEN "' . $date_end . '" AND "' . $date_end . '"
		UNION
		SELECT "Total" as Control_Number, COUNT(DISTINCT t.teacher_id) as "Teachers"
		FROM Best_T3_Tracker as btt, T3_Tracker as tt, Teacher_T3_Tracker as ttt, School as s, Teacher as t
		WHERE btt.T3_Tracker_ID = tt.T3_Tracker_ID
		AND btt.T3_Tracker_ID = ttt.T3_Tracker_ID
		AND ttt.Teacher_ID = t.Teacher_ID
		AND t.School_ID in (SELECT sc.School_ID FROM School as sc WHERE 
		 sc.Code="'. $school_code .'")
		AND t.School_ID = s.School_ID
		
		AND tt.Created_At BETWEEN "' . $date_end . '" AND "' . $date_end . '"
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

	function getT3Adept ($school_code,$date_start,$date_end)
	{
		$query = $this->db->query('SELECT DISTINCT att.Control_Number AS "Control_Number", concat_ws(" ",t.last_name,",", t.First_name, t.middle_initial) AS "Teachers"
		FROM Adept_T3_Tracker as att, T3_Tracker as tt, Teacher_T3_Tracker as ttt, School as s, Teacher as t
		WHERE att.T3_Tracker_ID = tt.T3_Tracker_ID
		AND att.T3_Tracker_ID = ttt.T3_Tracker_ID
		AND ttt.Teacher_ID = t.Teacher_ID
		AND t.School_ID in (SELECT sc.School_ID FROM School as sc WHERE 
		 sc.Code="'. $school_code .'")
		AND t.School_ID = s.School_ID
		
		AND tt.Created_At BETWEEN "' . $date_end . '" AND "' . $date_end . '"
		UNION
		SELECT "Total" as Control_Number, COUNT(DISTINCT t.teacher_id) as "Teachers"
		FROM Adept_T3_Tracker as att, T3_Tracker as tt, Teacher_T3_Tracker as ttt, School as s, Teacher as t
		WHERE att.T3_Tracker_ID = tt.T3_Tracker_ID
		AND att.T3_Tracker_ID = ttt.T3_Tracker_ID
		AND ttt.Teacher_ID = t.Teacher_ID
		AND t.School_ID in (SELECT sc.School_ID FROM School as sc WHERE 
		 sc.Code="'. $school_code .'")
		AND t.School_ID = s.School_ID
		
		AND tt.Created_At BETWEEN "' . $date_end . '" AND "' . $date_end . '"
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

	function getT3GCAT($school_code,$date_start,$date_end)
	{
		$query = $this->db->query('SELECT concat_ws(" ",t.last_name,",", t.First_name, t.middle_initial) AS "Teachers"
		FROM GCAT_Tracker as gt, T3_Tracker as tt, Teacher_T3_Tracker as ttt, School as s, Teacher as t,
		WHERE gt.T3_Tracker_ID = tt.T3_Tracker_ID
		AND gt.T3_Tracker_ID = ttt.T3_Tracker_ID
		AND ttt.Teacher_ID = t.Teacher_ID
		AND t.School_ID in (SELECT sc.School_ID FROM School as sc WHERE 
		 sc.Code="'. $school_code .'")
		AND t.School_ID = s.School_ID
		
		AND tt.Created_At BETWEEN "' . $date_end . '" AND "' . $date_end . '"
		UNION
		SELECT "Total" as Control_Number, COUNT(DISTINCT t.teacher_id) as "Teachers"
		FROM GCAT_Tracker as gt, T3_Tracker as tt, Teacher_T3_Tracker as ttt, School as s, Teacher as t
		WHERE gt.T3_Tracker_ID = tt.T3_Tracker_ID
		AND gt.T3_Tracker_ID = ttt.T3_Tracker_ID
		AND ttt.Teacher_ID = t.Teacher_ID
		AND t.School_ID in (SELECT sc.School_ID FROM School as sc WHERE 
		 sc.Code="'. $school_code .'")
		AND t.School_ID = s.School_ID
		
		AND tt.Created_At BETWEEN "' . $date_end . '" AND "' . $date_end . '"
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

	function getBestStudentClasses ($school_code,$semester, $teacher_code, $start_date, $end_date)
	{
		$query = $this->db->query('select class.Name as "Class_Name", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, other_class, teacher, tracker, student_tracker
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="BEST" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '")
		group by class.Name
		UNION
		select "Total: ", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, other_class, teacher, tracker, student_tracker
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="BEST" OR s.Subject_Code="BEST/AdEPT")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '");');


		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getBestStudents($school_code,$semester,$teacher_code,$class_name, $start_date, $end_date)
	{
		$query = $this->db->query(' SELECT best_student.control_number as "Control_Number", CONCAT_WS(  " ", student.Last_Name,  ",", student.First_Name, student.middle_initial ) AS "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher, student_tracker, best_student, tracker, student_tracker
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="BEST" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "'.$school_code.'")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "'.$teacher_code.'")
		AND class.Name = "'.$class_name.'"
		AND student_tracker.student_id=student.student_id
		AND student_tracker.tracker_id=best_student.tracker_id
		UNION
		SELECT "Total", CONCAT_WS(" ", "Total:", COUNT(Student.Student_ID)) as "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher, student_tracker, best_student
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="BEST" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "'.$school_code.'")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "'.$teacher_code.'")
		AND class.Name = "'.$class_name.'"
		AND student_tracker.student_id=student.student_id
		AND student_tracker.tracker_id=best_student.tracker_id;');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAdeptStudentClasses ($school_code,$semester, $teacher_code, $start_date, $end_date)
	{
		$query = $this->db->query('select class.Name as "Class_Name", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, other_class, teacher, tracker, student_tracker
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and other_class.Class_ID = class.Class_ID 
		and other_class.Teacher_ID = teacher.Teacher_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="AdEPT" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
				AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))

		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
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
		s.Subject_Code="AdEPT" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
				AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))

		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "' . $teacher_code . '");');


		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getAdeptStudents($school_code,$semester,$teacher_code,$class_name, $start_date, $end_date)
	{
		$query = $this->db->query(' SELECT adept_student.control_number as "Control_Number", CONCAT_WS(  " ", student.Last_Name,  ",", student.First_Name, student.middle_initial ) AS "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher, student_tracker, adept_student, tracker, student_tracker
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="AdEPT" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "'.$school_code.'")
				AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))

		AND class.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "'.$teacher_code.'")
		AND class.Name = "'.$class_name.'"
		AND student_tracker.student_id=student.student_id
		AND student_tracker.tracker_id=adept_student.tracker_id
		UNION
		SELECT "Total", CONCAT_WS(" ", "Total:", COUNT(Student.Student_ID)) as "Student_Names"
		FROM Student_Class, Student, Class, subject, school, other_class, teacher, student_tracker, adept_student
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND other_class.Class_ID = class.Class_ID
		AND other_class.Teacher_ID = teacher.Teacher_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="AdEPT" OR s.Subject_Code="BEST/AdEPT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "'.$school_code.'")
				AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))

		AND class.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND teacher.teacher_id IN (SELECT t.teacher_id FROM teacher AS t WHERE t.Code =  "'.$teacher_code.'")
		AND class.Name = "'.$class_name.'"
		AND student_tracker.student_id=student.student_id
		AND student_tracker.tracker_id=adept_student.tracker_id;');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getGCATStudentClasses($school_code, $semester, $proctor_id, $start_date, $end_date)
	{
		$query = $this->db->query('select class.Name as "Class_Name", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, gcat_class, Proctor, tracker, student_tracker
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and gcat_class.class_id = class.Class_ID 
		and GCAT_class.Proctor_ID = Proctor.Proctor_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="GCAT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "'.$school_code.'")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND Proctor.Proctor_ID = "'.$proctor_id.'"
		group by class.Name
		UNION
		select "Total: ", COUNT(DISTINCT Student_Class.Student_ID)as "Number_of_Students"
		from Student_Class, Student, Class,subject, school, gcat_class, Proctor
		where Student_Class.student_id = student.Student_ID 
		and class.Class_ID = student_class.Class_ID
		and gcat_class.class_id = class.Class_ID 
		and GCAT_class.Proctor_ID = Proctor.Proctor_ID
		and subject.subject_id = class.Subject_ID
		and school.School_ID = class.School_ID 
		AND subject.subject_ID IN (SELECT s.subject_id FROM subject AS s WHERE
		s.Subject_Code="GCAT")
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "'.$school_code.'")
		AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))
		AND class.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND Proctor.Proctor_ID = "'.$proctor_id.'";');


		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getGCATStudent($school_code,$semester,$proctor_id,$class_name, $start_date, $end_date)
	{
		$query = $this->db->query('SELECT CONCAT_WS(  " ", student.Last_Name,  ",", student.First_Name, student.middle_initial ) AS "Student_Names"
		FROM Student_Class, Student, Class, subject, school, gcat_class, Proctor, tracker, student_tracker
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND gcat_class.Class_ID = class.Class_ID
		AND gcat_class.proctor_ID = proctor.proctor_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
				AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))

		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND class.Name = "' . $class_name . '" 
		UNION
		SELECT CONCAT_WS(" ", "Total:", COUNT(Student.Student_ID)) as "Student_Names"
		FROM Student_Class, Student, Class, subject, school, gcat_class, Proctor
		WHERE Student_Class.student_id = student.Student_ID
		AND class.Class_ID = student_class.Class_ID
		AND gcat_class.Class_ID = class.Class_ID
		AND gcat_class.proctor_ID = proctor.proctor_ID
		AND subject.subject_id = class.Subject_ID
		AND school.School_ID = class.School_ID
		AND school.School_ID in (SELECT sc.school_ID FROM school AS sc WHERE sc.Code =  "' . $school_code . '")
				AND student.Student_Id IN (SELECT sa.Student_ID FROM Student_Application as sa WHERE sa.Project_ID IN(SELECT p.Project_ID FROM Project as p WHERE p.Name="CHED"))

		AND class.Semester =' . $semester . '
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND Proctor.Proctor_ID = "' . $proctor_id . '"
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


	

	

	function getSMPTotal($school_code,$subject_id,$semester, $start_date, $end_date)
	{
		$query = $this->db->query('SELECT CONCAT_WS(" ", t.First_Name, t.Middle_Initial, t.Last_Name ) AS Teacher, COUNT( DISTINCT sc.Student_ID ) as "Students", COUNT( DISTINCT oc.Class_ID ) as "Classes"
		FROM School AS s, Subject AS su, Teacher AS t, Class AS c, Student_Class AS sc, Other_Class AS oc
		WHERE s.School_ID
		IN (SELECT school.School_ID FROM School WHERE school.code = "'.$school_code.'") 
		AND su.Subject_ID IN ( SELECT subject.Subject_ID
		FROM Subject WHERE subject.Subject_ID =  "'.$subject_id.'")
		AND c.School_ID = s.School_ID
		AND su.Subject_ID = c.Subject_ID
		AND c.Class_ID = oc.Class_ID
		AND c.Class_ID = sc.Class_ID
		AND oc.Teacher_ID = t.Teacher_ID
		AND c.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		GROUP BY Teacher
		UNION
		SELECT CONCAT_WS(" ", "Total: ", COUNT(DISTINCT t.teacher_ID)) AS "Teacher", COUNT( DISTINCT sc.Student_ID ) as "Students", COUNT( DISTINCT oc.Class_ID ) as "Classes"
		FROM School AS s, Subject AS su, Teacher AS t, Class AS c, Student_Class AS sc, Other_Class AS oc
		WHERE s.School_ID
		IN (SELECT school.School_ID
		FROM School WHERE school.code = "'.$school_code.'") 
		AND su.Subject_ID IN ( SELECT subject.Subject_ID
		FROM Subject WHERE subject.Subject_ID =  "'.$subject_id.'")
		AND c.School_ID = s.School_ID
		AND su.Subject_ID = c.Subject_ID
		AND c.Class_ID = oc.Class_ID
		AND c.Class_ID = sc.Class_ID
		AND oc.Teacher_ID = t.Teacher_ID
		AND c.Semester = "'.$semester.'"
		AND tracker.tracker_id = student_tracker.tracker_id
		AND student_tracker.student_id=student.student_id
		AND tracker.Created_At BETWEEN "'.$start_date.'" AND "'.$end_date.'";');

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