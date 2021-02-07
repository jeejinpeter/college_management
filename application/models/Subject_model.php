<?php
class Subject_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
                
        }
/*......................Subject......................*/
public function get_all_subject()
        {
	      $this->db->select('*');
		 $this->db->from('tbl_subject');    
         $query = $this->db->get(); 
         return $query;
		}
	public function get_subjects()
        {
     $query = $this->db->get('tbl_subject');
     return $query; 
}
	public function add_subject($data)
        {
			return  $this->db->insert('tbl_subject',$data);	
		}
	public function get_subject()
        {
	     $this->db->select('*'); 
         $this->db->from(' tbl_subject'); 
         $query = $this->db->get()->result_array();
		return $query;
		}
		public function get_subject_by_id($id)
	    {
		 $this->db->select('*');
		 $this->db->from('tbl_subject'); 
		 $this->db->where('subject_id', $id);
		 $query = $this->db->get()->result_array();
		return $query;
	    }
	public function update_subject($data,$id)
        {
	      $this->db->where('subject_id',$id);
	      return $query = $this->db->update('tbl_subject',$data); 
        }
	public function remove_subject($id)
        {
	       $this->db->where('subject_id',$id);
	     return $query = $this->db->delete('tbl_subject');  
        }
		/*---------------------Semester-----------------*/
		public function add_semester($data)
        {
			return  $this->db->insert('tbl_semester',$data);	
		}
		public function get_semester()
        {
	     $this->db->select('*'); 
         $this->db->from(' tbl_semester'); 
         $query = $this->db->get()->result_array();
		return $query;
		}
		public function semester_delete($id)
		{
		  $this->db->where('sem_id', $id);
		  return $this->db->delete('tbl_semester');
		}
		
		/*-------------------Semester---------------*/
		public function get_semester_by_id($id)
        {
	     $this->db->select('*'); 
         $this->db->from('tbl_semester');
		 $this->db->where('sem_id', $id);		 
         $query = $this->db->get()->result_array();
		return $query;
		}
	}
		?>