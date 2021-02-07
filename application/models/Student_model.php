<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
        }
 /*---------------------admission------------------------*/
public function insert_admission($data)
        {
			    $query2 = $this->db->insert('tbl_m_student',$data); 
	     return $query = $this->db->insert('tbl_student',$data);  
	      
        }	
  public function insert_fees($data1)
        {
       return $query = $this->db->insert('tbl_course_fees',$data1);  
        
        }
public function get_all_students()
  {
      $this->db->select('*');
      $this->db->from('tbl_m_student');
    $this->db->join('tbl_course','tbl_m_student.course_id = tbl_course.course_id ' ,'left');
    $this->db->join('tbl_batch','tbl_m_student.stud_batch_id = tbl_batch.batch_id ' ,'left');
    $query = $this->db->get();    
        return $query->result();    
  }
  public function get_current_students_details()
  {
      $this->db->select('*');
      $this->db->from('tbl_student');
    $this->db->join('tbl_course','tbl_student.course_id = tbl_course.course_id ' ,'left');
    $this->db->join('tbl_batch','tbl_student.stud_batch_id = tbl_batch.batch_id ' ,'left');
    $this->db->join('tbl_course_fees','tbl_student.stud_admno = tbl_course_fees.st_admno' ,'left');
    $query = $this->db->get();    
        return $query->result();    
  }
public function get_students()
  {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->join('tbl_course','tbl_student.course_id = tbl_course.course_id' ,'left');
    $this->db->join('tbl_batch','tbl_student.stud_batch_id = tbl_batch.batch_id' ,'left');
    $query = $this->db->get();    
    return $query->result();    
  }
  public function get_students_total_fees_paid()
  {
    $this->db->select_sum('fee_pay_amount');
    $this->db->from('tbl_fee_payment');
    $this->db->group_by('fee_pay_adm_no');
        $query = $this->db->get();    
    return $query->result();    
  }
public function get_by_type($id, $id2)
  {
      $this->db->select('*');
      $this->db->from('tbl_student');
    $this->db->join('tbl_course','tbl_student.course_id = tbl_course.course_id ' ,'left');
    $this->db->join('tbl_batch','tbl_student.stud_batch_id = tbl_batch.batch_id ' ,'left');
    $this->db->where('tbl_student.course_id',$id);
    $this->db->where('tbl_student.sem_id',$id2);
    $query = $this->db->get();    
        return $query->result();    
  }
public function get_students_details($id)
	{
	    $this->db->select('*');
	    $this->db->from('tbl_student');
		$this->db->join('tbl_course','tbl_student.course_id = tbl_course.course_id ' ,'left');
		$this->db->where('student_id',$id);
		$query = $this->db->get();		
        return $query->result();		
	}
public function update_admission($id,$data)
        {
	     $this->db->where('student_id',$id);
		return  $query = $this->db->update('tbl_student',$data);
		   
        }
public function update_admiss($id,$data)
        {
	      $this->db->where('student_id',$id);
		  return $query = $this->db->update('tbl_m_student',$data);
		   
        }
public function delete_admission($id)
        {
    $this->db->where('student_id',$id);
    $this->db->delete('tbl_student');   
    return true;
    } 
  public function update_reason($id,$data)
        {
        $this->db->where('student_id',$id);
      return $query = $this->db->update('tbl_m_student',$data);
       
        }
  public function get_students_details_by_admis($admis_no)
  {
      $this->db->select('*');
      $this->db->from('tbl_student');
    $this->db->where('stud_admno',$admis_no);
    $query = $this->db->get();    
        return $query->result();    
  }
  public function update_fees($data,$admno)
        {
      $this->db->where('st_admno',$admno);
    return  $query = $this->db->update('tbl_course_fees',$data);
       
        }
    /*..................Mark...............*/
    public function get_all_studentlist($cr,$sm,$yr)  
  {  
$this->db->select('*');
$this->db->from('tbl_student');
$this->db->where('course_id',$cr);
$this->db->where('sem_id',$sm);
$this->db->where('stud_batch_id',$yr);
$query = $this->db->get();
return $query->result(); 
  }  
Public function insert_marks($data)
{
     return $this->db->insert('tbl_marks', $data);
}
public function get_allmarks($cr,$sm,$yr)
		{
		 $this->db->select('tbl_student.*, tbl_marks.*');
		 $this->db->from('tbl_student');
		 $this->db->join('tbl_marks', 'tbl_marks.admno = tbl_student.stud_admno', 'left');
		 $this->db->where('tbl_student.course_id',$cr);
		 $this->db->where('tbl_student.sem_id',$sm);
		 $this->db->where('tbl_student.stud_batch_id',$yr);
		 $query=$this->db->get()->result_array();
		 return  $query;
		}
  public function get_all_course()
    {
         
           $this->db->select('*'); 
            $this->db->from('tbl_course');  
    
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
	public function select_course($cr)
    {
         
           $this->db->select('*'); 
            $this->db->from('tbl_course');  
			$this->db->where('course_id',$cr);
    
            $query = $this->db->get();
        
             return $query->result();
             
    }	
 public function select_batch($yr)
    {
         
           $this->db->select('*'); 
            $this->db->from('tbl_batch');  
			$this->db->where('batch_id',$yr);
            $query = $this->db->get();
        
             return $query->result();
             
    }
	public function select_sem($sm)
    {
         
           $this->db->select('*'); 
            $this->db->from('tbl_semester');  
			$this->db->where('sem_id',$sm);
            $query = $this->db->get();
             return $query->result();
             
    }
	public function get_all_batch()
    {
         
           $this->db->select('*'); 
            $this->db->from('tbl_batch');  
    
            $query = $this->db->get();
        
             return $query->result();
             
    }
public function get_stud($id)
    {
         
           $this->db->select('*'); 
            $this->db->from('tbl_student');  
			$this->db->where('student_id',$id);
            $query = $this->db->get();
            return $query->result();
    }
public function get_all_marklist($cr,$sm,$yr)  
  {  
$this->db->select('tbl_student.*,tbl_marks.*,tbl_course.*, tbl_batch.*,tbl_semester.*');
$this->db->from('tbl_marks');
$this->db->join('tbl_student', 'tbl_marks.admno = tbl_student.stud_admno', 'left');
$this->db->join('tbl_course', 'tbl_marks.course = tbl_course.course_id', 'left');
$this->db->join('tbl_batch', 'tbl_marks.batch = tbl_batch.batch_id', 'left');
$this->db->join('tbl_semester', 'tbl_marks.sem = tbl_semester.sem_id', 'left');
$this->db->where('tbl_marks.course',$cr);
$this->db->where('tbl_marks.sem',$sm);
$this->db->where('tbl_marks.batch',$yr);
$query = $this->db->get();
return $query->result(); 
  }  	
  public function insert_fees_payment($data)
        {
       return $query = $this->db->insert('tbl_fee_payment',$data);   
        }  	
    }
   ?>