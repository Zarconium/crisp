<?php
Class Test extends CI_Model
{
	function test()
	{
		$this->db->query('SET @subject= "BPO102";');
$this->db->query('SET @SCHOOL_CODE = "BATSTATEU-Lipa";');
$this->db->query('SET @SEMESTER = 1;');
$this->db->query('SET @TEACHER_CODE = "";');
$this->db->query('SET @CLASS = "";');


/*Teacher*/
$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
select class.Name as "Subject Name", COUNT(DISTINCT Student_Class.Student_ID)as "Number of Students"
from Student_Class, Student, Class,subject, school, other_class, teacher
where Student_Class.student_id = student.Student_ID 
and class.Class_ID = student_class.Class_ID
and other_class.Class_ID = class.Class_ID 
and other_class.Teacher_ID = teacher.Teacher_ID
and subject.subject_id = class.Subject_ID
and school.School_ID = class.School_ID 
and subject.Subject_Code = @subject 
/*and school.Code = @SCHOOL_CODE*/
/*and class.Semester = @SEMESTER*/
/*and teacher.Code = @TEACHER_CODE);*/
group by class.Name);');

$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
select count(distinct class.Name), count(DISTINCT Student_Class.Student_ID)as "Number of Students"
from Student_Class, Student, Class,subject, school, other_class, teacher
where Student_Class.student_id = student.Student_ID 
and class.Class_ID = student_class.Class_ID
and other_class.Class_ID = class.Class_ID 
and other_class.Teacher_ID = teacher.Teacher_ID
and subject.subject_id = class.Subject_ID
and school.School_ID = class.School_ID 
and subject.Subject_Code = @subject;
/*and school.Code = @SCHOOL_CODE*/
/*and class.Semester = @SEMESTER*/
/*and teacher.Code = @TEACHER_CODE));*/
');

$this->db->query('select * from temp1 union select * from temp2;');
$this->db->query('DROP TEMPORARY TABLE IF EXISTS temp1, temp2;');


/*Student*/
$this->db->query('CREATE TEMPORARY TABLE temp1 AS (
select concat_ws(" ",student.Last_Name,",", student.First_Name,student.middle_initial) as "Student Name"
 from Student_Class, Student, Class,subject, school, other_class, teacher
where Student_Class.student_id = student.Student_ID 
and class.Class_ID = student_class.Class_ID
and other_class.Class_ID = class.Class_ID 
and other_class.Teacher_ID = teacher.Teacher_ID
and subject.subject_id = class.Subject_ID
and school.School_ID = class.School_ID 
and subject.Subject_Code = @subject 
/*and school.Code = @SCHOOL_CODE*/
/*and class.Semester = @SEMESTER*/
/*and teacher.Code = @TEACHER_CODE);*/
/*and class.Name = @CLASS);*/
');

$this->db->query('CREATE TEMPORARY TABLE temp2 AS (
select "total:" + count(DISTINCT Student_Class.Student_ID) 
 from Student_Class, Student, Class,subject, school, other_class, teacher
where Student_Class.student_id = student.Student_ID 
and class.Class_ID = student_class.Class_ID
and other_class.Class_ID = class.Class_ID 
and other_class.Teacher_ID = teacher.Teacher_ID
and subject.subject_id = class.Subject_ID
and school.School_ID = class.School_ID 
and subject.Subject_Code = @subject 
/*and class.Name = @CLASS*/
/*and school.Code = @SCHOOL_CODE*/
/*and class.Semester = @SEMESTER*/
/*and teacher.Code = @TEACHER_CODE);*/
/*and class.Name = @CLASS);*/
');

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