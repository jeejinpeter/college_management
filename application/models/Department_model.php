<?php
class Department_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
                
        }
	 
	 public function add_department($data)
        {
			return  $this->db->insert('tbl_department',$data);	
		}
public function get_all_department()
	    {
		 $this->db->select('*');
		 $this->db->from('tbl_department'); 
		 $this->db->order_by("dept_id","asc");
		 $query = $this->db->get()->result_array();
	     return $query;
	    }
public function get_department_by_id($id)
	    {
		 $this->db->select('*');
		 $this->db->from('tbl_department'); 
		 $this->db->where('dept_id', $id);
		 $query = $this->db->get()->result_array();
		return $query;
	    }
public function update_department($data,$id)
        {
	      $this->db->where('dept_id',$id);
	      return $query = $this->db->update('tbl_department',$data); 
        }
 public function remove_department($id)
        {
	       $this->db->where('dept_id',$id);
	     return $query = $this->db->delete('tbl_department');  
        }
    }
		?>