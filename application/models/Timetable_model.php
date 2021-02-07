<?php
class Timetable_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
public function get_all_department()
	{
		     $this->db->select('*'); 
            $this->db->from('tbl_department');  
              $query = $this->db->get();
        return $query->result();
	}
	
	
	
	public  function add_timetable($data)
    {
     $query = $this->db->insert('tbl_timetable',$data);
			return  $query;
    
    }
	public function get_all_timetable()
 {  
 $this->db->distinct();
   $this->db->select('tbl_timetable.*,tbl_course.*,tbl_semester.*');
   $this->db->from('tbl_timetable'); 
$this->db->join('tbl_course', 'tbl_course.course_id = tbl_timetable.course_id', 'left');
$this->db->join('tbl_semester', 'tbl_semester.sem_id = tbl_timetable.sem_id', 'left');    
  $query = $this->db->get();   
   return $query; 
 }
Public function timetable_delete($id)
{
  $this->db->where('time_id', $id);
  return $this->db->delete('tbl_timetable');
}
public function get_course($id)
{
		$this->db->select('*'); 
            $this->db->from('tbl_course');
     $this->db->where('dept_id',$id);
        $query = $this->db->get();
        return $query->result();	 
}
public function get_all_sem()
	{
	$this->db->select('*'); 
    $this->db->from('tbl_semester');  
    $query = $this->db->get();
        return $query->result();
	}
}
?>

