<?php
class Gallery_model extends CI_Model {
	
	public function __construct()
        {
               parent::__construct();
        }
public function insert_gallery($data)
        {
			     
	     return $query = $this->db->insert('tbl_gallery',$data);  
	      
        }	
public function get_all_gallery()  
  {  
$this->db->select('*');
$this->db->from('tbl_gallery');
$query = $this->db->get();
return $query->result(); 
  }   
  Public function gallery_delete($id)
{
  $this->db->where('gallery_id', $id);
  return $this->db->delete('tbl_gallery');
}
}
?>