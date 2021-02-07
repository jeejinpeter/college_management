<?php
class Event_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
      
  	  
	public function insert_event($data)
    {
     
      $query = $this->db->insert('tbl_events', $data);
	  $insert_news_id = $this->db->insert_id();
      return  $insert_news_id;
        
    }
	
	public  function insert_image($insert_e_id, $image)
    {
    $this->db->where('event_id',$insert_e_id);
    return $this->db->update('tbl_events',$image);   
    }
	 public function get_all_listevent()  
      {  
	   $this->db->select('*'); 
       $this->db->from('tbl_events');  
	$this->db->order_by ("event_id", "desc");
			$query = $this->db->get()->result_array();
         return $query;  
      }  
	 public function get_by_event_id($id)
        {
             $this->db->where('event_id',$id);
             $query = $this->db->get('tbl_events');
             return $query;
        }
	public function update_event($data,$id)
    {
    $this->db->where('event_id', $id);
    return $this->db->update('tbl_events',$data);   
    
    } 		
 public function delete_event($eid)
    {
    $this->db->where('event_id',$eid);
    $this->db->delete('tbl_events');   
    return true;
    }  
} 

?>