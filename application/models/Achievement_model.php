<?php
class Achievement_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
      
  	  
	public function insert_achievement($data)
    {
     
      $query = $this->db->insert('tbl_achievement', $data);
	  $insert_achi_id = $this->db->insert_id();
      return  $insert_achi_id;
        
    }
	
	public  function insert_image($insert_achi_id,$image)
    {
    $this->db->where('ach_id',$insert_achi_id);
    return $this->db->update('tbl_achievement',$image);   
    }
	 public function get_all_listachievement()  
      {  
		$this->db->select('*'); 
		$this->db->from('tbl_achievement');  
		$this->db->order_by ("ach_id", "desc");
		$query = $this->db->get();
        return $query->result();  
      }
	public function get_all_listachievement_staff()  
      {  
		$this->db->select('*'); 
		$this->db->from('tbl_achievement'); 
		$this->db->where('cat_id',2);		
		$this->db->order_by ("ach_id", "desc");
		$query = $this->db->get();
        return $query->result();  
      }
	public function get_all_listachievement_student()  
      {  
		$this->db->select('*'); 
		$this->db->from('tbl_achievement'); 
		$this->db->where('cat_id',1);		
		$this->db->order_by ("ach_id", "desc");
		$query = $this->db->get();
        return $query->result();  
      }    	  
	public function get_all_listachievement_teacher()  
      {  
		$this->db->select('*'); 
		$this->db->from('tbl_achievement'); 
		$this->db->where('cat_id',3);		
		$this->db->order_by ("ach_id", "desc");
		$query = $this->db->get();
        return $query->result();  
      }    	 
	public function update_achievement($data,$id)
    {
    $this->db->where('ach_id', $id);
    return $this->db->update('tbl_achievement',$data);   
    
    } 		
	public function delete_achievement($id)
    {
    $this->db->where('ach_id',$id);
    $this->db->delete('tbl_achievement');   
    return true;
    }  
} 

?>