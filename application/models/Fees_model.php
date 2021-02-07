<?php
class Fees_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
public function insert_fee_category($data)
		{
			$query = $this->db->insert('tbl_fee_category',$data);
			return  $query;
		}
		public function get_fee_category()
	{
		       
		     $this->db->select('*'); 
            $this->db->from('tbl_fee_category');  
              $query = $this->db->get();
        return $query->result();
	
	}
	public function get_fee_category_edit($id)
	{
		     $this->db->select('*');
             $this->db->from('tbl_fee_category');
             $this->db->where('fc_id',$id);			
             $query = $this->db->get();
             return $query->result();
	}
	public function edit_fee_category($data,$id)
		{
			 $this->db->where('fc_id',$id);
			$query = $this->db->update('tbl_fee_category',$data);
			return  $query;
	    }
		public function delete_fee($id)
        {
	       $this->db->where('fc_id',$id);
	     return $query = $this->db->delete('tbl_fee_category');  
        }

   }
   ?>