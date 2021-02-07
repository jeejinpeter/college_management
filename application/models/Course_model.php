<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
        }
         public function insert_course($data)
    {
     return $this->db->insert('tbl_course', $data);
    }
  public function get_sem_course()
    {
		  $this->db->select('*');
          $this->db->from('tbl_course'); 
		  $this->db->Where('c_type','sem');    
          $query = $this->db->get()->result_array(); 
          return $query;
    }
	public function get_year_course()
    {
		  $this->db->select('*');
          $this->db->from('tbl_course'); 
		  $this->db->Where('c_type','year');    
          $query = $this->db->get()->result_array(); 
		  
          return $query;
    }
	public function get_semester_by_id($id)
	    {
		 $this->db->select('*');
		 $this->db->from('tbl_course'); 
		 $this->db->where('course_id', $id);
		 $query = $this->db->get()->result_array();
		return $query;
	    }
	public function update_course($data,$cid)
	    {
		   $this->db->where('course_id', $cid);
	      return $query = $this->db->update('tbl_course',$data); 
	    }
	public function remove_course($id)
	    {
		   $this->db->where('course_id',$id);
	     return $query = $this->db->delete('tbl_course');   
	    }
   	public function get_courses()
	{
		    $this->db->select('*'); 
            $this->db->from('tbl_course');  
			$query = $this->db->get();
			return $query->result();		
	}
	public function get_all_course()
		{
			  $this->db->select('*');
			  $this->db->from('tbl_course');
			  $query = $this->db->get()->result_array(); 
			  return $query;
		}
	public function get_class_section_id($course, $sem)
     {
		   $this->db->select('tbl_student.*,tbl_course.*,tbl_fee_payment.*');
		   $this->db->from('tbl_student'); 
		   $this->db->join('tbl_course','tbl_student.course_id=tbl_course.course_id','inner');
		   $this->db->join('tbl_fee_payment','tbl_student.stud_admno=tbl_fee_payment.fee_pay_adm_no','inner');
		   $this->db->where('tbl_student.course_id', $course);
		   $this->db->where('tbl_student.sem_id', $sem);
		   $query = $this->db->get()->result_array();
		   return $query;
     }
     /*.........................fees...........................*/
    public function  get_class_section_id_batch($course, $sem,$batch)
     {
		   $this->db->select('tbl_student.*,
		   tbl_course.*,tbl_batch.*,tbl_fee_payment.*,tbl_semester.*');	
		   $this->db->from('tbl_student'); 
		   $this->db->join('tbl_course','tbl_student.course_id=tbl_course.course_id','inner');
		   $this->db->join('tbl_batch','tbl_student.stud_batch_id=tbl_batch.batch_id','inner');
		   $this->db->join('tbl_semester','tbl_student.sem_id=tbl_semester.sem_id','inner');
		   $this->db->join('tbl_fee_payment','tbl_student.stud_admno=tbl_fee_payment.fee_pay_adm_no','inner');
		   $this->db->where('tbl_student.course_id',$course);
		   $this->db->where('tbl_student.sem_id', $sem);
		   $this->db->where('tbl_student.stud_batch_id',$batch);
		   $this->db->group_by('tbl_fee_payment.fee_pay_adm_no', $sem);
		   $query = $this->db->get()->result_array();
		   return $query;
     }
     public function get_course_fees($admno)
		{
			  $this->db->select('*');
			  $this->db->from('tbl_course_fees');
			  $this->db->where('st_admno',$admno);
			  $query = $this->db->get()->row(); 
			  return $query;
		}
	  public function  get_all_studentfees($course,$sem,$batch)
     {
		   $this->db->select('tbl_student.*,
		   tbl_course.*,tbl_batch.*,tbl_semester.*,tbl_course_fees.*');	
		   $this->db->from('tbl_student'); 
		   $this->db->join('tbl_course','tbl_student.course_id=tbl_course.course_id','inner');
		   $this->db->join('tbl_batch','tbl_student.stud_batch_id=tbl_batch.batch_id','inner');
		   $this->db->join('tbl_semester','tbl_student.sem_id=tbl_semester.sem_id','inner');
		   $this->db->join('tbl_course_fees','tbl_student.stud_admno=tbl_course_fees.st_admno','inner');
		   $this->db->where('tbl_student.course_id',$course);
		   $this->db->where('tbl_student.sem_id', $sem);
		   $this->db->where('tbl_student.stud_batch_id',$batch);
		   $query = $this->db->get()->result_array();
		   return $query;
     }
      public function  get_class_section_id_fees_add($course,$sem,$batch)
     {
		   $this->db->select('tbl_student.*,
		   tbl_course.*,tbl_batch.*,tbl_semester.*');	
		   $this->db->from('tbl_student'); 
		   $this->db->join('tbl_course','tbl_student.course_id=tbl_course.course_id','inner');
		   $this->db->join('tbl_batch','tbl_student.stud_batch_id=tbl_batch.batch_id','inner');
		   $this->db->join('tbl_semester','tbl_student.sem_id=tbl_semester.sem_id','inner');
		   $this->db->where('tbl_student.course_id',$course);
		   $this->db->where('tbl_student.sem_id', $sem);
		   $this->db->where('tbl_student.stud_batch_id',$batch);
		   $query = $this->db->get()->result_array();
		   return $query;
     }
     public function update_course_fee($data1,$admno)
	    {
		   $this->db->where('st_admno',$admno);
	      return $query = $this->db->update('tbl_course_fees',$data1); 
	    }
}
?>