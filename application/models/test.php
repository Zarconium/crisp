<?php
Class Test extends CI_Model
{
	function test()
	{
		$this->db->select('CONCAT_WS("", IF(LENGTH(student.Last_Name), student.Last_Name, NULL), ", ", IF(LENGTH(student.First_Name), student.First_Name, NULL), " ", IF(LENGTH(student.Middle_Initial), student.Middle_Initial, NULL), ". ", IF(LENGTH(student.Name_Suffix), student.Name_Suffix, NULL)) as Full_Name, school.name as School_Name, student.Last_Name', false);
		$this->db->from('student');
		$this->db->join('school', 'student.School_ID = school.School_ID');

		$query = $this->db->get();
		
		/*if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}*/
	}
}
?>