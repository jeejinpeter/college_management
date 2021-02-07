<?php
class Attendance_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	 public function get_all_course()  
      {  
	    $this->db->select('*'); 
        $this->db->from('tbl_course');  
		$this->db->order_by ("course_id", "desc");
		$query = $this->db->get();
         return $query->result();  
      }
	public function selected_stud($id,$id1)
	  {
		$this->db->select('*'); 
        $this->db->from('tbl_student');
		$this->db->where('course_id',$id);		
		$this->db->where('stud_batch_id',$id1);		
		$this->db->order_by ("stud_admno", "desc");
		$query = $this->db->get();
        return $query->result();
		
	  }
	public function insertatten($form_data,$data)
	{
		
		$res=$this->db->insert('tbl_student_atten', $data);	
		{
		$insert_id = $this->db->insert_id();
		$pday=$form_data['present_day'];
		$aday=$form_data['absent_day'];
		$adno=$form_data['adno'];
	    $insert_attendance=[];
			foreach($adno as $key => $value)
			{
			//	$insert_array[$key]=[$value=>$med_id[$key]];
				$insert_attendance[$key]=
				array(
				'atten_id'=>$insert_id,
				'std_adm_no'=>$adno[$key],
				'std_prsnt_day'=>$pday[$key], 
				'std_absnt_day'=>$aday[$key]
			);	
			
   }
		
		$query=$this->db->insert_batch('tbl_student_attentance', $insert_attendance);
		
		  return $query;
	}	}
	public function selected_attendan($id,$id1,$month)
	{
		$this->db->select('tbl_student_atten.*,tbl_student_attentance.*,tbl_student.*'); 
		$this->db->from('tbl_student_atten');
		$this->db->join('tbl_student_attentance', 'tbl_student_attentance.atten_id = tbl_student_atten.atten_id' , 'left');
		$this->db->join('tbl_student', 'tbl_student.stud_admno = tbl_student_attentance.std_adm_no' , 'left');
		$this->db->where('tbl_student_atten.atten_cour_id',$id);		
		$this->db->where('tbl_student_atten.atten_batch_id',$id1);	
		$this->db->where('tbl_student_atten.atten_month',$month);	
		$this->db->order_by ("stud_roll_no", "Asce");
		$query = $this->db->get();		
        return $query->result();
	}
	 public function selected_year()
	 {
		$this->db->select('tbl_student.*,tbl_batch.*');
	    $this->db->from('tbl_student');
		$this->db->join('tbl_batch', 'tbl_batch.batch_id = tbl_student.stud_batch_id' , 'left');
		$this->db->group_by ("tbl_student.stud_batch_id", "Asce");
		$query = $this->db->get();
		return $query->result();
	 }
	 public function selected_attendan_excel($month1,$course,$year)
	{
		$this->db->select('tbl_student_atten.*,tbl_student_attentance.*,tbl_student.*'); 
		$this->db->from('tbl_student_atten');
		$this->db->join('tbl_student_attentance', 'tbl_student_attentance.atten_id = tbl_student_atten.atten_id' , 'left');
		$this->db->join('tbl_student', 'tbl_student.stud_admno = tbl_student_attentance.std_adm_no' , 'left');
		$this->db->where('tbl_student_atten.atten_cour_id',$course);		
		$this->db->where('tbl_student_atten.atten_batch_id',$year);	
		$this->db->where('tbl_student_atten.atten_month',$month1);	
		$this->db->order_by ("stud_roll_no", "Asce");
		$query = $this->db->get();		
        return $query->result_array();
	}
	 public function selected_dtl($course,$year)
	{
		$this->db->select('tbl_student.*,tbl_batch.*,tbl_course.*'); 
		$this->db->from('tbl_student');
		$this->db->join('tbl_course', 'tbl_course.course_id = tbl_student.course_id' , 'left');
		$this->db->join('tbl_batch', 'tbl_batch.batch_id = tbl_student.stud_batch_id' , 'left');
		$this->db->where('tbl_student.course_id',$course);		
		$this->db->where('tbl_student.stud_batch_id',$year);	
		$query = $this->db->get();		
        return $query->result_array();
	}
} 
?>