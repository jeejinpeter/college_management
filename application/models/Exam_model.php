<?php
class Exam_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    	 public function get_all_course()
	{
		     $this->db->select('*'); 
            $this->db->from('tbl_course');  
              $query = $this->db->get();
        return $query->result();
	}
  public function insert_exam($data)
		{
			$query = $this->db->insert('tbl_exam', $data);
			return  $query;
		}
		  public function get_all_exam()
	{
		     $this->db->select('tbl_exam.*, tbl_course.*');
            $this->db->from('tbl_exam');
			 $this->db->join('tbl_course', 'tbl_exam.c_id = tbl_course.course_id', 'left');
         // $this->db->order_by("c_id","desc");			
              $query = $this->db->get();
        return $query->result();
	}
	public function get_exam($id)
	{
		     $this->db->select('tbl_exam.*, tbl_course.*, tbl_semester.*');
             $this->db->from('tbl_exam');
			 $this->db->join('tbl_course', 'tbl_exam.c_id = tbl_course.course_id', 'left');
			 $this->db->join('tbl_semester', 'tbl_exam.e_sem = tbl_semester.sem_id', 'left');
             $this->db->where('tbl_exam.e_id',$id);			
             $query = $this->db->get();
             return $query->result();
	}
	public function edit_exam($data,$id)
		{
			 $this->db->where('tbl_exam.e_id',$id);	
			$query = $this->db->update('tbl_exam', $data);
			
			return  $query;
		}
		public function delete_exam($id)
        {
	       $this->db->where('e_id',$id);
	     return $query = $this->db->delete('tbl_exam');  
        }
 }
?>